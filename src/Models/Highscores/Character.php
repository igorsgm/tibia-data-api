<?php

namespace Igorsgm\TibiaDataApi\Models\Highscores;

use Igorsgm\TibiaDataApi\Traits\ImmutableTrait;
use Igorsgm\TibiaDataApi\Traits\SerializableTrait;

class Character implements \JsonSerializable
{
    use ImmutableTrait, SerializableTrait;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $rank;

    /**
     * @var string
     */
    private $vocation;

    /**
     * @var float|null
     */
    private $points;

    /**
     * @var int|null
     */
    private $level;

    /**
     * Character constructor.
     * @param  string  $name
     * @param  int  $rank
     * @param  string  $vocation
     * @param  float|null  $points
     * @param  int|null  $level
     * @throws \Igorsgm\TibiaDataApi\Exceptions\ImmutableException
     */
    public function __construct(string $name, int $rank, string $vocation, ?float $points, ?int $level)
    {
        $this->handleImmutableConstructor();

        $this->name = $name;
        $this->rank = $rank;
        $this->vocation = $vocation;
        $this->points = $points;
        $this->level = $level;
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
    public function getRank(): int
    {
        return $this->rank;
    }

    /**
     * @return string
     */
    public function getVocation(): string
    {
        return $this->vocation;
    }

    /**
     * @return float|null
     */
    public function getPoints(): ?float
    {
        return $this->points;
    }

    /**
     * @return int|null
     */
    public function getLevel(): ?int
    {
        return $this->level;
    }

}
