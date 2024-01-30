<?php

declare(strict_types=1);

namespace Storipress\Twitter\Requests;

use Storipress\Twitter\Objects\Me as MeObject;

class Me extends Request
{
    /**
     * Returns information about an authorized user.
     *
     * @param  array<string, string>  $options
     *
     * @link https://developer.twitter.com/en/docs/twitter-api/users/lookup/api-reference/get-users-me
     */
    public function get(array $options = []): MeObject
    {
        $data = $this->request(
            'get',
            '/users/me',
            $options,
        );

        return MeObject::from($data->data);
    }
}
