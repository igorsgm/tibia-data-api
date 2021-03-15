<?php

namespace Igorsgm\TibiaDataApi\Models;

use Carbon\Carbon;
use Igorsgm\TibiaDataApi\Exceptions\ImmutableException;
use Igorsgm\TibiaDataApi\Models\Guild\Guildhall;
use Igorsgm\TibiaDataApi\Models\Guild\Invited;
use Igorsgm\TibiaDataApi\Models\Guild\Members;
use Igorsgm\TibiaDataApi\Traits\ImmutableTrait;
use Igorsgm\TibiaDataApi\Traits\SerializableTrait;

class Guild
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
     * @var Guildhall
     */
    private $guildhall;

    /**
     * @var boolean
     */
    private $application;

    /**
     * @var boolean
     */
    private $war;

    /**
     * @var integer
     */
    private $onlineStatus;

    /**
     * @var integer
     */
    private $offlineStatus;

    /**
     * @var boolean
     */
    private $disbanded;

    /**
     * @var integer
     */
    private $totalMembers;

    /**
     * @var integer
     */
    private $totalInvited;

    /**
     * @var string
     */
    private $world;

    /**
     * @var Carbon
     */
    private $founded;

    /**
     * @var boolean
     */
    private $active;

    /**
     * @var string
     */
    private $homepage;

    /**
     * @var string
     */
    private $guildLogo;

    /**
     * @var Members[]
     */
    private $members;

    /**
     * @var Invited
     */
    private $invited;

    /**
     * Guild constructor.
     * @param  string  $name
     * @param  string  $description
     * @param  string  $world
     * @throws ImmutableException
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
     * @throws ImmutableException
     */
    public static function createFromArray(array $array): Guild
    {
        $guild = new Guild($array['name'], $array['description'], $array['world']);

        $guild->guildhall = $array['guildhall'];
        $guild->application = $array['application'];
        $guild->war = $array['war'];
        $guild->onlineStatus = $array['online_status'];
        $guild->offlineStatus = $array['offline_status'];
        $guild->disbanded = $array['disbanded'];
        $guild->totalMembers = $array['totalmembers'];
        $guild->totalInvited = $array['totalinvited'];
        $guild->founded = $array['founded'];
        $guild->active = $array['active'];
        $guild->homepage = $array['homepage'];
        $guild->guildLogo = $array['guildlogo'];
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
        return $this->onlineStatus;
    }

    /**
     * @return int
     */
    public function getOfflineStatus(): int
    {
        return $this->offlineStatus;
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
    public function getTotalMembers(): int
    {
        return $this->totalMembers;
    }

    /**
     * @return int
     */
    public function getTotalInvited(): int
    {
        return $this->totalInvited;
    }

    /**
     * @return string
     */
    public function getWorld(): string
    {
        return $this->world;
    }

    /**
     * @return Carbon
     */
    public function getFounded(): Carbon
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
    public function getGuildLogo(): string
    {
        return $this->guildLogo;
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
