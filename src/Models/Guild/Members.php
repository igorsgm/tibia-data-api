<?php

namespace Igorsgm\TibiaDataApi\Models\Guild;

use Igorsgm\TibiaDataApi\Exceptions\ImmutableException;
use Igorsgm\TibiaDataApi\Traits\ImmutableTrait;
use Igorsgm\TibiaDataApi\Traits\SerializableTrait;
use JsonSerializable;

class Members implements JsonSerializable
{
    use ImmutableTrait, SerializableTrait;

    /**
     * @var string
     */
    private $rank_title;

    /**
     * @var Character[]
     */
    private $characters;

    /**
     * Members constructor.
     * @param  string  $rank_title
     * @param  array  $characters
     * @throws ImmutableException
     */
    public function __construct(string $rank_title, array $characters)
    {
        $this->handleImmutableConstructor();

        $this->rank_title = $rank_title;
        $this->characters = $characters;
    }

    /**
     * @return string
     */
    public function getRankTitle(): string
    {
        return $this->rank_title;
    }

    /**
     * @return Character[]
     */
    public function getCharacters(): array
    {
        return $this->characters;
    }

}
