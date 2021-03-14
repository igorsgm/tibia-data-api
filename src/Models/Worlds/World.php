<?php

namespace Igorsgm\TibiaDataApi\Models\Worlds;

use Igorsgm\TibiaDataApi\Traits\ImmutableTrait;
use Igorsgm\TibiaDataApi\Traits\SerializableTrait;
use JsonSerializable;

class World implements JsonSerializable
{
    use ImmutableTrait, SerializableTrait;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $online;

    /**
     * @var string
     */
    private $location;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $additional = '';

    /**
     * World constructor.
     * @param  string  $name
     * @param  int  $online
     * @param  string  $location
     * @param  string  $type
     * @param  string  $additional
     * @throws \Igorsgm\TibiaDataApi\Exceptions\ImmutableException
     */
    public function __construct(string $name, int $online, string $location, string $type, string $additional)
    {
        $this->handleImmutableConstructor();

        $this->name = $name;
        $this->online = $online;
        $this->location = $location;
        $this->type = $type;
        $this->additional = $additional;
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
    public function getOnline(): int
    {
        return $this->online;
    }

    /**
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getAdditional(): string
    {
        return $this->additional;
    }

    /**
     * @return bool
     */
    public function isBlocked(): bool
    {
        return strpos($this->additional, 'blocked') !== false;
    }

    /**
     * @return bool
     */
    public function isPremium(): bool
    {
        return strpos($this->additional, 'premium') !== false;
    }

    /**
     * @return bool
     */
    public function isLocked(): bool
    {
        return (bool) preg_match('/\blocked\b/', $this->additional);
    }

    /**
     * @return bool
     */
    public function isExperimental(): bool
    {
        return strpos($this->additional, 'experimental game world') !== false;
    }

}
