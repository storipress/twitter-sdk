<?php

declare(strict_types=1);

namespace Storipress\Twitter\Requests;

use stdClass;
use Storipress\Twitter\Exceptions\InvalidRefreshToken;
use Storipress\Twitter\Objects\RefreshToken as RefreshTokenObject;

class RefreshToken extends Request
{
    /**
     * @link https://developer.twitter.com/en/docs/authentication/oauth-2-0/authorization-code
     * @link https://developer.twitter.com/en/docs/authentication/oauth-2-0/user-access-token
     */
    public function obtain(
        string $clientId,
        string $clientSecret,
        string $refreshToken,
    ): RefreshTokenObject {
        $response = $this->app->http
            ->withUserAgent($this->app->getUserAgent())
            ->withBasicAuth($clientId, $clientSecret)
            ->post(
                $this->url('/oauth2/token'),
                [
                    'grant_type' => 'refresh_token',
                    'refresh_token' => $refreshToken,
                ],
            );

        $data = $response->object();

        if (! ($data instanceof stdClass)) {
            throw new InvalidRefreshToken();
        }

        return RefreshTokenObject::from($data);
    }
}
