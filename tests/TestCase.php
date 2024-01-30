<?php

declare(strict_types=1);

namespace Tests;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Http;
use Orchestra\Testbench\Concerns\WithWorkbench;
use Orchestra\Testbench\TestCase as BaseTestCase;
use Storipress\Twitter\Twitter;

class TestCase extends BaseTestCase
{
    use WithWorkbench;

    public Twitter $twitter;

    protected function setUp(): void
    {
        parent::setUp();

        $this->assertInstanceOf(Application::class, $this->app);

        $this->twitter = $this->app->make('twitter');

        Http::preventStrayRequests();

        $data = require __DIR__.'/Dataset/all.php';

        Http::fake($data);
    }
}
