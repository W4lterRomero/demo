<?php

namespace App\Livewire\Inventory;

use App\Models\Category;
use App\Models\Inventory;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

#[Layout('layouts.demo')]
class InventoryList extends Component
{
    use WithPagination;

    public $search = '';
    public $categoryFilter = '';
    public $lowStockFilter = false;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $package = session('demo_package', 'basico');
        $canEdit = in_array($package, ['completo', 'premium']);

        $products = Product::query()
            ->with(['category', 'inventory'])
            ->when($this->search, function($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->when($this->categoryFilter, function($query) {
                $query->where('category_id', $this->categoryFilter);
            })
            ->when($this->lowStockFilter, function($query) {
                $query->whereHas('inventory', function($q) {
                    $q->whereColumn('stock', '<=', 'min_stock');
                });
            })
            ->paginate(10);

        $categories = Category::orderBy('name')->get();

        return view('livewire.inventory.inventory-list', [
            'products' => $products,
            'categories' => $categories,
            'canEdit' => $canEdit,
        ]);
    }
}
