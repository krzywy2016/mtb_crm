<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('/client')->group(function () {
        Route::get('/', [ClientController::class, 'index'])->name('client-index');
        Route::get('/create', [ClientController::class, 'create'])->name('client-create');
        Route::get('/edit/{id}', [ClientController::class, 'edit'])->name('client-edit');
        Route::post('/store', [ClientController::class, 'store'])->name('client-store');
        Route::post('/update/{id}', [ClientController::class, 'store'])->name('client-update');
        Route::get('/destroy/{id}', [ClientController::class, 'destroy'])->name('client-destroy');
        Route::post('/{clientId}/add-extra-logo', [ClientController::class, 'addExtraLogo'])->name('client-add-extra-logo');
        Route::get('/{clientId}/remove-extra-logo/{extraLogoPath}', [ClientController::class, 'removeExtraLogo'])->name('client-remove-extra-logo');
    });

    Route::prefix('/project')->group(function () {
        Route::get('/', [ProjectController::class, 'index'])->name('project-index');
        Route::get('/create', [ProjectController::class, 'create'])->name('project-create');
        Route::get('/edit/{id}', [ProjectController::class, 'edit'])->name('project-edit');
        Route::post('/store', [ProjectController::class, 'store'])->name('project-store');
        Route::post('/update/{id}', [ProjectController::class, 'store'])->name('project-update');
        Route::get('/destroy/{id}', [ProjectController::class, 'destroy'])->name('project-destroy');
        Route::get('/show/{id}', [ProjectController::class, 'show'])->name('project-show');
    });
});

require __DIR__.'/auth.php';
