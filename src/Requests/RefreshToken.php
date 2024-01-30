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
            ->asForm()
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

        if (! $response->successful() || ! ($data instanceof stdClass)) {
            throw new InvalidRefreshToken();
        }

        return RefreshTokenObject::from($data);
    }

    /**
     * @param  'access_token'|'refresh_token'  $hint
     */
    public function revoke(
        string $clientId,
        string $clientSecret,
        string $token,
        string $hint,
    ): bool {
        $response = $this->app->http
            ->asForm()
            ->withUserAgent($this->app->getUserAgent())
            ->withBasicAuth($clientId, $clientSecret)
            ->post(
                $this->url('/oauth2/revoke'),
                [
                    'token' => $token,
                    'token_type_hint' => $hint,
                ],
            );

        return (bool) $response->json('revoked');
    }
}
