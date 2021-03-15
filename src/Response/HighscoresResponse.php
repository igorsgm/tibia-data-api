<?php

namespace Igorsgm\TibiaDataApi\Response;

use Igorsgm\TibiaDataApi\Exceptions\NotFoundException;
use Igorsgm\TibiaDataApi\Models\Highscores;
use Igorsgm\TibiaDataApi\Models\Highscores\Character;

/**
 * Class HighscoresResponse
 * @package Igorsgm\TibiaDataApi\Response
 */
class HighscoresResponse extends AbstractResponse
{
    /**
     * @var Highscores
     */
    private $highscores;

    /**
     * HighscoresResponse constructor.
     * @param  \stdClass  $response
     * @throws NotFoundException
     * @throws \Igorsgm\TibiaDataApi\Exceptions\ImmutableException
     */
    public function __construct(\stdClass $response)
    {
        if (isset($response->highscores->data->error)) {
            throw new NotFoundException('World does not exists.');
        }

        $highscores = collect();
        foreach ($response->highscores->data as $highscore) {
            $highscores->push(new Character(
                $highscore->name,
                $highscore->rank,
                $highscore->vocation,
                $highscore->points ?? null,
                $highscore->level ?? null
            ));
        }

        $this->highscores = new Highscores(
            $response->highscores->filters->world,
            $response->highscores->filters->category,
            $highscores
        );

        parent::__construct($response);
    }

    /**
     * @return Highscores
     */
    public function getHighscores(): Highscores
    {
        return $this->highscores;
    }
}
