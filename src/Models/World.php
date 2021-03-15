<?php

namespace Igorsgm\TibiaDataApi\Models;

use Carbon\Carbon;
use Exception;
use Igorsgm\TibiaDataApi\Exceptions\ImmutableException;
use Igorsgm\TibiaDataApi\Models\World\Character;
use Igorsgm\TibiaDataApi\Models\World\OnlineRecord;
use Igorsgm\TibiaDataApi\Traits\ImmutableTrait;
use Igorsgm\TibiaDataApi\Traits\SerializableTrait;
use Illuminate\Support\Collection;

class World
{
    use ImmutableTrait, SerializableTrait;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $online;

    /**
     * @var
     */
    private $onlineRecord;

    /**
     * @var
     */
    private $creationDate;

    /**
     * @var
     */
    private $location;

    /**
     * @var
     */
    private $pvpType;

    /**
     * @var
     */
    private $worldQuestTitles;

    /**
     * @var
     */
    private $battleyeStatus;

    /**
     * @var
     */
    private $playersOnline;

    /**
     * World constructor.
     * @param  string  $name
     * @param  int  $online
     * @throws ImmutableException
     */
    public function __construct(string $name, int $online)
    {
        $this->handleImmutableConstructor();

        $this->name = $name;
        $this->online = $online;
    }

    /**
     * @param  array  $array
     * @return World
     * @throws ImmutableException
     */
    public static function createFromArray(array $array)
    {
        $world = new self($array['name'], $array['online']);

        $world->creationDate = $array['creation_date'];
        $world->location = $array['location'];
        $world->pvpType = $array['pvp_type'];
        $world->battleyeStatus = $array['battleye_status'];
        $world->onlineRecord = $array['online_record'];
        $world->playersOnline = $array['players_online'];
        $world->worldQuestTitles = $array['world_quest_titles'];

        return $world;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getOnline(): int
    {
        return $this->online;
    }

    /**
     * @return OnlineRecord
     */
    public function getOnlineRecord(): OnlineRecord
    {
        return $this->onlineRecord;
    }

    /**
     * @return string
     */
    public function getCreationDate(): string
    {
        return $this->creationDate;
    }

    /**
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @return string
     */
    public function getPvpType(): string
    {
        return $this->pvpType;
    }

    /**
     * @return array
     */
    public function getWorldQuestTitles(): Collection
    {
        return $this->worldQuestTitles;
    }

    /**
     * @return string
     */
    public function getBattleyeStatus(): string
    {
        return $this->battleyeStatus;
    }

    /**
     * @return Character[]
     */
    public function getPlayersOnline(): Collection
    {
        return $this->playersOnline;
    }

    /**
     * Gets Carbon from battleye status string.
     *
     * @return Carbon|null
     * @throws Exception
     */
    public function getBattlEyedAt(): ?Carbon
    {
        if ($this->battleyeStatus === 'Not protected by BattlEye.') {
            return null;
        }

        if ($this->battleyeStatus === 'Protected by BattlEye since its release.') {
            return new Carbon($this->creationDate.'-01');
        }

        preg_match('/Protected by BattlEye since ([a-zA-Z0-9, ]+)\./', $this->battleyeStatus, $matches);
        return Carbon::createFromFormat('F d, Y', $matches[1]);
    }
}
