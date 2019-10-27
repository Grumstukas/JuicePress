<?php


namespace Tasty_Juices;


interface JFactory
{
    public function unloadTruck($truck_array);// argumentas array ['banana'=>6000,'apple'=>1000]
    public function loadTruck($packs);// argumentas pakuočių kiekis integer vnt.
    public function runLine($hours, $line_type, $recipes);// argumentai: linijos darbo valandų skaičius, linijos tipas "big" arba "small" ir
    //receptas iš masyvo $recipes pvz 'sun365'. Ši funkcija turi grąžinti unikalų ID,
    // pagul kurį būtų galima identifikuoti veikiančią produkcijos liniją
    public function stopLine($id); // argumentas veikiančios linijos ID grąžintas iš funkcijos runLine()
    public function info();// išvesti suformatuotą informacią apie padėtį gamykloje: talpyklas, pagamintas pakuotes ir jų skaičių, veikiančias linijas

}