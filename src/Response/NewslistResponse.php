<?php

namespace Igorsgm\TibiaDataApi\Response;

use Igorsgm\TibiaDataApi\Models\Newslist;
use Igorsgm\TibiaDataApi\Models\Newslist\News;

/**
 * Class NewslistResponse
 * @package Igorsgm\TibiaDataApi\Response
 */
class NewslistResponse extends AbstractResponse
{

    /**
     * @var Newslist
     */
    private $newslist;

    /**
     * NewslistResponse constructor.
     * @param  \stdClass  $response
     * @throws \Igorsgm\TibiaDataApi\Exceptions\ImmutableException
     * @throws \Exception
     */
    public function __construct(\stdClass $response)
    {
        $news = array();
        foreach ($response->newslist->data as $item) {
            $news[] = new News(
                $item->id,
                $item->type,
                $item->news,
                $item->apiurl,
                $item->tibiaurl,
                new \DateTime($item->date->date, new \DateTimeZone($item->date->timezone))
            );
        }

        $this->newslist = new Newslist($response->newslist->type, $news);

        parent::__construct($response);
    }

    /**
     * @return Newslist
     */
    public function getNewslist(): Newslist
    {
        return $this->newslist;
    }
}
