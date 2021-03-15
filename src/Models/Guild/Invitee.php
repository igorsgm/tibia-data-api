<?php


namespace Igorsgm\TibiaDataApi\Models\Guild;

use Carbon\Carbon;
use Igorsgm\TibiaDataApi\Exceptions\ImmutableException;
use Igorsgm\TibiaDataApi\Traits\ImmutableTrait;
use Igorsgm\TibiaDataApi\Traits\SerializableTrait;
use JsonSerializable;

class Invitee implements JsonSerializable
{
    use ImmutableTrait, SerializableTrait;

    /**
     * @var string
     */
    private $name;

    /**
     * @var Carbon
     */
    private $invited;

    /**
     * Invitee constructor.
     * @param  string  $name
     * @param  Carbon  $invited
     * @throws ImmutableException
     */
    public function __construct(string $name, Carbon $invited)
    {
        $this->handleImmutableConstructor();

        $this->name = $name;
        $this->invited = $invited;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Carbon
     */
    public function getInvited(): Carbon
    {
        return $this->invited;
    }
}
