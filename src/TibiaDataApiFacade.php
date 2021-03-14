<?php

namespace Igorsgm\TibiaDataApi;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Igorsgm\TibiaDataApi\Skeleton\SkeletonClass
 */
class TibiaDataApiFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'tibia-data-api';
    }
}
