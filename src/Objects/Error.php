<?php

declare(strict_types=1);

namespace Storipress\Twitter\Objects;

class Error extends TwitterObject
{
    public string $client_id;

    public string $required_enrollment;

    public string $title;

    public string $detail;

    public string $reason;

    public string $type;

    public string $registration_url;
}
