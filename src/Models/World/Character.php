<?php

namespace Igorsgm\TibiaDataApi\Models\World;

use Igorsgm\TibiaDataApi\Exceptions\ImmutableException;
use Igorsgm\TibiaDataApi\Traits\ImmutableTrait;
use Igorsgm\TibiaDataApi\Traits\SerializableTrait;

class Character
{
    use ImmutableTrait, SerializableTrait;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $vocation;

    /**
     * @var int
     */
    private $level;

    /**
     * Character constructor.
     * @param  string  $name
     * @param  int  $level
     * @param  string  $vocation
     * @throws ImmutableException
     */
    public function __construct(string $name, int $level, string $vocation)
    {
        $this->handleImmutableConstructor();

        $this->name = $name;
        $this->vocation = $vocation;
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
     * @return string
     */
    public function getVocation(): string
    {
        return $this->vocation;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }
}
