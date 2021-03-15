<?php

namespace Igorsgm\TibiaDataApi\Models;

use Igorsgm\TibiaDataApi\Exceptions\ImmutableException;
use Igorsgm\TibiaDataApi\Models\Guilds\Guild;
use Igorsgm\TibiaDataApi\Traits\ImmutableTrait;
use Igorsgm\TibiaDataApi\Traits\SerializableTrait;
use Illuminate\Support\Collection;

class Guilds
{
    use ImmutableTrait, SerializableTrait;

    /**
     * @var string
     */
    private $world;

    /**
     * @var Collection
     */
    private $active;

    /**
     * @var Collection
     */
    private $formation;

    /**
     * Guilds constructor.
     * @param  string  $world
     * @param  array  $active
     * @param  array  $formation
     * @throws ImmutableException
     */
    public function __construct(string $world, Collection $active, Collection $formation)
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
    public function getActive(): Collection
    {
        return $this->active;
    }

    /**
     * @return Guild[]
     */
    public function getFormation(): Collection
    {
        return $this->formation;
    }
}
