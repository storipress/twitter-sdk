<?php

declare(strict_types=1);

namespace Storipress\Twitter\Objects;

use stdClass;

class Me extends TwitterObject
{
    public string $id;

    public string $name;

    public string $username;

    public ?string $created_at = null;

    public ?string $most_recent_tweet_id = null;

    public ?bool $protected = null;

    public ?stdClass $withheld = null;

    public ?string $location = null;

    public ?string $url = null;

    public ?string $description = null;

    public ?bool $verified = null;

    /**
     * @var 'blue'|'business'|'government'|'none'|null
     */
    public ?string $verified_type = null;

    public ?stdClass $entities = null;

    public ?string $profile_image_url = null;

    public ?stdClass $public_metrics = null;

    public ?string $pinned_tweet_id = null;
}
