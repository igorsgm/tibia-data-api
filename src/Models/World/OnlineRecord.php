<?php

namespace Igorsgm\TibiaDataApi\Models\World;

use DateTime;
use Igorsgm\TibiaDataApi\Traits\ImmutableTrait;
use Igorsgm\TibiaDataApi\Traits\SerializableTrait;
use JsonSerializable;

class OnlineRecord implements JsonSerializable
{
    use ImmutableTrait, SerializableTrait;

    /**
     * @var int
     */
    private $number;

    /**
     * @var DateTime
     */
    private $date;

    /**
     * OnlineRecord constructor.
     * @param  int  $number
     * @param  DateTime  $date
     * @throws \Igorsgm\TibiaDataApi\Exceptions\ImmutableException
     */
    public function __construct(int $number, DateTime $date)
    {
        $this->handleImmutableConstructor();

        $this->number = $number;
        $this->date = $date;
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @return DateTime
     */
    public function getDate(): DateTime
    {
        return $this->date;
    }

}
