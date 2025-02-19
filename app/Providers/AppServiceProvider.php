<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

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
    public function boot(): void
    {
        $api = 'http://hotel.foisal/api';
        $image_url='http://hotel.foisal/';
        // view()->share(['image_url' => $image_url]);
        view()->share(['image_url' => $image_url]);

        $setup = Http::get($api . '/ws-setup');

        view()->share(['setup' => $setup->ok() == true ? json_decode($setup->body()) : []]);
    }
}
