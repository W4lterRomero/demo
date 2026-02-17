<?php

namespace App\Livewire\Reports;

use App\Models\Sale;
use App\Models\SaleItem;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.demo')]
class BasicReports extends Component
{
    public $range = 'today'; // today, yesterday, week, month

    public function updatedRange()
    {
        $this->dispatch('chart-updated', [
            'labels' => $this->getChartData()['labels'],
            'data' => $this->getChartData()['data'],
        ]);
    }

    private function getChartData()
    {
        $startDate = match($this->range) {
            'today' => Carbon::today(),
            'yesterday' => Carbon::yesterday(),
            'week' => Carbon::now()->subDays(7),
            'month' => Carbon::now()->subMonth(),
            default => Carbon::today(),
        };
        
        $endDate = $this->range === 'yesterday' ? Carbon::yesterday()->endOfDay() : Carbon::now();

        if (in_array($this->range, ['week', 'month'])) {
            $chartData = Sale::selectRaw('DATE(created_at) as date, SUM(total) as total')
                ->where('created_at', '>=', $startDate)
                ->where('created_at', '<=', $endDate)
                ->where('status', 'completada')
                ->groupBy('date')
                ->orderBy('date')
                ->get();
            
            $labels = $chartData->pluck('date')->map(fn($d) => Carbon::parse($d)->format('d M'));
            $data = $chartData->pluck('total');
        } else {
            $chartData = Sale::selectRaw('strftime(\'%H\', created_at) as hour, SUM(total) as total')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->where('status', 'completada')
                ->groupBy('hour')
                ->orderBy('hour')
                ->get();
                
            $labels = $chartData->pluck('hour')->map(fn($h) => $h . ':00');
            $data = $chartData->pluck('total');
        }
        
        return ['labels' => $labels, 'data' => $data];
    }

    public function render()
    {
        $startDate = match($this->range) {
            'today' => Carbon::today(),
            'yesterday' => Carbon::yesterday(),
            'week' => Carbon::now()->subDays(7),
            'month' => Carbon::now()->subMonth(),
            default => Carbon::today(),
        };

        $endDate = $this->range === 'yesterday' ? Carbon::yesterday()->endOfDay() : Carbon::now();

        // Specific fix for 'yesterday' range to ensure we only get yesterday's data
        if ($this->range === 'yesterday') {
             $salesQuery = Sale::whereBetween('created_at', [$startDate, $endDate])->where('status', 'completada');
        } else {
             $salesQuery = Sale::where('created_at', '>=', $startDate)->where('status', 'completada');
        }

        $totalSales = abs($salesQuery->sum('total')); 
        $transactionCount = $salesQuery->count();
        $averageTicket = $transactionCount > 0 ? $totalSales / $transactionCount : 0;

        $chartData = $this->getChartData();

        // Top Products
        $topProducts = SaleItem::select('product_id', DB::raw('SUM(quantity) as total_qty'), DB::raw('SUM(subtotal) as total_amount'))
            ->whereHas('sale', function($q) use ($startDate, $endDate) {
                $q->whereBetween('created_at', [$startDate, $endDate])->where('status', 'completada');
            })
            ->with('product')
            ->groupBy('product_id')
            ->orderByDesc('total_qty')
            ->limit(5)
            ->get();

        return view('livewire.reports.basic-reports', [
            'totalSales' => $totalSales,
            'transactionCount' => $transactionCount,
            'averageTicket' => $averageTicket,
            'labels' => $chartData['labels'],
            'data' => $chartData['data'],
            'topProducts' => $topProducts,
        ]);
    }
}
