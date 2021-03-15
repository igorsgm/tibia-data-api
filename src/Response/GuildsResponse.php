<?php

namespace Igorsgm\TibiaDataApi\Response;

use Igorsgm\TibiaDataApi\Exceptions\NotFoundException;
use Igorsgm\TibiaDataApi\Models\Guilds;
use Igorsgm\TibiaDataApi\Models\Guilds\Guild;

/**
 * @see https://tibiadata.com/doc-api-v2/guilds/
 */
class GuildsResponse extends AbstractResponse
{

    /**
     * @var Guilds
     */
    private $guilds;

    /**
     * GuildsResponse constructor.
     * @param  \stdClass  $response
     * @throws NotFoundException
     * @throws \Igorsgm\TibiaDataApi\Exceptions\ImmutableException
     */
    public function __construct(\stdClass $response)
    {
        if (empty($response->guilds->active) && empty($response->guilds->formation)) {
            throw new NotFoundException('Guilds do not exists. Are you sure server name is valid?');
        }

        $active = collect();
        foreach ($response->guilds->active as $activeGuild) {
            $active->push(new Guild($activeGuild->name, $activeGuild->desc, $activeGuild->guildlogo, true));
        }

        $formation = collect();
        foreach ($response->guilds->formation as $inactiveGuild) {
            $formation->push(new Guild($inactiveGuild->name, $inactiveGuild->desc, $inactiveGuild->guildlogo, false));
        }

        $this->guilds = new Guilds($response->guilds->world, $active, $formation);

        parent::__construct($response);
    }

    /**
     * @return Guilds
     */
    public function getGuilds(): Guilds
    {
        return $this->guilds;
    }
}
