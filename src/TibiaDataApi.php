<?php

namespace Igorsgm\TibiaDataApi;

use GuzzleHttp\Client;
use Igorsgm\TibiaDataApi\Resources;
use Igorsgm\TibiaDataApi\Resources\CharactersResource;
use Igorsgm\TibiaDataApi\Resources\GuildResource;
use Igorsgm\TibiaDataApi\Resources\GuildsResource;
use Igorsgm\TibiaDataApi\Resources\HighscoresResource;
use Igorsgm\TibiaDataApi\Resources\HousesResource;
use Igorsgm\TibiaDataApi\Resources\NewsResource;
use Igorsgm\TibiaDataApi\Resources\WorldsResource;
use Illuminate\Container\Container;

/**
 * Class TibiaDataApi
 * @package TibiaDataApi
 */
class TibiaDataApi
{
    /**
     * @var Client
     */
    protected $httpClient;

    /**
     * TibiaDataApi constructor.
     * @param Container $container
     */
    public function __construct()
    {
        $this->httpClient = new Client([
            'base_uri' => 'https://api.tibiadata.com'
        ]);
    }

    /**
     * @return Client
     */
    public function getHttpClient()
    {
        return $this->httpClient;
    }

    /**
     * @return CharactersResource|mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function characters()
    {
        return app()->make(CharactersResource::class);
    }

    /**
     * @return GuildResource|mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function guild()
    {
        return app()->make(GuildResource::class);
    }

    /**
     * @return GuildsResource|mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function guilds()
    {
        return app()->make(GuildsResource::class);
    }

    /**
     * @return HighscoresResource|mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function highscores()
    {
        return app()->make(HighscoresResource::class);
    }

    /**
     * @return HousesResource|mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function houses()
    {
        return app()->make(HousesResource::class);
    }

    /**
     * @return NewsResource|mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function news()
    {
        return app()->make(NewsResource::class);
    }

    /**
     * @return WorldsResource|mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function worlds()
    {
        return app()->make(WorldsResource::class);
    }

}
