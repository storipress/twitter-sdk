<?php

declare(strict_types=1);

namespace Tests;

use Storipress\Twitter\Exceptions\TwitterException;
use Storipress\Twitter\Objects\TwitterObject;
use Storipress\Twitter\Requests\Request;

test('There are no debugging statements remaining in our code.')
    ->expect(['dd', 'dump', 'ray', 'var_dump', 'echo'])
    ->not
    ->toBeUsed();

test('Strict typing must be enforced in the code.')
    ->expect('Storipress\Twitter')
    ->toUseStrictTypes();

test('The code should not utilize the "final" keyword.')
    ->expect('Storipress\Twitter')
    ->not()
    ->toBeFinal();

test('All Request classes should extend "Request".')
    ->expect('Storipress\Twitter\Requests')
    ->classes()
    ->toExtend(Request::class);

test('All Object classes should extend "TwitterObject".')
    ->expect('Storipress\Twitter\Objects')
    ->classes()
    ->toExtend(TwitterObject::class);

test('All Exception classes should extend "Exception".')
    ->expect('Storipress\Twitter\Exceptions')
    ->classes()
    ->toExtend(TwitterException::class);
