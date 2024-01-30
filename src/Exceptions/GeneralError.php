<?php

declare(strict_types=1);

namespace Storipress\Twitter\Exceptions;

use Storipress\Twitter\Objects\Error;

class GeneralError extends TwitterException
{
    public Error $error;
}
