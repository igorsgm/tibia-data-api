<?php

namespace Igorsgm\TibiaDataApi\Models;

use Igorsgm\TibiaDataApi\Models\Guilds\Guild;
use Igorsgm\TibiaDataApi\Traits\ImmutableTrait;
use Igorsgm\TibiaDataApi\Traits\SerializableTrait;

class Guilds implements \JsonSerializable
{
    use ImmutableTrait, SerializableTrait;

    /**
     * @var string
     */
    private $world;

    /**
     * @var array
     */
    private $active;

    /**
     * @var array
     */
    private $formation;

    /**
     * Guilds constructor.
     * @param  string  $world
     * @param  array  $active
     * @param  array  $formation
     * @throws \Igorsgm\TibiaDataApi\Exceptions\ImmutableException
     */
    public function __construct(string $world, array $active, array $formation)
    {
        $this->handleImmutableConstructor();

        $this->world = $world;
        $this->active = $active;
        $this->formation = $formation;
    }

    /**
     * @return string
     */
    public function getWorld(): string
    {
        return $this->world;
    }

    /**
     * @return Guild[]
     */
    public function getActive(): array
    {
        return $this->active;
    }

    /**
     * @return Guild[]
     */
    public function getFormation(): array
    {
        return $this->formation;
    }
}
