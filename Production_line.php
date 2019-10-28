<?php

namespace Tasty_Juices;

class Production_line
{
    private $id;
    private $type;
    private $status;
    private $capacity;

    /**
     * Production_line constructor.
     */
    public function __construct($capacity, $id, $type)
    {
        $this->id = $id;
        $this->type = $type;
        $this->status = 'off';
        $this->capacity = $capacity;

    }

    private function squeeze_juices(){

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
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

}