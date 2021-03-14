<?php

namespace Igorsgm\TibiaDataApi\Models;

use Igorsgm\TibiaDataApi\Traits\ImmutableTrait;
use Igorsgm\TibiaDataApi\Traits\SerializableTrait;

class Newslist implements \JsonSerializable
{
    use ImmutableTrait, SerializableTrait;

    /**
     * @var string
     */
    private $type;

    /**
     * @var array
     */
    private $news = [];

    /**
     * Newslist constructor.
     * @param  string  $type
     * @param  array  $news
     * @throws \Igorsgm\TibiaDataApi\Exceptions\ImmutableException
     */
    public function __construct(string $type, array $news)
    {
        $this->handleImmutableConstructor();

        $this->type = $type;
        $this->news = $news;
    }

    /**
     * @return News[]
     */
    public function getNews(): array
    {
        return $this->news;
    }
}
