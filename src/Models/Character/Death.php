<?php

namespace Igorsgm\TibiaDataApi\Models\Character;

use Carbon\Carbon;
use Igorsgm\TibiaDataApi\Exceptions\ImmutableException;
use Igorsgm\TibiaDataApi\Traits\ImmutableTrait;
use Igorsgm\TibiaDataApi\Traits\SerializableTrait;
use JsonSerializable;

class Death implements JsonSerializable
{
    use ImmutableTrait, SerializableTrait;

    /**
     * @var Carbon
     */
    private $date;

    /**
     * @var int
     */
    private $level;

    /**
     * @var string
     */
    private $reason;

    /**
     * @var array
     */
    private $involved;

    /**
     * Death constructor.
     * @param  Carbon  $date
     * @param  int  $level
     * @param  string  $reason
     * @param  array  $involved
     * @throws ImmutableException
     */
    public function __construct(Carbon $date, int $level, string $reason, array $involved)
    {
        $this->handleImmutableConstructor();

        $this->date = $date;
        $this->level = $level;
        $this->reason = $reason;
        $this->involved = $involved;
    }

    /**
     * @return Carbon
     */
    public function getDate(): Carbon
    {
        return $this->date;
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
    public function getReason(): string
    {
        return $this->reason;
    }

    /**
     * @return array
     */
    public function getInvolved(): array
    {
        return $this->involved;
    }
}
