<?php


namespace Tasty_Juices;


interface JFactory
{
    /**
     * @param $truck_array - array of fruits quantities ['banana'=>6000,'apple'=>1000]
     * @return mixed
     */
    public function unloadTruck($truck_array);

    /**
     * @param $packs - integer amount of Juices Packs
     * @return mixed
     */
    public function loadTruck($packs);

    /**
     * @param $hours - integer amount of time, that line is working
     * @param $line_type - big or small line
     * @param $recipes - key of recipes array
     * @return mixed - ID of this working productionline
     */
    public function runLine($hours, $line_type, $recipes);

    /**
     * @param $id of working production line (provided by loadTruck function)
     * @return mixed
     */
    public function stopLine($id);

    /**
     * @return information:
     * fruits amounts
     * production lines states
     * amount of packages in warehouse
     */
    public function info();

}