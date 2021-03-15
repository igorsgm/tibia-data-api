<?php

namespace Igorsgm\TibiaDataApi\Models;

use Carbon\Carbon;
use Igorsgm\TibiaDataApi\Models\Character\AccountInformation;
use Igorsgm\TibiaDataApi\Models\Character\Achievement;
use Igorsgm\TibiaDataApi\Models\Character\Death;
use Igorsgm\TibiaDataApi\Models\Character\Guild;
use Igorsgm\TibiaDataApi\Models\Character\OtherCharacter;
use Igorsgm\TibiaDataApi\Traits\ImmutableTrait;
use Igorsgm\TibiaDataApi\Traits\SerializableTrait;
use Illuminate\Support\Collection;

class Character
{
    use ImmutableTrait, SerializableTrait;

    /**
     * @var string
     */
    private $name;

    /**
     * @var Collection
     */
    private $formerNames;

    /**
     * @var string
     */
    private $sex;

    /**
     * @var string
     */
    private $vocation;

    /**
     * @var int
     */
    private $level;

    /**
     * @var string
     */
    private $achievementPoints;

    /**
     * @var string
     */
    private $world;

    /**
     * @var string
     */
    private $formerWorld;

    /**
     * @var string
     */
    private $residence;

    /**
     * @var Guild
     */
    private $guild;

    /**
     * @var Carbon
     */
    private $lastLogin;

    /**
     * @var string
     */
    private $comment = '';

    /**
     * @var string
     */
    private $accountStatus;

    /**
     * @var string
     */
    private $status;

    /**
     * @var Collection
     */
    private $achievements;

    /**
     * @var Collection
     */
    private $deaths;

    /**
     * @var AccountInformation
     */
    private $accountInformation;

    /**
     * @var Collection
     */
    private $otherCharacters;

    /**
     * Character constructor.
     * @param  string  $name
     * @param  string  $vocation
     * @param  int  $level
     * @throws \Igorsgm\TibiaDataApi\Exceptions\ImmutableException
     */
    public function __construct(string $name, string $vocation, int $level)
    {
        $this->handleImmutableConstructor();

        $this->name = $name;
        $this->vocation = $vocation;
        $this->level = $level;
    }

    /**
     * @param  array  $response
     * @return Character
     * @throws \Igorsgm\TibiaDataApi\Exceptions\ImmutableException
     */
    public static function createFromArray(array $response): Character
    {
        $character = new Character($response['name'], $response['vocation'], $response['level']);

        $character->formerNames = $response['former_names'];
        $character->sex = $response['sex'];
        $character->achievementPoints = $response['achievement_points'];
        $character->world = $response['world'];
        $character->formerWorld = $response['former_world'];
        $character->residence = $response['residence'];
        $character->guild = $response['guild'];
        $character->lastLogin = $response['last_login'];
        $character->comment = $response['comment'];
        $character->accountStatus = $response['account_status'];
        $character->status = $response['status'];
        $character->achievements = $response['achievements'];
        $character->accountInformation = $response['account_information'];
        $character->deaths = $response['deaths'];
        $character->otherCharacters = $response['other_characters'];

        return $character;
    }

    /**
     * Returns true when characters has a premium account.
     * @return bool
     */
    public function isPremium()
    {
        return $this->accountStatus === 'Premium Account';
    }

    /**
     * @return bool Returns true when character is online.
     */
    public function isOnline()
    {
        return $this->status === 'online';
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getFormerNames(): Collection
    {
        return $this->formerNames;
    }

    /**
     * @return string
     */
    public function getSex(): string
    {
        return $this->sex;
    }

    /**
     * @return string
     */
    public function getVocation(): string
    {
        return $this->vocation;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @return int
     */
    public function getAchievementPoints(): int
    {
        return $this->achievementPoints;
    }

    /**
     * @return string
     */
    public function getWorld(): string
    {
        return $this->world;
    }

    /**
     * @return string|null
     */
    public function getFormerWorld(): ?string
    {
        return $this->formerWorld;
    }

    /**
     * @return string
     */
    public function getResidence(): string
    {
        return $this->residence;
    }

    /**
     * @return Guild|null
     */
    public function getGuild(): ?Guild
    {
        return $this->guild;
    }

    /**
     * @return Carbon|null
     */
    public function getLastLogin(): ?Carbon
    {
        return $this->lastLogin;
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @return string
     */
    public function getAccountStatus(): string
    {
        return $this->accountStatus;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return Achievement[]
     */
    public function getAchievements(): Collection
    {
        return $this->achievements;
    }

    /**
     * @return Death[]
     */
    public function getDeaths(): Collection
    {
        return $this->deaths;
    }

    /**
     * @return AccountInformation
     */
    public function getAccountInformation(): AccountInformation
    {
        return $this->accountInformation;
    }

    /**
     * @return OtherCharacter[]
     */
    public function getOtherCharacters(): Collection
    {
        return $this->otherCharacters;
    }
}
