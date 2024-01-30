<?php

declare(strict_types=1);

namespace Storipress\Twitter\Objects;

class RefreshToken extends TwitterObject
{
    public string $token_type;

    public int $expires_in;

    public string $access_token;

    public string $scope;

    public string $refresh_token;
}
