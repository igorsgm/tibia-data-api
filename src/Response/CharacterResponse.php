<?php

namespace Igorsgm\TibiaDataApi\Response;

use Igorsgm\TibiaDataApi\Exceptions\NotFoundException;
use Igorsgm\TibiaDataApi\Models\Character;
use Igorsgm\TibiaDataApi\Models\Character\AccountInformation;
use Igorsgm\TibiaDataApi\Models\Character\Achievement;
use Igorsgm\TibiaDataApi\Models\Character\Death;
use Igorsgm\TibiaDataApi\Models\Character\Guild;
use Igorsgm\TibiaDataApi\Models\Character\OtherCharacter;

/**
 * @see https://tibiadata.com/doc-api-v2/characters/
 */
class CharacterResponse extends AbstractResponse
{
    /**
     * @var Character
     */
    private $character;

    /**
     * CharacterResponse constructor.
     * @param  \stdClass  $response
     * @throws NotFoundException
     * @throws \Igorsgm\TibiaDataApi\Exceptions\ImmutableException
     * @throws \Exception
     */
    public function __construct(\stdClass $response)
    {
        if (isset($response->characters->error)) {
            throw new NotFoundException('Character does not exists.');
        }

        $achivements = [];
        foreach ($response->characters->achievements as $achievement) {
            $achivements[] = new Achievement($achievement->name, $achievement->stars);
        }

        $account_information = null;
        if (!empty($response->characters->account_information)) {
            $account_information = new AccountInformation(
                $response->characters->account_information->loyalty_title,
                new \DateTime(
                    $response->characters->account_information->created->date,
                    new \DateTimeZone($response->characters->account_information->created->timezone)
                )
            );
        }

        $deaths = [];
        if (!empty($response->characters->deaths)) {
            foreach ($response->characters->deaths as $death) {
                $involved = array();
                foreach ($death->involved as $deathInvolved) {
                    $involved[] = $deathInvolved->name;
                }

                $deaths[] = new Death(
                    new \DateTime($death->date->date, new \DateTimeZone($death->date->timezone)),
                    $death->level,
                    $death->reason,
                    $involved
                );
            }
        }

        $other_characters = [];
        if (!empty($response->characters->account_information)) {
            foreach ($response->characters->other_characters as $other_character) {
                $other_characters[] = new OtherCharacter(
                    $other_character->name,
                    $other_character->world,
                    $other_character->status
                );
            }
        }

        $guild = null;
        if (isset($response->characters->data->guild)) {
            $guild = new Guild($response->characters->data->guild->name, $response->characters->data->guild->rank);
        }

        $lastLogin = null;
        if (isset($response->characters->data->last_logi)) {
            $lastLogin = new \DateTime(
                $response->characters->data->last_login[0]->date,
                new \DateTimeZone($response->characters->data->last_login[0]->timezone)
            );
        }

        $this->character = Character::createFromArray([
            'name' => $response->characters->data->name,
            'former_names' => $response->characters->data->former_names ?? array(),
            'sex' => $response->characters->data->sex,
            'vocation' => $response->characters->data->vocation,
            'level' => $response->characters->data->level,
            'achievement_points' => $response->characters->data->achievement_points,
            'world' => $response->characters->data->world,
            'former_world' => $response->characters->data->former_world ?? null,
            'residence' => $response->characters->data->residence,
            'guild' => $guild,
            'last_login' => $lastLogin,
            'comment' => $response->characters->data->comment ?? '',
            'account_status' => $response->characters->data->account_status,
            'status' => $response->characters->data->status,
            'achivements' => $achivements,
            'account_information' => $account_information,
            'deaths' => $deaths,
            'other_characters' => $other_characters,
        ]);

        parent::__construct($response);
    }

    /**
     * @return Character
     */
    public function getCharacter(): Character
    {
        return $this->character;
    }
}
