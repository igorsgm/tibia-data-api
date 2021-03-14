<?php

namespace Igorsgm\TibiaDataApi\Models;

use DateTime;
use Igorsgm\TibiaDataApi\Models\Guild\Guildhall;
use Igorsgm\TibiaDataApi\Models\Guild\Invited;
use Igorsgm\TibiaDataApi\Models\Guild\Members;
use Igorsgm\TibiaDataApi\Traits\ImmutableTrait;
use Igorsgm\TibiaDataApi\Traits\SerializableTrait;
use JsonSerializable;

class Guild implements JsonSerializable
{
    use ImmutableTrait, SerializableTrait;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var
     */
    private $guildhall;

    /**
     * @var
     */
    private $application;

    /**
     * @var
     */
    private $war;

    /**
     * @var
     */
    private $online_status;

    /**
     * @var
     */
    private $offline_status;

    /**
     * @var
     */
    private $disbanded;

    /**
     * @var
     */
    private $totalmembers;

    /**
     * @var
     */
    private $totalinvited;

    /**
     * @var string
     */
    private $world;

    /**
     * @var
     */
    private $founded;

    /**
     * @var
     */
    private $active;

    /**
     * @var
     */
    private $homepage;

    /**
     * @var
     */
    private $guildlogo;

    /**
     * @var
     */
    private $members;

    /**
     * @var
     */
    private $invited;

    /**
     * Guild constructor.
     * @param  string  $name
     * @param  string  $description
     * @param  string  $world
     * @throws \Igorsgm\TibiaDataApi\Exceptions\ImmutableException
     */
    public function __construct(string $name, string $description, string $world)
    {
        $this->handleImmutableConstructor();

        $this->name = $name;
        $this->description = $description;
        $this->world = $world;
    }

    /**
     * @param  array  $array
     * @return Guild
     * @throws \Igorsgm\TibiaDataApi\Exceptions\ImmutableException
     */
    public static function createFromArray(array $array): Guild
    {
        $guild = new Guild($array['name'], $array['description'], $array['world']);

        $guild->guildhall = $array['guildhall'];
        $guild->application = $array['application'];
        $guild->war = $array['war'];
        $guild->online_status = $array['online_status'];
        $guild->offline_status = $array['offline_status'];
        $guild->disbanded = $array['disbanded'];
        $guild->totalmembers = $array['totalmembers'];
        $guild->totalinvited = $array['totalinvited'];
        $guild->founded = $array['founded'];
        $guild->active = $array['active'];
        $guild->homepage = $array['homepage'];
        $guild->guildlogo = $array['guildlogo'];
        $guild->members = $array['members'];
        $guild->invited = $array['invited'];

        return $guild;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return Guildhall|null
     */
    public function getGuildhall(): ?Guildhall
    {
        return $this->guildhall;
    }

    /**
     * @return bool
     */
    public function isApplication(): bool
    {
        return $this->application;
    }

    /**
     * @return bool
     */
    public function isWar(): bool
    {
        return $this->war;
    }

    /**
     * @return int
     */
    public function getOnlineStatus(): int
    {
        return $this->online_status;
    }

    /**
     * @return int
     */
    public function getOfflineStatus(): int
    {
        return $this->offline_status;
    }

    /**
     * @return bool
     */
    public function isDisbanded(): bool
    {
        return $this->disbanded;
    }

    /**
     * @return int
     */
    public function getTotalmembers(): int
    {
        return $this->totalmembers;
    }

    /**
     * @return int
     */
    public function getTotalinvited(): int
    {
        return $this->totalinvited;
    }

    /**
     * @return string
     */
    public function getWorld(): string
    {
        return $this->world;
    }

    /**
     * @return DateTime
     */
    public function getFounded(): DateTime
    {
        return $this->founded;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @return string
     */
    public function getHomepage(): string
    {
        return $this->homepage;
    }

    /**
     * @return string
     */
    public function getGuildlogo(): string
    {
        return $this->guildlogo;
    }

    /**
     * @return Members[]
     */
    public function getMembers()
    {
        return $this->members;
    }

    /**
     * @return Invited
     */
    public function getInvited(): Invited
    {
        return $this->invited;
    }
}
