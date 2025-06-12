<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\OperationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

// 🔹 Test de correo (Mailpit)
Route::get('/test-mail', function () {
    Mail::raw('Esto es una prueba de correo desde Laravel 🧪', function ($message) {
        $message->to('fake@correo.com')
                ->subject('Correo de prueba');
    });

    return 'Correo enviado (si Laravel pudo). Revisa Mailpit.';
});

// 🔹 Página inicial
Route::get('/', function () {
    return view('welcome');
});

// 🔹 Dashboard (requiere login y email verificado)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 🔹 Perfil de usuário
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 🔹 Pagamento de mensalidade + histórico de operações (só usuários autenticados e verificados)
Route::middleware(['auth', 'verified'])->group(function () {
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
