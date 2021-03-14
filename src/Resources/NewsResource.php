<?php

namespace Igorsgm\TibiaDataApi\Resources;

use Igorsgm\TibiaDataApi\Response\NewslistResponse;
use Igorsgm\TibiaDataApi\Response\NewsResponse;

/**
 * @see https://tibiadata.com/doc-api-v2/news/
 */
class NewsResource extends AbstractResource
{
    /**
     * @param $id
     * @return NewsResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Igorsgm\TibiaDataApi\Exceptions\NotFoundException
     */
    public function get($id)
    {
        $response = $this->sendRequest('GET', "news/{$id}.json");

        return new NewsResponse($response);
    }

    /**
     * @return NewslistResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getLatestNews()
    {
        $response = $this->sendRequest('GET', "latestnews.json");

        return new NewslistResponse($response);
    }

    /**
     * @return NewslistResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getNewstickers()
    {
        $response = $this->sendRequest('GET', "newstickers.json");

        return new NewslistResponse($response);
    }

}
