<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.demo')]
class Placeholder extends Component
{
    public $title;
    public $message;

    public function mount($title = 'Módulo en Desarrollo', $message = 'Esta funcionalidad estará disponible en la versión completa.')
    {
        $this->title = $title;
        $this->message = $message;
    }

    public function render()
    {
        return view('livewire.placeholder');
    }
}
