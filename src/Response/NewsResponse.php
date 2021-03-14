<?php

namespace Igorsgm\TibiaDataApi\Response;

use Igorsgm\TibiaDataApi\Exceptions\NotFoundException;
use Igorsgm\TibiaDataApi\Models\News;

/**
 * Class NewsResponse
 * @package Igorsgm\TibiaDataApi\Response
 */
class NewsResponse extends AbstractResponse
{

    /**
     * @var News
     */
    private $news;

    /**
     * NewsResponse constructor.
     * @param  \stdClass  $response
     * @throws NotFoundException
     * @throws \Igorsgm\TibiaDataApi\Exceptions\ImmutableException
     * @throws \Exception
     */
    public function __construct(\stdClass $response)
    {
        if (isset($response->news->error)) {
            throw new NotFoundException('News does not exists.');
        }

        $this->news = new News(
            $response->news->id,
            $response->news->title,
            $response->news->content,
            new \DateTime($response->news->date->date, new \DateTimeZone($response->news->date->timezone))
        );

        parent::__construct($response);
    }

    /**
     * @return News
     */
    public function getNews(): News
    {
        return $this->news;
    }
}
