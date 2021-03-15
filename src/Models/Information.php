<?php

namespace Igorsgm\TibiaDataApi\Models;

use Carbon\Carbon;
use Igorsgm\TibiaDataApi\Traits\ImmutableTrait;
use Igorsgm\TibiaDataApi\Traits\SerializableTrait;

class Information
{
    use ImmutableTrait, SerializableTrait;

    /**
     * @var int
     */
    private $apiVersion;

    /**
     * @var float
     */
    private $executionTime;

    /**
     * @var Carbon
     */
    private $lastUpdated;

    /**
     * @var Carbon
     */
    private $timestamp;

    /**
     * Information constructor.
     * @param  int  $apiVersion
     * @param  float  $executionTime
     * @param  Carbon  $lastUpdate
     * @param  Carbon  $timestamp
     * @throws \Igorsgm\TibiaDataApi\Exceptions\ImmutableException
     */
    public function __construct(int $apiVersion, float $executionTime, Carbon $lastUpdate, Carbon $timestamp)
    {
        $this->handleImmutableConstructor();

        $this->apiVersion = $apiVersion;
        $this->executionTime = $executionTime;
        $this->lastUpdated = $lastUpdate;
        $this->timestamp = $timestamp;
    }

    /**
     * @return int
     */
    public function getApiVersion(): int
    {
        return $this->apiVersion;
    }

    /**
     * @return float
     */
    public function getExecutionTime(): float
    {
        return $this->executionTime;
    }

    /**
     * @return Carbon
     */
    public function getLastUpdated(): Carbon
    {
        return $this->lastUpdated;
    }

    /**
     * @return Carbon
     */
    public function getTimestamp(): Carbon
    {
        return $this->timestamp;
    }
}
