<?php

namespace Tasty_Juices;

class Worker
{
    public function fill_container($fruit, $amount, $containers)
    {

        foreach ($containers as $container) {

            if ($container->getFruit() === $fruit){
                if ($container->getOccupancy() + $amount <= $container->getCapacity()){
                    $container->add_fruits($amount);
                    return 'fruits added to existing container';
                }
                else{
                    continue;
                }

            }

            else if ($container->getFruit() === null){
                if ($amount <= $container->getCapacity()){
                    $container->store_fruits($amount, $fruit);
                    return 'fruits added to existing container';
                }
                else{
                    continue;
                }
            }
        }
    }

    private function choose_container()
    {

    }

    private function check_container()
    {

    }

    private function rearrange_fruits_in_containers()
    {

    }

    private function turn_on_line()
    {

    }

    private function turn_off_line()
    {

    }

//                echo 'cherry ';
//$container->store_fruits($amount, $fruit);

}