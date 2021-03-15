<?php

namespace Igorsgm\TibiaDataApi\Models\World;

use Carbon\Carbon;
use Igorsgm\TibiaDataApi\Exceptions\ImmutableException;
use Igorsgm\TibiaDataApi\Traits\ImmutableTrait;
use Igorsgm\TibiaDataApi\Traits\SerializableTrait;

class OnlineRecord
{
    use ImmutableTrait, SerializableTrait;

    /**
     * @var int
     */
    private $number;

    /**
     * @var Carbon
     */
    private $date;

    /**
     * OnlineRecord constructor.
     * @param  int  $number
     * @param  Carbon  $date
     * @throws ImmutableException
     */
    public function __construct(int $number, Carbon $date)
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
     * @return Carbon
     */
    public function getDate(): Carbon
    {
        return $this->date;
    }
}
