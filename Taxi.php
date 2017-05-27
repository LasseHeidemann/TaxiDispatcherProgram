<?php
/**
 * Created by PhpStorm.
 * User: Lasse
 * Date: 26.05.2017
 * Time: 21:31
 */

class Taxi
{
    private $taxiID, $carName, $carBrand, $carSeats, $licensePlate;

    /**
     * Taxi constructor.
     * @param $taxiID
     * @param $carName
     * @param $carBrand
     * @param $carSeats
     * @param $licensePlate
     */

    public function __construct($carName, $carBrand, $carSeats, $licensePlate)
    {
        $this->carName = $carName;
        $this->carBrand = $carBrand;
        $this->carSeats = $carSeats;
        $this->licensePlate = $licensePlate;
    }
}