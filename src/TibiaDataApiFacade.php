<?php

namespace Igorsgm\TibiaDataApi;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Igorsgm\TibiaDataApi\TibiaDataApi
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
