<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.demo')]
class MainDashboard extends Component
{
    public function render()
    {
        $package = session('demo_package', 'basico');

        return view('livewire.dashboard.main-dashboard', [
            'package' => $package
        ]);
    }
}
