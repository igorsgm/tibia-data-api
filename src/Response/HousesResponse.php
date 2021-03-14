<?php

namespace Igorsgm\TibiaDataApi\Response;

use Igorsgm\TibiaDataApi\Exceptions\NotFoundException;
use Igorsgm\TibiaDataApi\Models\Houses;
use Igorsgm\TibiaDataApi\Models\Houses\House;

/**
 * Class HousesResponse
 * @package Igorsgm\TibiaDataApi\Response
 */
class HousesResponse extends AbstractResponse
{
    /**
     * @var Houses
     */
    private $houses;

    /**
     * HousesResponse constructor.
     * @param  \stdClass  $response
     * @throws NotFoundException
     * @throws \Igorsgm\TibiaDataApi\Exceptions\ImmutableException
     */
    public function __construct(\stdClass $response)
    {
        if (empty($response->houses->houses)) {
            throw new NotFoundException('World does not exists.');
        }

        if (count($response->houses->houses) === 1 && $response->houses->houses[0]->name === 'No houses or flats found.') {
            throw new NotFoundException('Town seems to not exists. Are you sure you type town that has houses?');
        }

        $houses = array();
        foreach ($response->houses->houses as $house) {
            $houses[] = new House(
                $house->houseid, $house->name, $house->size, $house->rent, $house->status
            );
        }

        $this->houses = new Houses($response->houses->town, $response->houses->world, $response->houses->type, $houses);

        parent::__construct($response);
    }

    /**
     * @return Houses
     */
    public function getHouses(): Houses
    {
        return $this->houses;
    }

}
