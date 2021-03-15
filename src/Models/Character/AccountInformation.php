<?php

namespace Igorsgm\TibiaDataApi\Models\Character;

use Carbon\Carbon;
use Igorsgm\TibiaDataApi\Exceptions\ImmutableException;
use Igorsgm\TibiaDataApi\Traits\ImmutableTrait;
use Igorsgm\TibiaDataApi\Traits\SerializableTrait;

class AccountInformation
{
    use ImmutableTrait, SerializableTrait;

    /**
     * @var string
     */
    private $loyaltyTitle;

    /**
     * @var Carbon
     */
    private $created;

    /**
     * AccountInformation constructor.
     *
     * @param  string  $loyaltyTitle
     * @param  Carbon  $created
     * @throws ImmutableException
     */
    public function __construct(string $loyaltyTitle, Carbon $created)
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
     * @return Carbon
     */
    public function getCreated(): Carbon
    {
        return $this->created;
    }
}
