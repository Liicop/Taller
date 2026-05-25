<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\RepuestoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\DetalleFacturaController;
use App\Http\Controllers\PdfController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('vehiculos', VehiculoController::class);
    Route::resource('citas', CitaController::class);
    Route::resource('repuestos', RepuestoController::class);
    Route::resource('facturas', FacturaController::class);
    Route::get('facturas/{factura}/ver', [FacturaController::class, 'get_factura_by_id'])->name('facturas.get_factura_by_id');
    Route::post('facturas/{factura}/detalle', [DetalleFacturaController::class, 'store'])->name('detalles.store');
    Route::delete('detalles/{detalle}', [DetalleFacturaController::class, 'destroy'])->name('detalles.destroy');

    Route::get('facturas/{factura}/pdf', [PdfController::class, 'generar'])->name('facturas.pdf');
});

require __DIR__.'/auth.php';
