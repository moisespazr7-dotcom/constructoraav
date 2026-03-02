<?php

use App\Http\Controllers\Admin\CatalogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EvaluationController;
use App\Http\Controllers\Admin\LeadContactAdminController;
use App\Http\Controllers\Admin\MaterialRequestAdminController;
use App\Http\Controllers\Admin\RentalRequestAdminController;
use App\Http\Controllers\LeadContactController;
use App\Http\Controllers\MaterialRequestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RentalRequestController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'landing');
Route::view('/index.html', 'landing');
Route::view('/renta.html', 'renta');
Route::view('/materiales.html', 'materiales');
Route::redirect('/app/login', '/login');

Route::post('/contacto/submit', [LeadContactController::class, 'store'])
    ->name('contacto.submit')
    ->middleware('throttle:5,1');
Route::post('/renta/submit', [RentalRequestController::class, 'store'])
    ->name('renta.submit')
    ->middleware('throttle:5,1');
Route::post('/materiales/submit', [MaterialRequestController::class, 'store'])
    ->name('materiales.submit')
    ->middleware('throttle:5,1');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::get('/contactos', [LeadContactAdminController::class, 'index'])->name('contacts.index');
    Route::patch('/contactos/{leadContact}', [LeadContactAdminController::class, 'update'])->name('contacts.update');
    Route::delete('/contactos/{leadContact}', [LeadContactAdminController::class, 'destroy'])->name('contacts.destroy');

    Route::get('/rentas', [RentalRequestAdminController::class, 'index'])->name('rentals.index');
    Route::patch('/rentas/{rentalRequest}', [RentalRequestAdminController::class, 'update'])->name('rentals.update');
    Route::delete('/rentas/{rentalRequest}', [RentalRequestAdminController::class, 'destroy'])->name('rentals.destroy');

    Route::get('/materiales', [MaterialRequestAdminController::class, 'index'])->name('materials.index');
    Route::patch('/materiales/{materialRequest}', [MaterialRequestAdminController::class, 'update'])->name('materials.update');
    Route::delete('/materiales/{materialRequest}', [MaterialRequestAdminController::class, 'destroy'])->name('materials.destroy');

    Route::get('/evaluaciones', [EvaluationController::class, 'index'])->name('evaluations.index');
    Route::get('/evaluaciones/crear', [EvaluationController::class, 'create'])->name('evaluations.create');
    Route::post('/evaluaciones', [EvaluationController::class, 'store'])->name('evaluations.store');

    Route::get('/catalogos', [CatalogController::class, 'index'])->name('catalogs.index');
    Route::post('/catalogos/proyectos', [CatalogController::class, 'storeProject'])->name('catalogs.projects.store');
    Route::delete('/catalogos/proyectos/{project}', [CatalogController::class, 'destroyProject'])->name('catalogs.projects.destroy');
    Route::post('/catalogos/oficios', [CatalogController::class, 'storeTrade'])->name('catalogs.trades.store');
    Route::delete('/catalogos/oficios/{trade}', [CatalogController::class, 'destroyTrade'])->name('catalogs.trades.destroy');
    Route::post('/catalogos/cuadrillas', [CatalogController::class, 'storeCrew'])->name('catalogs.crews.store');
    Route::delete('/catalogos/cuadrillas/{crew}', [CatalogController::class, 'destroyCrew'])->name('catalogs.crews.destroy');
    Route::post('/catalogos/colaboradores', [CatalogController::class, 'storeWorker'])->name('catalogs.workers.store');
    Route::delete('/catalogos/colaboradores/{worker}', [CatalogController::class, 'destroyWorker'])->name('catalogs.workers.destroy');
    Route::post('/catalogos/tareas', [CatalogController::class, 'storeTask'])->name('catalogs.tasks.store');
    Route::delete('/catalogos/tareas/{task}', [CatalogController::class, 'destroyTask'])->name('catalogs.tasks.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

if (file_exists(__DIR__.'/auth.php')) {
    require __DIR__.'/auth.php';
}
