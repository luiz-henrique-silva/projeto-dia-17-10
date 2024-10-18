<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
{
    Gate::define('isProfessor', function ($user) {
        return $user->type === 'professor';
    });

    Gate::define('isAluno', function ($user) {
        return $user->type === 'aluno';
    });
}
}
