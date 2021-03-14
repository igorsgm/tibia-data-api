<?php

namespace Igorsgm\TibiaDataApi\Resources;

use Igorsgm\TibiaDataApi\Response\GuildResponse;

/**
 * @see https://tibiadata.com/doc-api-v2/guilds/
 */
class GuildResource extends AbstractResource
{
    /**
     * @param  string  $name
     * @return GuildResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Igorsgm\TibiaDataApi\Exceptions\NotFoundException
     */
    public function get(string $name): GuildResponse
    {
        $response = $this->sendRequest('GET', "guild/{$name}.json");

        return new GuildResponse($response);
    }
}
