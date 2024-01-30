<?php

declare(strict_types=1);

namespace Storipress\Twitter;

use Illuminate\Http\Client\Factory;
use Storipress\Twitter\Requests\Me;
use Storipress\Twitter\Requests\RefreshToken;
use Storipress\Twitter\Requests\Tweet;

class Twitter
{
    protected string $token = '';

    protected string $userAgent = 'storipress/twitter-sdk (https://github.com/storipress/twitter-sdk; v1.0.0)';

    protected readonly Me $me;

    protected readonly Tweet $tweet;

    protected readonly RefreshToken $refreshToken;

    /**
     * Create a new twitter instance.
     */
    public function __construct(
        public Factory $http,
    ) {
        $this->me = new Me($this);

        $this->tweet = new Tweet($this);

        $this->refreshToken = new RefreshToken($this);
    }

    /**
     * Get the current twitter instance.
     */
    public function instance(): static
    {
        return $this;
    }

    /**
     * Get the access token.
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * Set the access token for future requests.
     */
    public function setToken(string $token): static
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get the user agent.
     */
    public function getUserAgent(): string
    {
        return $this->userAgent;
    }

    /**
     * Set user agent for future requests.
     */
    public function setUserAgent(string $userAgent): static
    {
        $this->userAgent = $userAgent;

        return $this;
    }

    public function me(): Me
    {
        return $this->me;
    }

    public function tweet(): Tweet
    {
        return $this->tweet;
    }

    public function refreshToken(): RefreshToken
    {
        return $this->refreshToken;
    }
}
