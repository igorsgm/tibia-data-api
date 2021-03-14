<?php

namespace Igorsgm\TibiaDataApi\Resources;

use Igorsgm\TibiaDataApi\Response\HighscoresResponse;

/**
 * @see https://tibiadata.com/doc-api-v2/highscores/
 */
class HighscoresResource extends AbstractResource
{

    const TYPE_EXPERIENCE = 'experience';
    const TYPE_MAGIC_LEVEL = 'magic';
    const TYPE_SHIELDING = 'shielding';
    const TYPE_DISTANCE = 'distance';
    const TYPE_SWORD = 'sword';
    const TYPE_CLUB = 'club';
    const TYPE_AXE = 'axe';
    const TYPE_FIST = 'fist';
    const TYPE_FISHING = 'fishing';
    const TYPE_ACHIEVEMENTS = 'achievements';
    const TYPE_LOYALTY = 'loyalty';

    const VOC_ALL = 'all';
    const VOC_NONE = 'no';
    const VOC_DRUID = 'druid';
    const VOC_KNIGHT = 'knight';
    const VOC_PALADIN = 'paladin';
    const VOC_SORCERER = 'sorcerer';

    /**
     * @param $server
     * @param  string  $type
     * @param  string  $vocation
     * @return HighscoresResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Igorsgm\TibiaDataApi\Exceptions\NotFoundException
     */
    public function get($server, string $type = self::TYPE_EXPERIENCE, string $vocation = self::VOC_ALL)
    {
        if (!self::isAvailableType($type) || !self::isAvailableVocation($vocation)) {
            throw new \InvalidArgumentException('Invalid type or vocation.');
        }

        $response = $this->sendRequest('GET', "highscores/{$server}/{$type}/{$vocation}.json");

        return new HighscoresResponse($response);
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
     * @param  string  $vocation
     * @return bool
     */
    public static function isAvailableVocation(string $vocation): bool
    {
        return in_array($vocation, self::getAvailableVocations());
    }

    /**
     * @return string[]
     */
    public static function getAvailableTypes(): array
    {
        return [
            self::TYPE_EXPERIENCE, self::TYPE_MAGIC_LEVEL, self::TYPE_SHIELDING, self::TYPE_DISTANCE,
            self::TYPE_SWORD, self::TYPE_CLUB, self::TYPE_AXE, self::TYPE_FIST, self::TYPE_FISHING,
            self::TYPE_ACHIEVEMENTS, self::TYPE_LOYALTY,
        ];
    }

    /**
     * @return string[]
     */
    public static function getAvailableVocations(): array
    {
        return [
            self::VOC_ALL, self::VOC_NONE, self::VOC_DRUID, self::VOC_KNIGHT, self::VOC_PALADIN, self::VOC_SORCERER,
        ];
    }
}
