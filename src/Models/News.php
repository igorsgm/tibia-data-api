<?php

namespace Igorsgm\TibiaDataApi\Models;

use DateTime;
use Igorsgm\TibiaDataApi\Traits\ImmutableTrait;
use Igorsgm\TibiaDataApi\Traits\SerializableTrait;
use JsonSerializable;

class News implements JsonSerializable
{
    use ImmutableTrait, SerializableTrait;

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $content;

    /**
     * @var DateTime
     */
    private $date;

    /**
     * News constructor.
     * @param  int  $id
     * @param  string  $title
     * @param  string  $content
     * @param  DateTime  $date
     * @throws \Igorsgm\TibiaDataApi\Exceptions\ImmutableException
     */
    public function __construct(int $id, string $title, string $content, DateTime $date)
    {
        $this->handleImmutableConstructor();

        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->date = $date;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return DateTime
     */
    public function getDate(): DateTime
    {
        return $this->date;
    }
}
