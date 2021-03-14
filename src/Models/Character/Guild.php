<?php

namespace Igorsgm\TibiaDataApi\Models\Character;

use Igorsgm\TibiaDataApi\Exceptions\ImmutableException;
use Igorsgm\TibiaDataApi\Traits\ImmutableTrait;
use Igorsgm\TibiaDataApi\Traits\SerializableTrait;
use JsonSerializable;

class Guild implements JsonSerializable
{
    use ImmutableTrait, SerializableTrait;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $rank;

    /**
     * Guild constructor.
     * @param  string  $name
     * @param  string  $rank
     * @throws ImmutableException
     */
    public function __construct(string $name, string $rank)
    {
        $this->handleImmutableConstructor();

        $this->name = $name;
        $this->rank = $rank;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getRank(): string
    {
        return $this->rank;
    }
}
