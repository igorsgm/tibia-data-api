<?php

namespace Igorsgm\TibiaDataApi\Response;

use Carbon\Carbon;
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

        $achievements = collect();
        foreach ($response->characters->achievements as $achievement) {
            $achievements->push(new Achievement($achievement->name, $achievement->stars));
        }

        $accountInformation = null;
        if (!empty($response->characters->account_information)) {
            $accountInformation = new AccountInformation(
                $response->characters->account_information->loyalty_title,
                new Carbon(
                    $response->characters->account_information->created->date,
                    $response->characters->account_information->created->timezone
                )
            );
        }

        $deaths = collect();
        if (!empty($response->characters->deaths)) {
            foreach ($response->characters->deaths as $death) {
                $involved = collect();
                foreach ($death->involved as $deathInvolved) {
                    $involved->push($deathInvolved->name);
                }

                $deaths->push(new Death(
                    new Carbon($death->date->date, $death->date->timezone),
                    $death->level,
                    $death->reason,
                    $involved
                ));
            }
        }

        $otherCharacters = collect();
        if (!empty($response->characters->account_information)) {
            foreach ($response->characters->other_characters as $other_character) {
                $otherCharacters->push(new OtherCharacter(
                    $other_character->name,
                    $other_character->world,
                    $other_character->status
                ));
            }
        }

        $guild = null;
        if (isset($response->characters->data->guild)) {
            $guild = new Guild($response->characters->data->guild->name, $response->characters->data->guild->rank);
        }

        $lastLogin = null;
        if (isset($response->characters->data->last_login)) {
            $lastLogin = new Carbon(
                $response->characters->data->last_login[0]->date,
                $response->characters->data->last_login[0]->timezone
            );
        }

        $this->character = Character::createFromArray([
            'name' => $response->characters->data->name,
            'former_names' => !empty($response->characters->data->former_names)
                ? collect($response->characters->data->former_names)
                : collect(),
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
            'achievements' => $achievements,
            'account_information' => $accountInformation,
            'deaths' => $deaths,
            'other_characters' => $otherCharacters,
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
