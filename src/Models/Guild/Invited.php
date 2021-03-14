<?php


namespace Igorsgm\TibiaDataApi\Models\Guild;

use Igorsgm\TibiaDataApi\Exceptions\ImmutableException;
use Igorsgm\TibiaDataApi\Traits\ImmutableTrait;
use Igorsgm\TibiaDataApi\Traits\SerializableTrait;
use JsonSerializable;

class Invited implements JsonSerializable
{
    use ImmutableTrait, SerializableTrait;

    /**
     * @var Invitee[]
     */
    private $invitee;

    /**
     * Invited constructor.
     * @param  array  $invitee
     * @throws ImmutableException
     */
    public function __construct(array $invitee)
    {
        $this->handleImmutableConstructor();

        $this->invitee = $invitee;
    }

    /**
     * @return Invitee[]
     */
    public function getInvitee(): array
    {
        return $this->invitee;
    }
}
