<?php

namespace App\Providers;

use App\Models\Jurnal;
use App\Policies\JurnalPolicy;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Jurnal::class => JurnalPolicy::class, // <-- TAMBAHKAN BARIS INI
    ];

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
    public function boot(): void
    {
        //
    }
}
