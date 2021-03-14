<?php

namespace Igorsgm\TibiaDataApi\Models\Character;

use Igorsgm\TibiaDataApi\Exceptions\ImmutableException;
use Igorsgm\TibiaDataApi\Traits\ImmutableTrait;
use Igorsgm\TibiaDataApi\Traits\SerializableTrait;
use JsonSerializable;

class Achievement implements JsonSerializable
{
    use ImmutableTrait, SerializableTrait;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $stars;

    /**
     * Achievement constructor.
     * @param  string  $name
     * @param  int  $stars
     * @throws ImmutableException
     */
    public function __construct(string $name, int $stars)
    {
        $this->handleImmutableConstructor();

        $this->name = $name;
        $this->stars = $stars;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getStars(): int
    {
        return $this->stars;
    }

}
