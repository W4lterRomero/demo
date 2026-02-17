<?php

namespace App\Livewire\CashRegister;

use App\Models\CashRegister;
use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.demo')]
class CashClose extends Component
{
    public $expectedAmount = 0;
    public $countedAmount = null;
    public $difference = 0;
    public $notes = '';
    public $isClosed = false;

    public function mount()
    {
        // Calculate expected amount from today's sales for this user
        // In a real app, this would be based on the last opening time.
        // For demo, we assume "today" is the session.
        $this->expectedAmount = Sale::where('user_id', Auth::id())
            ->whereDate('created_at', Carbon::today())
            ->where('status', 'completada')
            ->sum('total');
    }

    public function updatedCountedAmount()
    {
        $this->difference = (float)$this->countedAmount - (float)$this->expectedAmount;
    }

    public function closeRegister()
    {
        $this->validate([
            'countedAmount' => 'required|numeric|min:0',
        ]);

        CashRegister::create([
            'user_id' => Auth::id(),
            'opened_at' => Carbon::today()->startOfDay(), // Simulation
            'closed_at' => Carbon::now(),
            'expected' => $this->expectedAmount,
            'counted' => $this->countedAmount,
            'difference' => $this->difference,
        ]);

        $this->isClosed = true;
        
        session()->flash('success', 'Caja cerrada correctamente.');
    }

    public function render()
    {
        return view('livewire.cash-register.cash-close');
    }
}
