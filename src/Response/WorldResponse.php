<?php

namespace Igorsgm\TibiaDataApi\Response;

use Carbon\Carbon;
use Igorsgm\TibiaDataApi\Exceptions\NotFoundException;
use Igorsgm\TibiaDataApi\Models\World;
use Igorsgm\TibiaDataApi\Models\World\Character;
use Igorsgm\TibiaDataApi\Models\World\OnlineRecord;

/**
 * Class WorldResponse
 * @package Igorsgm\TibiaDataApi\Response
 */
class WorldResponse extends AbstractResponse
{
    /** @var World */
    private $world;

    /**
     * WorldResponse constructor.
     * @param  \stdClass  $response
     * @throws NotFoundException
     * @throws \Igorsgm\TibiaDataApi\Exceptions\ImmutableException
     * @throws \Exception
     */
    public function __construct(\stdClass $response)
    {
        if (!isset($response->world->world_information->pvp_type)) {
            throw new NotFoundException('World does not exists.');
        }

        $players_online = [];
        foreach ($response->world->players_online as $player) {
            $players_online[] = new Character(
                $player->name,
                $player->level,
                $player->vocation
            );
        }

        $this->world = World::createFromArray([
            'name' => $response->world->world_information->name,
            'online' => $response->world->world_information->players_online,
            'creation_date' => $response->world->world_information->creation_date,
            'location' => $response->world->world_information->location,
            'pvp_type' => $response->world->world_information->pvp_type,
            'battleye_status' => $response->world->world_information->battleye_status,
            'online_record' => new OnlineRecord(
                $response->world->world_information->online_record->players,
                new Carbon(
                    $response->world->world_information->online_record->date->date,
                    $response->world->world_information->online_record->date->timezone
                )
            ),
            'players_online' => $players_online,
            'world_quest_titles' => $response->world->world_information->world_quest_titles,
        ]);

        parent::__construct($response);
    }

    /**
     * @return World
     */
    public function getWorld(): World
    {
        return $this->world;
    }
}
