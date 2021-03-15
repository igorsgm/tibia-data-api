<?php

namespace Igorsgm\TibiaDataApi\Models\Newslist;

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
    private $type;

    /**
     * @var string
     */
    private $news;

    /**
     * @var string
     */
    private $apiUrl;

    /**
     * @var string
     */
    private $tibiaUrl;

    /**
     * @var Carbon
     */
    private $date;

    /**
     * News constructor.
     * @param  int  $id
     * @param  string  $type
     * @param  string  $news
     * @param  string  $apiUrl
     * @param  string  $tibiaUrl
     * @param  Carbon  $date
     * @throws ImmutableException
     */
    public function __construct(int $id, string $type, string $news, string $apiUrl, string $tibiaUrl, Carbon $date)
    {
        $this->handleImmutableConstructor();

        $this->id = $id;
        $this->type = $type;
        $this->news = $news;
        $this->apiUrl = $apiUrl;
        $this->tibiaUrl = $tibiaUrl;
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
    public function getApiUrl(): string
    {
        return $this->apiUrl;
    }

    /**
     * @return string
     */
    public function getTibiaUrl(): string
    {
        return $this->tibiaUrl;
    }

    /**
     * @return Carbon
     */
    public function getDate(): Carbon
    {
        return $this->date;
    }
}
