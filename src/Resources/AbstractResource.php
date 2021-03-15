<?php

namespace Igorsgm\TibiaDataApi\Resources;

use Igorsgm\TibiaDataApi\TibiaDataApi;
use Psr\Http\Message\UriInterface;

/**
 * Class AbstractResource
 * @package Igorsgm\TibiaDataApi\Resources
 */
class AbstractResource
{
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
     * @param  string  $method  HTTP method.
     * @param  string|UriInterface  $uri  URI object or string.
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

        $uri = '/'.config('tibia-data-api.version').'/'.$uri;

        $response = $this->tibiaData->getHttpClient()->request($method, $uri, [
            'headers' => $headers,
            'body' => $body,
            'version' => $protocolVersion
        ]);

        return json_decode($response->getBody()->getContents());
    }
}
