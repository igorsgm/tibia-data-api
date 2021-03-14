<?php

namespace Igorsgm\TibiaDataApi\Resources;

use Igorsgm\TibiaDataApi\TibiaDataApi;

/**
 * Class AbstractResource
 * @package Igorsgm\TibiaDataApi\Resources
 */
class AbstractResource
{
    const API_URL = '/v2/';

    /**
     * @var TibiaDataApi
     */
    protected $tibiaData;

    /**
     * AbstractResource constructor.
     * @param  TibiaDataApi  $tibiaData
     */
    public function __construct(TibiaDataApi $tibiaData)
    {
        $this->tibiaData = $tibiaData;
    }

    /**
     * @param $method
     * @param $uri
     * @param  array  $headers
     * @param  null  $body
     * @param  string  $protocolVersion
     * @return \stdClass
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function sendRequest(
        $method,
        $uri,
        array $headers = [],
        $body = null,
        $protocolVersion = '1.1'
    ): \stdClass {

        $response = $this->tibiaData->getHttpClient()->request($method, self::API_URL.$uri, [
            'headers' => $headers,
            'body' => $body,
            'version' => $protocolVersion
        ]);

        return json_decode($response->getBody()->getContents());
    }
}
