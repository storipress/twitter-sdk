<?php

declare(strict_types=1);

namespace Storipress\Twitter\Objects;

class Error extends TwitterObject
{
    public ?string $client_id = null;

    public ?string $required_enrollment = null;

    public string $title;

    public string $detail;

    public ?string $reason = null;

    public string $type;

    public ?string $registration_url = null;

    public ?int $status = null;
}
