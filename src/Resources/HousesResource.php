<?php

namespace Igorsgm\TibiaDataApi\Resources;

use Igorsgm\TibiaDataApi\Response\HousesResponse;

/**
 * @see https://tibiadata.com/doc-api-v2/houses/
 */
class HousesResource extends AbstractResource
{
    const TYPE_HOUSES = 'houses';

    const TYPE_GUILDHALLS = 'guildhalls';

    /**
     * @param $world
     * @param  string  $town
     * @param  string  $type
     * @return HousesResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Igorsgm\TibiaDataApi\Exceptions\NotFoundException
     * @throws \Igorsgm\TibiaDataApi\Exceptions\ImmutableException
     */
    public function get($world, $town = 'Ab\'Dendriel', $type = self::TYPE_HOUSES)
    {
        if (!self::isAvailableType($type)) {
            throw new \InvalidArgumentException('Invalid type.');
        }

        $response = $this->sendRequest('GET', "houses/{$world}/{$town}/{$type}.json");

        return new HousesResponse($response);
    }

    /**
     * @param  string  $type
     * @return bool
     */
    public static function isAvailableType(string $type): bool
    {
        return in_array($type, self::getAvailableTypes());
    }

    /**
     * @return string[]
     */
    public static function getAvailableTypes(): array
    {
        return [self::TYPE_HOUSES, self::TYPE_GUILDHALLS];
    }
}
