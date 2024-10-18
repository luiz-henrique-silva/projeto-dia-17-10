<?php

Route::get('/', function () {
    return view('welcome');
});

// Rota para a página de login
use App\Http\Controllers\Auth\LoginController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rotas para alunos e professores
Route::middleware(['auth'])->group(function () {
    Route::get('/projetos', [ProjectController::class, 'index'])->name('projects.index');
    
    // Rotas específicas para alunos
    Route::middleware('can:isAluno')->group(function () {
        Route::get('/projetos/enviar', [ProjectController::class, 'create'])->name('projects.create');
        Route::post('/projetos', [ProjectController::class, 'store'])->name('projects.store');
    });

    // Rotas específicas para professores
    Route::middleware('can:isProfessor')->group(function () {
        Route::get('/projetos/aprovar', [ProjectController::class, 'approveIndex'])->name('projects.approve');
        Route::post('/projetos/{project}/aprovar', [ProjectController::class, 'approve'])->name('projects.approveProject');
    });
});
// Rota para a tela de dashboard
Route::get('/dashboard', function () {
    if (auth()->user()->type === 'aluno') {
        return view('dashboard.aluno'); // View específica para alunos
    } elseif (auth()->user()->type === 'professor') {
        return view('dashboard.professor'); // View específica para professores
    }
})->middleware('auth')->name('dashboard');
