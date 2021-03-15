<?php

namespace Igorsgm\TibiaDataApi\Tests;

use Igorsgm\TibiaDataApi\Facades\TibiaDataApi;
use Igorsgm\TibiaDataApi\TibiaDataApiServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            TibiaDataApiServiceProvider::class
        ];
    }

    /**
     * Get package aliases.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'TibiaDataApi' => TibiaDataApi::class
        ];
    }
}
