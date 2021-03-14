<?php

namespace Igorsgm\TibiaDataApi\Models\Character;

use Igorsgm\TibiaDataApi\Exceptions\ImmutableException;
use Igorsgm\TibiaDataApi\Traits\ImmutableTrait;
use Igorsgm\TibiaDataApi\Traits\SerializableTrait;
use JsonSerializable;

class OtherCharacter implements JsonSerializable
{
    use ImmutableTrait, SerializableTrait;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $world;

    /**
     * @var string
     */
    private $status;

    /**
     * OtherCharacter constructor.
     * @param  string  $name
     * @param  string  $world
     * @param  string  $status
     * @throws ImmutableException
     */
    public function __construct(string $name, string $world, string $status)
    {
        $this->handleImmutableConstructor();

        $this->name = $name;
        $this->world = $world;
        $this->status = $status;
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
    public function getWorld(): string
    {
        return $this->world;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

}
