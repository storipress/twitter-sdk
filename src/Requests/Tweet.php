<?php

declare(strict_types=1);

namespace Storipress\Twitter\Requests;

use Storipress\Twitter\Objects\Tweet as TweetObject;

class Tweet extends Request
{
    /**
     * Creates a Tweet on behalf of an authenticated user.
     *
     * @param  array{
     *     text: string,
     *     direct_message_deep_link?: string,
     *     for_super_followers_only?: bool,
     *     geo?: array{
     *         place_id?: string,
     *     },
     *     media?: array{
     *         media_ids?: array<int, string>,
     *         tagged_user_ids?: array<int, string>,
     *     },
     *     poll?: array{
     *         duration_minutes?: integer,
     *         options?: array<int, string>,
     *     },
     *     reply?: array{
     *         exclude_reply_user_ids?: array<int, string>,
     *         in_reply_to_tweet_id?: string,
     *     },
     *     reply_settings?: string,
     * }  $options
     *
     * @link https://developer.twitter.com/en/docs/twitter-api/tweets/manage-tweets/api-reference/post-tweets
     */
    public function create(array $options): TweetObject
    {
        $data = $this->request(
            'post',
            '/tweets',
            $options,
        );

        return TweetObject::from($data->data);
    }

    /**
     * Allows a user or authenticated user ID to delete a Tweet.
     *
     * @link https://developer.twitter.com/en/docs/twitter-api/tweets/manage-tweets/api-reference/delete-tweets-id
     */
    public function delete(string $id): bool
    {
        $data = $this->request(
            'delete',
            sprintf('/tweets/%s', $id),
        );

        return $data->data->deleted;
    }
}
