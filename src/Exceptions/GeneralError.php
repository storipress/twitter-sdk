<?php

declare(strict_types=1);

namespace Storipress\Twitter\Exceptions;

use Storipress\Twitter\Objects\Error;
use Throwable;

class GeneralError extends TwitterException
{
    public function __construct(
        public Error $error,
        string $message = '',
        int $code = 0,
        ?Throwable $previous = null,
    ) {
        parent::__construct($message, $code, $previous);
    }
}
