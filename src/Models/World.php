<?php

namespace Igorsgm\TibiaDataApi\Models;

use Carbon\Carbon;
use Igorsgm\TibiaDataApi\Models\World\Character;
use Igorsgm\TibiaDataApi\Models\World\OnlineRecord;
use Igorsgm\TibiaDataApi\Traits\ImmutableTrait;
use Igorsgm\TibiaDataApi\Traits\SerializableTrait;

class World implements \JsonSerializable
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
    private $online_record;

    /**
     * @var
     */
    private $creation_date;

    /**
     * @var
     */
    private $location;

    /**
     * @var
     */
    private $pvp_type;

    /**
     * @var
     */
    private $world_quest_titles;

    /**
     * @var
     */
    private $battleye_status;

    /**
     * @var
     */
    private $players_online;

    /**
     * World constructor.
     * @param  string  $name
     * @param  int  $online
     * @throws \Igorsgm\TibiaDataApi\Exceptions\ImmutableException
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
     * @throws \Igorsgm\TibiaDataApi\Exceptions\ImmutableException
     */
    public static function createFromArray(array $array)
    {
        $world = new self($array['name'], $array['online']);

        $world->creation_date = $array['creation_date'];
        $world->location = $array['location'];
        $world->pvp_type = $array['pvp_type'];
        $world->battleye_status = $array['battleye_status'];
        $world->online_record = $array['online_record'];
        $world->players_online = $array['players_online'];
        $world->world_quest_titles = $array['world_quest_titles'];

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
        return $this->online_record;
    }

    /**
     * @return string
     */
    public function getCreationDate(): string
    {
        return $this->creation_date;
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
        return $this->pvp_type;
    }

    /**
     * @return array
     */
    public function getWorldQuestTitles(): array
    {
        return $this->world_quest_titles;
    }

    /**
     * @return string
     */
    public function getBattleyeStatus(): string
    {
        return $this->battleye_status;
    }

    /**
     * @return Character[]
     */
    public function getPlayersOnline(): array
    {
        return $this->players_online;
    }

    /**
     * Gets Carbon from battleye status string.
     *
     * @return Carbon|null
     * @throws \Exception
     */
    public function getBattlEyedAt(): ?Carbon
    {
        if ($this->battleye_status === 'Not protected by BattlEye.') {
            return null;
        }

        if ($this->battleye_status === 'Protected by BattlEye since its release.') {
            return new Carbon($this->creation_date.'-01');
        }

        preg_match('/Protected by BattlEye since ([a-zA-Z0-9, ]+)\./', $this->battleye_status, $matches);
        return Carbon::createFromFormat('F d, Y', $matches[1]);
    }
}
