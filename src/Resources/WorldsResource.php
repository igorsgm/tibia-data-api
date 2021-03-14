<?php

namespace Igorsgm\TibiaDataApi\Resources;

use Igorsgm\TibiaDataApi\Response\WorldResponse;
use Igorsgm\TibiaDataApi\Response\WorldsResponse;

/**
 * @see https://tibiadata.com/doc-api-v2/worlds/
 */
class WorldsResource extends AbstractResource
{
    /**
     * @param  string  $name
     * @return WorldResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Igorsgm\TibiaDataApi\Exceptions\NotFoundException
     * @throws \Igorsgm\TibiaDataApi\Exceptions\ImmutableException
     */
    public function get(string $name): WorldResponse
    {
        $response = $this->sendRequest('GET', "world/{$name}.json");

        return new WorldResponse($response);
    }

    /**
     * @return WorldsResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Igorsgm\TibiaDataApi\Exceptions\ImmutableException
     */
    public function getList(): WorldsResponse
    {
        $response = $this->sendRequest('GET', "worlds.json");

        return new WorldsResponse($response);
    }
}
