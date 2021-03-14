<?php

namespace Igorsgm\TibiaDataApi\Traits;

use Igorsgm\TibiaDataApi\Exceptions\ImmutableException;

/**
 * Trait ImmutableTrait
 * @package Igorsgm\TibiaDataApi\Models
 */
trait ImmutableTrait
{
    /**
     * @var bool
     */
    protected $mutable = true;

    /**
     * @throws ImmutableException
     */
    public function handleImmutableConstructor()
    {
        if (!$this->mutable) {
            throw new ImmutableException();
        }

        $this->mutable = false;
    }

    /**
     * @param $key
     * @param $value
     * @throws ImmutableException
     */
    public function __set($key, $value)
    {
        throw new ImmutableException();
    }
}
