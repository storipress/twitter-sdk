<?php

declare(strict_types=1);

namespace Storipress\Twitter;

use Illuminate\Support\ServiceProvider;

class TwitterServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(
            'twitter',
            fn () => $this->app->make(Twitter::class),
        );
    }
}
