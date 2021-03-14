<?php

namespace Igorsgm\TibiaDataApi\Models\Character;

use DateTime;
use Igorsgm\TibiaDataApi\Exceptions\ImmutableException;
use Igorsgm\TibiaDataApi\Traits\ImmutableTrait;
use Igorsgm\TibiaDataApi\Traits\SerializableTrait;
use JsonSerializable;

class AccountInformation implements JsonSerializable
{
    use ImmutableTrait, SerializableTrait;

    /**
     * @var string
     */
    private $loyaltyTitle;

    /**
     * @var DateTime
     */
    private $created;

    /**
     * AccountInformation constructor.
     *
     * @param  string  $loyaltyTitle
     * @param  DateTime  $created
     * @throws ImmutableException
     */
    public function __construct(string $loyaltyTitle, DateTime $created)
    {
        $this->handleImmutableConstructor();

        $this->loyaltyTitle = $loyaltyTitle;
        $this->created = $created;
    }

    /**
     * @return string
     */
    public function getLoyaltyTitle(): string
    {
        return $this->loyaltyTitle;
    }

    /**
     * @return DateTime
     */
    public function getCreated(): DateTime
    {
        return $this->created;
    }

}
