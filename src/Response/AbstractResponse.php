<?php

namespace Igorsgm\TibiaDataApi\Response;

use Carbon\Carbon;
use Igorsgm\TibiaDataApi\Models\Information;

/**
 * Class AbstractResponse
 * @package Igorsgm\TibiaDataApi\Response
 */
class AbstractResponse
{
    /**
     * @var Information
     */
    private $information;

    /**
     * AbstractResponse constructor.
     * @param  \stdClass  $response
     * @throws \Igorsgm\TibiaDataApi\Exceptions\ImmutableException
     * @throws \Exception
     */
    public function __construct(\stdClass $response)
    {
        $this->information = new Information(
            $response->information->api_version,
            $response->information->execution_time,
            new Carbon($response->information->last_updated),
            new Carbon($response->information->timestamp)
        );
    }

    /**
     * @return Information
     */
    public function getInformation(): Information
    {
        return $this->information;
    }
}
