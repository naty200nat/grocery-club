<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\OperationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;


// 🔹 Página inicial
Route::get('/', function () {
    return view('welcome');
});

// 🔹 Dashboard (requiere login y email verificado)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


// 🔹 Perfil de usuário
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 🔹 Pagamento de mensalidade + histórico de operações (só usuários autenticados e verificados)
Route::middleware(['auth'])->group(function () {
    Route::get('/payment', [MembershipController::class, 'showForm'])->name('payment.form');
    Route::post('/payment', [MembershipController::class, 'process'])->name('payment.process');
    Route::get('/operacoes', [OperationController::class, 'index'])->name('operations.index');
});

// 🔹 Área de administração (somente para funcionários)
Route::middleware(['auth', 'checkTipo:employee'])->prefix('admin')->group(function () {
    Route::resource('products', ProductController::class);
});

// 🔹 Rotas de autenticação
require __DIR__.'/auth.php';

Route::middleware(['auth', 'checkTipo:board'])->prefix('admin')->group(function () {
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
});


