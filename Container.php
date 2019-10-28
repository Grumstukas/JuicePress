<?php

namespace Tasty_Juices;

class Container
{
    private $type;
    private $capacity;
    private $occupancy;
    private $fruit;

    /**
     * Container constructor.
     */
    public function __construct($capacity, $type)
    {
        $this->capacity = $capacity;
        $this->type = $type;
    }

    public function store_fruits($amount, $fruit){

        $this->fruit = $fruit;
        $this->occupancy = $amount;

    }

    public function add_fruits($amount){

        $this->occupancy += $amount;
    }

    /**
     * @return mixed
     */
    public function getOccupancy()
    {
        return $this->occupancy;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * @return mixed
     */
    public function getFruit()
    {
        return $this->fruit;
    }


}