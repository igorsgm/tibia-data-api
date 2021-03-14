<?php

namespace Igorsgm\TibiaDataApi\Resources;

use Igorsgm\TibiaDataApi\Response\GuildsResponse;

/**
 * @see https://tibiadata.com/doc-api-v2/characters/
 */
class GuildsResource extends AbstractResource
{
    /**
     * @param  string  $server
     * @return GuildsResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Igorsgm\TibiaDataApi\Exceptions\NotFoundException
     */
    public function get(string $server): GuildsResponse
    {
        $response = $this->sendRequest('GET', "guilds/{$server}.json");

        return new GuildsResponse($response);
    }

}
