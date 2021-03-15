<?php

namespace Igorsgm\TibiaDataApi\Models;

use Igorsgm\TibiaDataApi\Traits\ImmutableTrait;
use Igorsgm\TibiaDataApi\Traits\SerializableTrait;
use Illuminate\Support\Collection;

class Newslist
{
    use ImmutableTrait, SerializableTrait;

    /**
     * @var string
     */
    private $type;

    /**
     * @var Collection
     */
    private $news;

    /**
     * Newslist constructor.
     *
     * @param  string  $type
     * @param  array  $news
     * @throws \Igorsgm\TibiaDataApi\Exceptions\ImmutableException
     */
    public function __construct(string $type, Collection $news)
    {
        $this->handleImmutableConstructor();

        $this->type = $type;
        $this->news = $news;
    }

    /**
     * @return News[]
     */
    public function getNews(): Collection
    {
        return $this->news;
    }
}
