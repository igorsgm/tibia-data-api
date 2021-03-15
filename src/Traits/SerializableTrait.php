<?php

namespace Igorsgm\TibiaDataApi\Traits;

trait SerializableTrait
{

    /**
     * @return array
     */
    public function toArray()
    {
        return get_object_vars($this);
    }
}
