<?php

namespace App\Providers;

use App\Models\BebasLab;
use App\Models\Peminjaman;
use App\Observers\BebasLabObserver;
use App\Observers\PeminjamanObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Peminjaman::observe(PeminjamanObserver::class);
        BebasLab::observe(BebasLabObserver::class);
    }
}
