<?php

namespace Igorsgm\TibiaDataApi\Traits;

/**
 * Trait SerializableTrait
 * @package Igorsgm\TibiaDataApi\Models
 */
trait SerializableTrait
{

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
