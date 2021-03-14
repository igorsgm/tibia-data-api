<?php

namespace Igorsgm\TibiaDataApi\Models;

use Igorsgm\TibiaDataApi\Models\Highscores\Character;
use Igorsgm\TibiaDataApi\Traits\ImmutableTrait;
use Igorsgm\TibiaDataApi\Traits\SerializableTrait;

class Highscores implements \JsonSerializable
{
    use ImmutableTrait, SerializableTrait;

    /**
     * @var string
     */
    private $world;

    /**
     * @var string
     */
    private $type;

    /**
     * @var array
     */
    private $highscores;

    /**
     * Highscores constructor.
     * @param  string  $world
     * @param  string  $type
     * @param  array  $highscores
     * @throws \Igorsgm\TibiaDataApi\Exceptions\ImmutableException
     */
    public function __construct(string $world, string $type, array $highscores)
    {
        $this->handleImmutableConstructor();

        $this->world = $world;
        $this->type = $type;
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
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return Character[]
     */
    public function getHighscores(): array
    {
        return $this->highscores;
    }
}
