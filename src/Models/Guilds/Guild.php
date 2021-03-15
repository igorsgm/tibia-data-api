<?php

namespace Igorsgm\TibiaDataApi\Models\Guilds;

use Igorsgm\TibiaDataApi\Exceptions\ImmutableException;
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
     * @var string
     */
    private $logoUrl;

    /**
     * @var bool
     */
    private $isActive;

    /**
     * Guild constructor.
     * @param  string  $name
     * @param  string  $description
     * @param  string  $logoUrl
     * @param  bool  $isActive
     * @throws ImmutableException
     */
    public function __construct(string $name, string $description, string $logoUrl, bool $isActive)
    {
        $this->handleImmutableConstructor();

        $this->name = $name;
        $this->description = $description;
        $this->logoUrl = $logoUrl;
        $this->isActive = $isActive;
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
     * @return string
     */
    public function getLogoUrl(): string
    {
        return $this->logoUrl;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->isActive;
    }
}
