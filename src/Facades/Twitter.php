<?php

declare(strict_types=1);

namespace Storipress\Twitter\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Storipress\Twitter\Twitter instance()
 */
class Twitter extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'twitter';
    }
}
