<?php

namespace Igorsgm\TibiaDataApi\Models;

use Carbon\Carbon;
use Igorsgm\TibiaDataApi\Traits\ImmutableTrait;
use Igorsgm\TibiaDataApi\Traits\SerializableTrait;

class Information implements \JsonSerializable
{
    use ImmutableTrait, SerializableTrait;

    /**
     * @var int
     */
    private $api_version;

    /**
     * @var float
     */
    private $execution_time;

    /**
     * @var Carbon
     */
    private $last_updated;

    /**
     * @var Carbon
     */
    private $timestamp;

    /**
     * Information constructor.
     * @param  int  $api_version
     * @param  float  $execution_time
     * @param  Carbon  $last_update
     * @param  Carbon  $timestamp
     * @throws \Igorsgm\TibiaDataApi\Exceptions\ImmutableException
     */
    public function __construct(int $api_version, float $execution_time, Carbon $last_update, Carbon $timestamp)
    {
        $this->handleImmutableConstructor();

        $this->api_version = $api_version;
        $this->execution_time = $execution_time;
        $this->last_updated = $last_update;
        $this->timestamp = $timestamp;
    }

    /**
     * @return int
     */
    public function getApiVersion(): int
    {
        return $this->api_version;
    }

    /**
     * @return float
     */
    public function getExecutionTime(): float
    {
        return $this->execution_time;
    }

    /**
     * @return Carbon
     */
    public function getLastUpdated(): Carbon
    {
        return $this->last_updated;
    }

    /**
     * @return Carbon
     */
    public function getTimestamp(): Carbon
    {
        return $this->timestamp;
    }
}
