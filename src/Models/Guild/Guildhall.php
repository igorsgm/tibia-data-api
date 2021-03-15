<?php

namespace Igorsgm\TibiaDataApi\Models\Guild;

use Carbon\Carbon;
use Igorsgm\TibiaDataApi\Exceptions\ImmutableException;
use Igorsgm\TibiaDataApi\Traits\ImmutableTrait;
use Igorsgm\TibiaDataApi\Traits\SerializableTrait;

class Guildhall
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
     * @var Carbon
     */
    private $paid;

    /**
     * @var string
     */
    private $world;

    /**
     * @var int
     */
    private $houseId;

    /**
     * Guildhall constructor.
     *
     * @param  string  $name
     * @param  string  $town
     * @param  Carbon  $paid
     * @param  string  $world
     * @param  int  $houseId
     * @throws ImmutableException
     */
    public function __construct(string $name, string $town, Carbon $paid, string $world, int $houseId)
    {
        $this->handleImmutableConstructor();

        $this->name = $name;
        $this->town = $town;
        $this->paid = $paid;
        $this->world = $world;
        $this->houseId = $houseId;
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
     * @return Carbon
     */
    public function getPaid(): Carbon
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
    public function getHouseId(): int
    {
        return $this->houseId;
    }
}
