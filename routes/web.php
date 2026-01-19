<?php

use App\Http\Controllers\DealController;
use App\Http\Controllers\PipelineController;
use App\Http\Controllers\PipelineTemplateController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

// mock
Route::get('/', function () {
    return view('teams.index');
});

Route::get('/teams', function () {
    return view('teams.index');
})->name('teams.index');

Route::get('/users', function () {
    return view('users.index');
})->name('users.index');

Route::get('/users/create', function () { return view('users.create'); })->name('users.create');
Route::get('/users/edit-mock', function () { return view('users.edit'); })->name('users.edit');
// end mock

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
    Route::resource('customers', CustomerController::class);
    Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::get('/pipelines', [PipelineController::class, 'index'])->name('pipelines.index');
    Route::get('/pipelines/create', [PipelineController::class, 'create'])->name('pipelines.create');
    Route::resource('pipelines', PipelineController::class);
    Route::get('/deals', [DealController::class, 'index'])->name('deals.index');
    Route::get('/deals/create', [DealController::class, 'create'])->name('deals.create');
    Route::get('/deals/{id}/edit', [DealController::class, 'edit'])->name('deals.edit');
    Route::resource('deals', DealController::class);
    Route::get('/pipeline-templates', [PipelineTemplateController::class, 'index'])->name('pipeline-templates.index');
//    Route::get('/pipelines-templates/create', [PipelineTemplateController::class, 'create'])->name('pipelines.create');
    Route::post('/pipeline-templates/select', [PipelineTemplateController::class, 'select'])->name('pipeline-templates.select');
    Route::resource('pipeline-templates', PipelineTemplateController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
