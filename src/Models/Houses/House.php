<?php

namespace Igorsgm\TibiaDataApi\Models\Houses;

use Igorsgm\TibiaDataApi\Traits\ImmutableTrait;
use Igorsgm\TibiaDataApi\Traits\SerializableTrait;
use JsonSerializable;

class House implements JsonSerializable
{
    use ImmutableTrait, SerializableTrait;

    /**
     * @var int
     */
    private $houseid;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $size;

    /**
     * @var int
     */
    private $rent;

    /**
     * @var string
     */
    private $status;

    /**
     * House constructor.
     * @param  int  $id
     * @param  string  $name
     * @param  int  $size
     * @param  int  $rent
     * @param  string  $status
     * @throws \Igorsgm\TibiaDataApi\Exceptions\ImmutableException
     */
    public function __construct(int $id, string $name, int $size, int $rent, string $status)
    {
        $this->handleImmutableConstructor();

        $this->houseid = $id;
        $this->name = $name;
        $this->size = $size;
        $this->rent = $rent;
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getHouseid(): int
    {
        return $this->houseid;
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
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @return int
     */
    public function getRent(): int
    {
        return $this->rent;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return bool
     */
    public function isRented()
    {
        return $this->status === 'rented';
    }
}
