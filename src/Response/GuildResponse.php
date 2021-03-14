<?php

namespace Igorsgm\TibiaDataApi\Response;

use Igorsgm\TibiaDataApi\Exceptions\NotFoundException;
use Igorsgm\TibiaDataApi\Models\Guild;
use Igorsgm\TibiaDataApi\Models\Guild\Character;
use Igorsgm\TibiaDataApi\Models\Guild\Guildhall;
use Igorsgm\TibiaDataApi\Models\Guild\Invited;
use Igorsgm\TibiaDataApi\Models\Guild\Invitee;
use Igorsgm\TibiaDataApi\Models\Guild\Members;

/**
 * @see https://tibiadata.com/doc-api-v2/guilds/
 */
class GuildResponse extends AbstractResponse
{

    /**
     * @var Guild
     */
    private $guild;

    /**
     * GuildResponse constructor.
     * @param  \stdClass  $response
     * @throws NotFoundException
     * @throws \Igorsgm\TibiaDataApi\Exceptions\ImmutableException
     */
    public function __construct(\stdClass $response)
    {
        if (isset($response->guild->error)) {
            throw new NotFoundException('Guild does not exists.');
        }

        $invitees = [];
        foreach ($response->guild->invited as $invitee) {
            $invitees = new Invitee($invitee->name, new \DateTime($invitee->invited));
        }
        $invited = new Invited($invitees);

        $members = [];
        foreach ($response->guild->members as $members_data) {
            $characters = [];
            foreach ($members_data->characters as $character) {
                $characters[] = new Character(
                    $character->name,
                    $character->nick,
                    $character->level,
                    $character->vocation,
                    new \DateTime($character->joined),
                    $character->status
                );
            }

            $members[] = new Members($members_data->rank_title, $members);
        }

        $this->guild = Guild::createFromArray([
            'name' => $response->guild->data->name,
            'description' => $response->guild->data->description,
            'guildhall' => $response->guild->data->guildhall ? new Guildhall(
                $response->guild->data->guildhall->name,
                $response->guild->data->guildhall->town,
                new \DateTime($response->guild->data->guildhall->paid),
                $response->guild->data->guildhall->world,
                $response->guild->data->guildhall->houseid
            ) : null,
            'application' => $response->guild->data->application,
            'war' => $response->guild->data->war,
            'online_status' => $response->guild->data->online_status,
            'offline_status' => $response->guild->data->offline_status,
            'disbanded' => $response->guild->data->disbanded,
            'totalmembers' => $response->guild->data->totalmembers,
            'totalinvited' => $response->guild->data->totalinvited,
            'world' => $response->guild->data->world,
            'founded' => new \DateTime($response->guild->data->founded),
            'active' => $response->guild->data->active ?? null,
            'homepage' => $response->guild->data->homepage ?? '',
            'guildlogo' => $response->guild->data->guildlogo,
            'members' => $members,
            'invited' => $invited,
        ]);

        parent::__construct($response);
    }

    /**
     * @return Guild
     */
    public function getGuild(): Guild
    {
        return $this->guild;
    }
}
