<?php

namespace Igorsgm\TibiaDataApi\Response;

use Igorsgm\TibiaDataApi\Models\Worlds;
use Igorsgm\TibiaDataApi\Models\Worlds\World;

/**
 * Class WorldsResponse
 * @package Igorsgm\TibiaDataApi\Response
 */
class WorldsResponse extends AbstractResponse
{

    /**
     * @var Worlds
     */
    private $worlds;

    /**
     * WorldsResponse constructor.
     * @param  \stdClass  $response
     * @throws \Igorsgm\TibiaDataApi\Exceptions\ImmutableException
     */
    public function __construct(\stdClass $response)
    {
        $worlds = collect();
        foreach ($response->worlds->allworlds as $world) {
            $worlds->push(new World(
                $world->name,
                $world->online,
                $world->location,
                $world->worldtype,
                $world->additional
            ));
        }

        $this->worlds = new Worlds($response->worlds->online, $worlds);

        parent::__construct($response);
    }

    /**
     * @return Worlds
     */
    public function getWorlds(): Worlds
    {
        return $this->worlds;
    }
}
