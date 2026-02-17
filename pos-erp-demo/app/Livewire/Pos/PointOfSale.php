<?php

namespace App\Livewire\Pos;

use App\Models\Category;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleItem;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.demo')]
class PointOfSale extends Component
{
    public $search = '';
    public $selectedCategory = null;
    public $cart = [];
    public $showCheckoutModal = false;
    public $paymentMethod = 'efectivo'; // efectivo, tarjeta
    public $amountPaid = 0;
    
    public function mount()
    {
        // Initialize with first category
        $this->selectedCategory = Category::orderBy('sort_order')->first()->id ?? null;
    }

    public function addToCart($productId)
    {
        $product = Product::find($productId);
        
        if (isset($this->cart[$productId])) {
            $this->cart[$productId]['quantity']++;
        } else {
            $this->cart[$productId] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image,
            ];
        }
    }

    public function removeFromCart($productId)
    {
        unset($this->cart[$productId]);
    }

    public function updateQuantity($productId, $quantity)
    {
        if ($quantity <= 0) {
            $this->removeFromCart($productId);
        } else {
            $this->cart[$productId]['quantity'] = $quantity;
        }
    }

    public function getSubtotalProperty()
    {
        return collect($this->cart)->sum(fn($item) => $item['price'] * $item['quantity']);
    }

    public function getTaxProperty()
    {
        return $this->subtotal * 0.13;
    }

    public function getTotalProperty()
    {
        return $this->subtotal + $this->tax;
    }
    
    public function getChangeProperty()
    {
        return max(0, $this->amountPaid - $this->total);
    }

    public function processCheckout()
    {
        if (empty($this->cart)) return;
        
        // Create Sale
        $sale = Sale::create([
            'user_id' => Auth::id(),
            'package_type' => session('demo_package', 'basico'),
            'subtotal' => $this->subtotal,
            'tax' => $this->tax,
            'total' => $this->total,
            'payment_method' => $this->paymentMethod,
            'status' => 'completada',
        ]);

        // Create Items
        foreach ($this->cart as $item) {
            SaleItem::create([
                'sale_id' => $sale->id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'unit_price' => $item['price'],
                'subtotal' => $item['price'] * $item['quantity'],
            ]);
        }

        // Reset
        $this->cart = [];
        $this->showCheckoutModal = false;
        $this->amountPaid = 0;
        
        session()->flash('success', 'Venta registrada con éxito. Ticket #' . $sale->id);
    }

    public function render()
    {
        $categories = Category::orderBy('sort_order')->get();
        
        $products = Product::query()
            ->when($this->search, function($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->when(!$this->search && $this->selectedCategory, function($query) {
                $query->where('category_id', $this->selectedCategory);
            })
            ->active()
            ->get();

        return view('livewire.pos.point-of-sale', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }
}
