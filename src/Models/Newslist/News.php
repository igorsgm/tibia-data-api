<?php

namespace Igorsgm\TibiaDataApi\Models\Newslist;

use Carbon\Carbon;
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
    private $type;

    /**
     * @var string
     */
    private $news;

    /**
     * @var string
     */
    private $apiurl;

    /**
     * @var string
     */
    private $tibiaurl;

    /**
     * @var Carbon
     */
    private $date;

    /**
     * News constructor.
     * @param  int  $id
     * @param  string  $type
     * @param  string  $news
     * @param  string  $apiurl
     * @param  string  $tibiaurl
     * @param  Carbon  $date
     * @throws \Igorsgm\TibiaDataApi\Exceptions\ImmutableException
     */
    public function __construct(int $id, string $type, string $news, string $apiurl, string $tibiaurl, Carbon $date)
    {
        $this->handleImmutableConstructor();

        $this->id = $id;
        $this->type = $type;
        $this->news = $news;
        $this->apiurl = $apiurl;
        $this->tibiaurl = $tibiaurl;
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
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getNews(): string
    {
        return $this->news;
    }

    /**
     * @return string
     */
    public function getApiurl(): string
    {
        return $this->apiurl;
    }

    /**
     * @return string
     */
    public function getTibiaurl(): string
    {
        return $this->tibiaurl;
    }

    /**
     * @return Carbon
     */
    public function getDate(): Carbon
    {
        return $this->date;
    }
}
