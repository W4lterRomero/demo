<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DemoController;

Route::get('/', function () {
    return view('landing');
})->name('login');

Route::get('/demo/{package}', [DemoController::class, 'login'])->name('demo.login');
Route::get('/logout', [DemoController::class, 'logout'])->name('demo.logout');

Route::middleware([
    'auth:web',
    \Illuminate\Session\Middleware\AuthenticateSession::class,
])->group(function () {
    Route::get('/dashboard', \App\Livewire\Dashboard\MainDashboard::class)->name('dashboard');

    // Paquete Básico Routes
    Route::get('/pos', \App\Livewire\Pos\PointOfSale::class)->name('pos');
    Route::get('/inventory', \App\Livewire\Inventory\InventoryList::class)->name('inventory');
    Route::get('/reports', \App\Livewire\Reports\BasicReports::class)->name('reports');
    Route::get('/cash-close', \App\Livewire\CashRegister\CashClose::class)->name('cash-close');

    // Paquete Completo Routes (Placeholders)
    Route::get('/motos', \App\Livewire\Motos\MotoList::class)->name('motos');
    Route::get('/events', fn() => \Livewire\Livewire::mount('placeholder', ['title' => 'Gestión de Eventos']))->name('events');
    Route::get('/invoices', fn() => \Livewire\Livewire::mount('placeholder', ['title' => 'Facturación Electrónica']))->name('invoices');
    Route::get('/users', fn() => \Livewire\Livewire::mount('placeholder', ['title' => 'Gestión de Usuarios']))->name('users');

    // Paquete Premium Routes (Placeholders)
    Route::get('/intelligence', fn() => \Livewire\Livewire::mount('placeholder', ['title' => 'Inteligencia de Negocios']))->name('intelligence');
    Route::get('/assets', fn() => \Livewire\Livewire::mount('placeholder', ['title' => 'Auditoría de Activos']))->name('assets');
    Route::get('/automations', fn() => \Livewire\Livewire::mount('placeholder', ['title' => 'Automatizaciones']))->name('automations');
    Route::get('/mobile', fn() => \Livewire\Livewire::mount('placeholder', ['title' => 'App Móvil Administrativa']))->name('mobile');
    Route::get('/security', fn() => \Livewire\Livewire::mount('placeholder', ['title' => 'Seguridad y Auditoría']))->name('security');
});
