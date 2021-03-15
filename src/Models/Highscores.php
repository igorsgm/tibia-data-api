<?php

namespace Igorsgm\TibiaDataApi\Models;

use Igorsgm\TibiaDataApi\Models\Highscores\Character;
use Igorsgm\TibiaDataApi\Traits\ImmutableTrait;
use Igorsgm\TibiaDataApi\Traits\SerializableTrait;
use Illuminate\Support\Collection;

class Highscores
{
    use ImmutableTrait, SerializableTrait;

    /**
     * @var string
     */
    private $world;

    /**
     * @var string
     */
    private $category;

    /**
     * @var Collection
     */
    private $highscores;

    /**
     * Highscores constructor.
     *
     * @param  string  $world
     * @param  string  $category
     * @param  array  $highscores
     * @throws \Igorsgm\TibiaDataApi\Exceptions\ImmutableException
     */
    public function __construct(string $world, string $category, Collection $highscores)
    {
        $this->handleImmutableConstructor();

        $this->world = $world;
        $this->category = $category;
        $this->highscores = $highscores;
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
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @return Character[]
     */
    public function getHighscores(): Collection
    {
        return $this->highscores;
    }
}
