<?php

declare(strict_types=1);

namespace Storipress\Twitter\Requests;

use Illuminate\Http\Client\Response;
use stdClass;
use Storipress\Twitter\Exceptions\GeneralError;
use Storipress\Twitter\Exceptions\UnexpectedResponseData;
use Storipress\Twitter\Objects\Error;
use Storipress\Twitter\Twitter;

abstract class Request
{
    const ENDPOINT = 'https://api.twitter.com';

    const VERSION = '2';

    /**
     * Create a new request instance.
     */
    public function __construct(
        protected readonly Twitter $app,
    ) {
        //
    }

    /**
     * @param  'get'|'post'|'delete'  $method
     * @param  non-empty-string  $path
     * @param  array<string, mixed>  $options
     */
    protected function request(
        string $method,
        string $path,
        array $options = [],
    ): stdClass {
        $app = $this->app;

        $response = $app->http
            ->acceptJson()
            ->asJson()
            ->withUserAgent($app->getUserAgent())
            ->withToken($app->getToken())
            ->{$method}($this->url($path), $options);

        if (! ($response instanceof Response)) {
            throw new UnexpectedResponseData();
        }

        $data = $response->object();

        if (! ($data instanceof stdClass)) {
            throw new UnexpectedResponseData();
        }

        if (! $response->successful()) {
            $exception = new GeneralError(
                $response->body(),
                $response->status(),
            );

            $exception->error = Error::from($data);

            throw $exception;
        }

        return $data;
    }

    /**
     * Build up the request API URL.
     */
    protected function url(string $path): string
    {
        return sprintf(
            '%s/%s/%s',
            rtrim(self::ENDPOINT, '/'),
            self::VERSION,
            ltrim($path, '/'),
        );
    }
}
