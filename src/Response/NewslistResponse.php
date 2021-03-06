<?php

namespace Igorsgm\TibiaDataApi\Response;

use Carbon\Carbon;
use Igorsgm\TibiaDataApi\Models\Newslist;
use Igorsgm\TibiaDataApi\Models\Newslist\News;

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
        $news = collect();
        foreach ($response->newslist->data as $item) {
            $news->push(new News(
                $item->id,
                $item->type,
                $item->news,
                $item->apiurl,
                $item->tibiaurl,
                new Carbon($item->date->date, $item->date->timezone)
            ));
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
