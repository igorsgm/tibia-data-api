<?php


namespace Igorsgm\TibiaDataApi\Models\Guild;

use DateTime;
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
     * @var DateTime
     */
    private $invited;

    /**
     * Invitee constructor.
     * @param  string  $name
     * @param  DateTime  $invited
     * @throws ImmutableException
     */
    public function __construct(string $name, DateTime $invited)
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
     * @return DateTime
     */
    public function getInvited(): DateTime
    {
        return $this->invited;
    }

}
