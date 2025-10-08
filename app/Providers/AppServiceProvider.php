<?php

namespace App\Providers;

use App\Models\Jurnal;
use App\Models\Publikasi;
use App\Policies\JurnalPolicy;
use App\Policies\PublikasiPolicy;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected $policies = [
        Publikasi::class => PublikasiPolicy::class,
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
