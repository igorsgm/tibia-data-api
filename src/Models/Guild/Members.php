<?php

namespace Igorsgm\TibiaDataApi\Models\Guild;

use Igorsgm\TibiaDataApi\Exceptions\ImmutableException;
use Igorsgm\TibiaDataApi\Traits\ImmutableTrait;
use Igorsgm\TibiaDataApi\Traits\SerializableTrait;
use Illuminate\Support\Collection;

class Members
{
    use ImmutableTrait, SerializableTrait;

    /**
     * @var string
     */
    private $rankTitle;

    /**
     * @var Character[]
     */
    private $characters;

    /**
     * Members constructor.
     * @param  string  $rankTitle
     * @param  array  $characters
     * @throws ImmutableException
     */
    public function __construct(string $rankTitle, Collection $characters)
    {
        $this->handleImmutableConstructor();

        $this->rankTitle = $rankTitle;
        $this->characters = $characters;
    }

    /**
     * @return string
     */
    public function getRankTitle(): string
    {
        return $this->rankTitle;
    }

    /**
     * @return Character[]
     */
    public function getCharacters(): Collection
    {
        return $this->characters;
    }
}
