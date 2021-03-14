<?php

namespace Igorsgm\TibiaDataApi\Resources;

use Igorsgm\TibiaDataApi\Response\CharacterResponse;

/**
 * @see https://tibiadata.com/doc-api-v2/characters/
 */
class CharactersResource extends AbstractResource
{
    /**
     * @param  string  $name
     * @return CharacterResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Igorsgm\TibiaDataApi\Exceptions\NotFoundException
     * @throws \Igorsgm\TibiaDataApi\Exceptions\ImmutableException
     */
    public function get(string $name): CharacterResponse
    {
        $response = $this->sendRequest('GET', "characters/{$name}.json");

        return new CharacterResponse($response);
    }
}
