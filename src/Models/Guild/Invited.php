<?php


namespace Igorsgm\TibiaDataApi\Models\Guild;

use Igorsgm\TibiaDataApi\Exceptions\ImmutableException;
use Igorsgm\TibiaDataApi\Traits\ImmutableTrait;
use Igorsgm\TibiaDataApi\Traits\SerializableTrait;
use Illuminate\Support\Collection;

class Invited
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
    public function __construct(Collection $invitee)
    {
        $this->handleImmutableConstructor();

        $this->invitee = $invitee;
    }

    /**
     * @return Invitee[]
     */
    public function getInvitee(): Collection
    {
        return $this->invitee;
    }
}
