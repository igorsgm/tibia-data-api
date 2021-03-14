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

        $highscores = [];
        foreach ($response->highscores->data as $highscore) {
            $highscores[] = new Character(
                $highscore->name,
                $highscore->rank,
                $highscore->voc,
                $highscore->points ?? null,
                $highscore->level ?? null
            );
        }

        $this->highscores = new Highscores(
            $response->highscores->world,
            $response->highscores->type,
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
