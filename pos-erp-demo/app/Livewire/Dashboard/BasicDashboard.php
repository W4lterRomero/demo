<?php

namespace App\Livewire\Dashboard;

use App\Models\Sale;
use Carbon\Carbon;
use Livewire\Component;

class BasicDashboard extends Component
{
    public function render()
    {
        $today = Carbon::today();
        
        $salesToday = Sale::whereDate('created_at', $today)
            ->where('status', 'completada')
            ->sum('total');

        $ordersCount = Sale::whereDate('created_at', $today)
            ->where('status', 'completada')
            ->count();

        $avgTicket = $ordersCount > 0 ? $salesToday / $ordersCount : 0;

        return view('livewire.dashboard.basic-dashboard', [
            'salesToday' => $salesToday,
            'ordersCount' => $ordersCount,
            'avgTicket' => $avgTicket,
        ]);
    }
}
