<?php

namespace App\Livewire\Motos;

use Livewire\Component;
use App\Models\MotoMaintenance as MaintenanceModel;
use App\Models\Moto;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

#[Layout('layouts.demo')]
class MotoMaintenance extends Component
{
    use WithPagination;

    public $showCreateModal = false;
    
    public $moto_id = '';
    public $type = 'general';
    public $scheduled_date = '';
    public $notes = '';

    protected $rules = [
        'moto_id' => 'required|exists:motos,id',
        'type' => 'required|in:aceite,frenos,llantas,general',
        'scheduled_date' => 'required|date',
        'notes' => 'nullable|string',
    ];

    public function mount()
    {
        $this->scheduled_date = now()->format('Y-m-d');
    }

    public function save()
    {
        $this->validate();

        MaintenanceModel::create([
            'moto_id' => $this->moto_id,
            'type' => $this->type,
            'scheduled_date' => $this->scheduled_date,
            'notes' => $this->notes,
        ]);

        // Update moto status to maintenance if date is today or past
        if ($this->scheduled_date <= now()->format('Y-m-d')) {
            $moto = Moto::find($this->moto_id);
            if ($moto && $moto->status != 'mantenimiento') {
                $moto->status = 'mantenimiento';
                $moto->save();
            }
        }

        $this->showCreateModal = false;
        $this->reset(['moto_id', 'type', 'notes']);
        $this->scheduled_date = now()->format('Y-m-d'); // Reset date to today
    }

    public function markCompleted($id)
    {
        $record = MaintenanceModel::find($id);
        if ($record) {
            $record->update(['completed_at' => now()]);
            
            // Check if moto has other pending maintenance
            $pending = MaintenanceModel::where('moto_id', $record->moto_id)
                ->whereNull('completed_at')
                ->where('scheduled_date', '<=', now())
                ->exists();
                
            if (!$pending) {
                // If no pending maintenance, set to available
                $moto = Moto::find($record->moto_id);
                if ($moto && $moto->status == 'mantenimiento') {
                    $moto->status = 'disponible';
                    $moto->save();
                }
            }
        }
    }

    public function render()
    {
        $records = MaintenanceModel::with('moto')
            ->orderByRaw('completed_at IS NOT NULL') // Pending first
            ->orderBy('scheduled_date', 'asc')
            ->paginate(10);

        return view('livewire.motos.moto-maintenance', [
            'records' => $records,
            'motos' => Moto::orderBy('name')->get(),
        ]);
    }
}
