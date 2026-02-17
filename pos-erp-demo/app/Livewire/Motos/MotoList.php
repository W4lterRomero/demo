<?php

namespace App\Livewire\Motos;

use Livewire\Component;
use App\Models\Moto;
use Livewire\WithPagination;

class MotoList extends Component
{
    use WithPagination;

    public $search = '';
    public $statusFilter = '';

    public function updateStatus($motoId, $newStatus)
    {
        $moto = Moto::find($motoId);
        if ($moto) {
            $moto->status = $newStatus;
            $moto->save();
            $this->dispatch('status-updated', message: "Estado de {$moto->name} actualizado a " . ucfirst($newStatus));
        }
    }

    public function render()
    {
        $motos = Moto::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('brand', 'like', '%' . $this->search . '%')
                      ->orWhere('model', 'like', '%' . $this->search . '%');
            })
            ->when($this->statusFilter, function ($query) {
                $query->where('status', $this->statusFilter);
            })
            ->orderBy('id', 'asc')
            ->paginate(10);

        return view('livewire.motos.moto-list', [
            'motos' => $motos,
            'total_motos' => Moto::count(),
            'available_count' => Moto::where('status', 'disponible')->count(),
            'maintenance_count' => Moto::where('status', 'mantenimiento')->count(),
            'rented_count' => Moto::where('status', 'en_uso')->count(),
        ]);
    }
}
