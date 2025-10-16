<?php

namespace App\Providers;

use App\Models\Penelitian;
use App\Models\Publikasi;
use App\Policies\PenelitianPolicy;
use App\Policies\PublikasiPolicy;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Publikasi::class => PublikasiPolicy::class,
        Penelitian::class => PenelitianPolicy::class,
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
