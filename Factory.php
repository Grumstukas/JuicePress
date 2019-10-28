<?php


namespace Tasty_Juices;


class Factory implements JFactory
{
    /**
     * Factory constructor.
     */
    public function __construct($small_container_count, $small_container_capacity,
                                $big_container_count, $big_container_capacity,
                                $small_prodLines_count, $small_prodLines_capacity,
                                $big_prodLines_count, $big_prodLines_capacity,
                                $warehouse_capacity)
    {
        for ($i = 1; $i <= $small_container_count; $i++){
            $name = 'small_container_'.$i;
            ${$name} = new Container($small_container_capacity);
        }
        for ($i = 1; $i <= $big_container_count; $i++){
            $name = 'big_container_'.$i;
            ${$name} = new Container($big_container_capacity);
        }
        for ($i = 1; $i <= $small_prodLines_count; $i++){
            $name = 'small_prodLine_'.$i;
            $id = 'spl_'.$i;
            ${$name} = new Production_line($small_prodLines_capacity, $id);
        }
        for ($i = 1; $i <= $big_prodLines_count; $i++){
            $name = 'big_prodLine_'.$i;
            $id = 'bpl_'.$i;
            ${$name} = new Production_line($big_prodLines_capacity, $id);
        }
        $warehouse = new Warehouse($warehouse_capacity);

    }


    /**
     * @param $truck_array - array of fruits quantities ['banana'=>6000,'apple'=>1000]
     * @return mixed
     */
    public function unloadTruck($truck_array){

    }

    /**
     * @param $packs - integer amount of Juices Packs
     * @return mixed
     */
    public function loadTruck($packs){

    }

    /**
     * @param $hours - integer amount of time, that line is working
     * @param $line_type - big or small line
     * @param $recipes - key of recipes array
     * @return mixed - ID of this working productionline
     */
    public function runLine($hours, $line_type, $recipes){

    }

    /**
     * @param $id of working production line (provided by loadTruck function)
     * @return mixed
     */
    public function stopLine($id){

    }

    /**
     * @return information:
     * fruits amounts
     * production lines states
     * amount of packages in warehouse
     */
    public function info(){

    }
}