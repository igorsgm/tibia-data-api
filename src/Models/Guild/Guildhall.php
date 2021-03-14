<?php

namespace Igorsgm\TibiaDataApi\Models\Guild;

use DateTime;
use Igorsgm\TibiaDataApi\Exceptions\ImmutableException;
use Igorsgm\TibiaDataApi\Traits\ImmutableTrait;
use Igorsgm\TibiaDataApi\Traits\SerializableTrait;
use JsonSerializable;

class Guildhall implements JsonSerializable
{
    use ImmutableTrait, SerializableTrait;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $town;

    /**
     * @var DateTime
     */
    private $paid;

    /**
     * @var string
     */
    private $world;

    /**
     * @var int
     */
    private $houseid;

    /**
     * Guildhall constructor.
     *
     * @param  string  $name
     * @param  string  $town
     * @param  DateTime  $paid
     * @param  string  $world
     * @param  int  $houseid
     * @throws ImmutableException
     */
    public function __construct(string $name, string $town, DateTime $paid, string $world, int $houseid)
    {
        $this->handleImmutableConstructor();

        $this->name = $name;
        $this->town = $town;
        $this->paid = $paid;
        $this->world = $world;
        $this->houseid = $houseid;
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
    public function getTown(): string
    {
        return $this->town;
    }

    /**
     * @return DateTime
     */
    public function getPaid(): DateTime
    {
        return $this->paid;
    }

    /**
     * @return string
     */
    public function getWorld(): string
    {
        return $this->world;
    }

    /**
     * @return int
     */
    public function getHouseid(): int
    {
        return $this->houseid;
    }
}
