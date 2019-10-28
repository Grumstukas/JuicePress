<?php


namespace Tasty_Juices;


class Factory implements JFactory
{
    private $equipment = [];

    /**
     * Factory constructor.
     */
    public function __construct($small_container_count, $small_container_capacity,
                                $big_container_count, $big_container_capacity,
                                $small_prodLines_count, $small_prodLines_capacity,
                                $big_prodLines_count, $big_prodLines_capacity,
                                $warehouse_capacity)
    {
        $equipment = [];
        for ($i = 1; $i <= $small_container_count; $i++) {
            $name = 'small_container_' . $i;
            ${$name} = new Container($small_container_capacity, 'small');
            $equipment['container'][$i] = ${$name};
        }

        for ($i = ($small_container_count + 1); $i <= ($small_container_count + $big_container_count); $i++) {
            $name = 'big_container_' . $i;
            ${$name} = new Container($big_container_capacity, 'big');
            $equipment['container'][$i] = ${$name};
        }

        for ($i = 1; $i <= $small_prodLines_count; $i++) {
            $name = 'small_prodLine_' . $i;
            $id = 'id_' . $i;
            ${$name} = new Production_line($small_prodLines_capacity, $id, 'small');
            $equipment['prodLine'][$i] = ${$name};
        }
        for ($i = ($small_prodLines_count + 1); $i <= ($small_prodLines_count + $big_prodLines_count); $i++) {
            $name = 'big_prodLine_' . $i;
            $id = 'id_' . $i;
            ${$name} = new Production_line($big_prodLines_capacity, $id, 'big');
            $equipment['prodLine'][$i] = ${$name};
        }
        $equipment['warehouse'] = new Warehouse($warehouse_capacity);
        return $this->equipment = $equipment;
    }

    /**
     * @return array
     */
    public function getEquipment()
    {
        return $this->equipment;
    }


    /**
     * @param $truck_array - array of fruits quantities ['banana'=>6000,'apple'=>1000]
     * @return mixed
     */
    public function unloadTruck($truck_array, Worker $worker, $containers)
    {
        foreach ($truck_array as $fruit => $amount){
            $worker->fill_container($fruit, $amount, $containers);
        }
    }

    /**
     * @param $packs - integer amount of Juices Packs
     * @return mixed
     */
    public function loadTruck($packs)
    {

    }

    /**
     * @param $hours - integer amount of time, that line is working
     * @param $line_type - big or small line
     * @param $recipes - key of recipes array
     * @return mixed - ID of this working productionline
     */
    public function runLine($hours, $line_type, $recipes)
    {

    }

    /**
     * @param $id of working production line (provided by loadTruck function)
     * @return mixed
     */
    public function stopLine($id)
    {

    }

    /**
     * @return information:
     * fruits amounts
     * production lines states
     * amount of packages in warehouse
     */
    public function info()
    {

    }
}