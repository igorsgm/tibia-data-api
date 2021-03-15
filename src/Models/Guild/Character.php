<?php

namespace Igorsgm\TibiaDataApi\Models\Guild;

use Carbon\Carbon;
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
    private $nick;

    /**
     * @var int
     */
    private $level;

    /**
     * @var string
     */
    private $vocation;

    /**
     * @var Carbon
     */
    private $joined;

    /**
     * @var string
     */
    private $status;

    /**
     * Character constructor.
     *
     * @param  string  $name
     * @param  string  $nick
     * @param  int  $level
     * @param  string  $vocation
     * @param  Carbon  $joined
     * @param  string  $status
     * @throws ImmutableException
     */
    public function __construct(
        string $name,
        string $nick,
        int $level,
        string $vocation,
        Carbon $joined,
        string $status
    ) {
        $this->handleImmutableConstructor();

        $this->name = $name;
        $this->nick = $nick;
        $this->level = $level;
        $this->vocation = $vocation;
        $this->joined = $joined;
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
    public function getNick(): string
    {
        return $this->nick;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @return string
     */
    public function getVocation(): string
    {
        return $this->vocation;
    }

    /**
     * @return Carbon
     */
    public function getJoined(): Carbon
    {
        return $this->joined;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }
}
