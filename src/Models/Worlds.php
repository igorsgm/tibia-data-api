<?php

namespace Igorsgm\TibiaDataApi\Models;

use Igorsgm\TibiaDataApi\Models\Worlds\World;
use Igorsgm\TibiaDataApi\Traits\ImmutableTrait;
use Igorsgm\TibiaDataApi\Traits\SerializableTrait;
use Illuminate\Support\Collection;

class Worlds
{
    use ImmutableTrait, SerializableTrait;

    /**
     * @var int
     */
    private $online;

    /**
     * @var array
     */
    private $worlds;

    /**
     * Worlds constructor.
     * @param  int  $online
     * @param  array  $worlds
     * @throws \Igorsgm\TibiaDataApi\Exceptions\ImmutableException
     */
    public function __construct(int $online, Collection $worlds)
    {
        $this->handleImmutableConstructor();

        $this->online = $online;
        $this->worlds = $worlds;
    }

    /**
     * @return int
     */
    public function getOnline(): int
    {
        return $this->online;
    }

    /**
     * @return World[]
     */
    public function getWorlds(): Collection
    {
        return $this->worlds;
    }
}
