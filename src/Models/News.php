<?php

namespace Igorsgm\TibiaDataApi\Models;

use Carbon\Carbon;
use Igorsgm\TibiaDataApi\Exceptions\ImmutableException;
use Igorsgm\TibiaDataApi\Traits\ImmutableTrait;
use Igorsgm\TibiaDataApi\Traits\SerializableTrait;

class News
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
     * @var Carbon
     */
    private $date;

    /**
     * News constructor.
     * @param  int  $id
     * @param  string  $title
     * @param  string  $content
     * @param  Carbon  $date
     * @throws ImmutableException
     */
    public function __construct(int $id, string $title, string $content, Carbon $date)
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
     * @return Carbon
     */
    public function getDate(): Carbon
    {
        return $this->date;
    }
}
