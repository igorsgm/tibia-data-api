<?php

namespace Igorsgm\TibiaDataApi\Tests;

use Orchestra\Testbench\TestCase;
use Igorsgm\TibiaDataApi\TibiaDataApiServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [TibiaDataApiServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
