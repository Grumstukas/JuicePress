<?php


namespace Tasty_Juices;


class Factory
{
    private $smallBin;
    private $bigBin;
    private $warehouse;
    private $warehouse_max = 35000;
    private $smallBin_max = 5000;
    private $bigBin_max = 15000;
    private $count_of_small_bins = 5;
    private $count_of_big_bins = 2;

    private $recipes = [
        'banana' => ['banana' => 0.7],
        'apple_cherry' => ['apple' => 0.5, 'cherry' => 0.2],
        'kubus' => ['apricot' => 0.2, 'apple' => 0.4, 'banana' => 0.3],
        'sun365' => ['melon' => 0.3, 'mango' => 0.1, 'pineapple' => 0.45],
        'granini' => ['pear' => 0.7, 'carrot' => 0.15]
    ];

    private $prodLine = [
        'prodLine_1' => ['status' => 'off', 'capacity' => 2000, 'line_type' => 'small'],
        'prodLine_2' => ['status' => 'off', 'capacity' => 2000, 'line_type' => 'small'],
        'prodLine_3' => ['status' => 'off', 'capacity' => 5000, 'line_type' => 'big']
    ];

    /**
     * @param array $truck_array eg. ['banana'=>6000,'apple'=>1000]
     */


    /**
     * function places fruts in bins.
     * @param $fruit
     * @param $amount
     */

    private function storeFruits($fruit, $amount)
    {
        if ($amount <= $this->smallBin_max) /*do the amount of fruits fits in a SMALL bin?*/ {
            if ((isset($this->bigBin[$fruit]) == true)) /*is there a BIG bin with the same fruits?*/ {
                if (($this->bigBin[$fruit] + $amount) <= $this->bigBin_max) /*do contents of that bin and amount of this fruit fits in a BIG bin? */ {
                    $this->bigBin[$fruit] += $amount;
                } else /*contents doesn't fit in BIG bin*/ {
                    echo '<p style="color: red">'.$fruit . ' netelpa ' . $amount . 'vnt !!!</p>';
                }
            } else {
                if ((isset($this->smallBin[$fruit]) == true)) /*is there a SMALL bin with the same fruits?*/ {
                    if (($this->smallBin[$fruit] + $amount) <= $this->smallBin_max) /*do contents of that bin and amount of this fruit fits in a SMALL bin? */ {
                        $this->smallBin[$fruit] += $amount;
                    } else/*contents doesn't fit in SMALL bin*/ {
                        if ((isset($this->bigBin[$fruit]) == true)) /*is there a BIG bin with the same fruits?*/ {
                            if (($this->bigBin[$fruit] + $amount) <= $this->bigBin_max) /*do contents of that bin and amount of this fruit fits in a BIG bin? */ {
                                $this->bigBin[$fruit] += $amount;
                            } else /*contents doesn't fit in BIG bin*/ {
                                echo '<p style="color: red">'.$fruit . ' netelpa ' . $amount . 'vnt !!!</p>';
                            }
                        } else /*there is no BIG bin with the same fruits*/ {
                            if ((isset($this->bigBin) ? count($this->bigBin) : 0) < $this->count_of_big_bins)/*is there empty BIG bins?*/ {
                                $this->bigBin[$fruit] = $this->smallBin[$fruit] + $amount;
                                unset($this->smallBin[$fruit]);

                            } else /*there is no empty BIG bins...*/ {
//                                echo $fruit.' netelpa '.$amount.'vnt !!!';
                                $this->rearrange_Fruit_Bins($fruit, $amount);
                            }
                        }
                    }
                } else /*there is no SMALL bin with the same fruits*/ {
                    if ((isset($this->smallBin) ? count($this->smallBin) : 0) < $this->count_of_small_bins)/*is there empty SMALL bins?*/ {
                        $this->smallBin[$fruit] = $amount;
                    } else /*there is no empty SMALL bins...*/ {
                        if ((isset($this->bigBin[$fruit]) == true)) /*is there a BIG bin with the same fruits?*/ {
                            if (($this->bigBin[$fruit] + $amount) <= $this->bigBin_max) /*do contents of that bin and amount of this fruit fits in a BIG bin? */ {
                                $this->bigBin[$fruit] += $amount;
                            } else /*contents doesn't fit in BIG bin*/ {
                                echo '<p style="color: red">'.$fruit . ' netelpa ' . $amount . 'vnt !!!</p>';
                            }
                        } else /*there is no BIG bin with the same fruits*/ {
                            if ((isset($this->bigBin) ? count($this->bigBin) : 0) < $this->count_of_big_bins)/*is there empty BIG bins?*/ {
                                $this->bigBin[$fruit] = $amount;
                            } else /*there is no empty BIG bins...*/ {
                                echo '<p style="color: red">'.$fruit . ' netelpa ' . $amount . 'vnt !!!</p>';
                            }
                        }
                    }
                }
            }
        } else /*amount of fruits fits in a BIG bin*/ {
            if ((isset($this->bigBin[$fruit]) == true)) /*is there a BIG bin with the same fruits?*/ {
                if (($this->bigBin[$fruit] + $amount) <= $this->bigBin_max) /*do contents of that bin and amount of this fruit fits in a BIG bin? */ {
                    $this->bigBin[$fruit] += $amount;
                } else /*contents doesn't fit in BIG bin*/ {
                    echo '<p style="color: red">'.$fruit . ' netelpa ' . $amount . 'vnt !!!</p>';
                }
            } else /*there is no BIG bin with the same fruits*/ {
                if ((isset($this->bigBin) ? count($this->bigBin) : 0) < $this->count_of_big_bins)/*is there empty BIG bins?*/ {
                    $this->bigBin[$fruit] = $amount;
                } else /*there is no empty BIG bins...*/ {
                    echo '<p style="color: red">'.$fruit . ' netelpa ' . $amount . 'vnt !!!</p>';
                }
            }
        }
    }

    /*if some fruit doesn't fit, but there is possibility to switch places content of big and small bins to fit it any way*/

    private function rearrange_Fruit_Bins($fruit, $amount)
    {
        $bin_for_switching = '';
        $oportuntity_to_switch = 0;
        foreach ($this->bigBin as $big_bin_fruit_name => $bin_content) {
            if ($this->bigBin[$big_bin_fruit_name] <= $this->smallBin_max) {
                $bin_for_switching = $big_bin_fruit_name;
                $oportuntity_to_switch = 1;
            }
        }
        if ($oportuntity_to_switch == 1) {
            $temporary_bin[$bin_for_switching] = $this->bigBin[$bin_for_switching];
            unset($this->bigBin[$bin_for_switching]);
            $this->bigBin[$fruit] = $this->smallBin[$fruit] + $amount;
            unset($this->smallBin[$fruit]);
            $this->smallBin[$bin_for_switching] = $temporary_bin[$bin_for_switching];
        } else {
            echo $fruit . ' netelpa ' . $amount . 'vnt !!!';
        }

    }

    public function unloadTruck($truck_array)
    {
        /*iteration among fruits that arrived with the truck*/
        foreach ($truck_array as $fruit => $amount) {
            $this->storeFruits($fruit, $amount);
        }
    }

    public function loadTruck($packs)
    {
        if (isset($this->warehouse) && array_sum($this->warehouse) >= $packs) {

            $for_export = 0;
            while ($for_export != $packs) {
                foreach ($this->warehouse as $juice_type => $amount) {
                    if($amount == 0)
                    {
                        break;
                    }
                    else if ($amount <= ($packs - $for_export))
                    {
                        $for_export += $amount;
                        $this->warehouse[$juice_type] = 0;
                    }
                    else if ($amount > ($packs - $for_export))
                    {
                        $this->warehouse[$juice_type] = $this->warehouse[$juice_type] - ($packs - $for_export);
                        $for_export += $packs - $for_export;
                    }
                }
                foreach ($this->warehouse as $juice_type => $amount)
                {
                    if($amount == 0)
                    {
                        unset($this->warehouse[$juice_type]);
                    }
                }

            }
            echo 'išsiunčiama ' . $for_export . ' pakelių sulčių<br>';
        } else {
            echo '<p style="color: red">Sandėlyje trūksta pakuočių, kurias būtų galima išvežti..</p>';
        }
    }

    public function count_runnable_lines($property1, $property1_value, $property2, $property2_value)
    {
        $runnable_lines = array();
        //can run?
        foreach ($this->prodLine as $line => $value) {
            if (($value[$property1] == $property1_value) && ($value[$property2] == $property2_value)) {
                $runnable_lines[$line] = $value;
            }
        }
//        print_r($runnable_lines);
        return $runnable_lines;
    }

    /**
     * @return mixed
     */
    public function amount_of_ingredient($ingredient)
    {
        $amount = 0;
        foreach ($this->smallBin as $fruit => $stock) {
            if ($fruit == $ingredient) {
                $amount += $stock;
            }
        }
        if ($amount == 0) {
            foreach ($this->bigBin as $fruit => $stock) {
                if ($fruit == $ingredient) {
                    $amount += $stock;
                }
            }
        }
        return $amount;
    }

    public function runLine($hours, $line_type, $recipes)
    {
        $runnable_lines = $this->count_runnable_lines(
            'status', 'off',
            'line_type', $line_type);

        $firstKey = array_key_first($runnable_lines);

        if (count($runnable_lines) > 0) {
            $resources_are_sufficient = array();
            $product_basket = array();
            $line_capacity = $runnable_lines[$firstKey]['capacity'];
            $juice_recipes = $this->recipes[$recipes];

            /*checking if ingredients are enough for juice production*/
            foreach ($juice_recipes as $ingredient => $amount) {
                $required_fruit_amount = $hours * $line_capacity * $amount;

                if ($this->amount_of_ingredient($ingredient) >= $required_fruit_amount) {
                    $resources_are_sufficient[] = 1;
                    $product_basket[$ingredient] = $required_fruit_amount;
                } else {
                    $resources_are_sufficient[] = 0;
                }
            }
        } else {
            echo '<p style="color: red">visos gamybos linijos turinčios požymį <b>' . $line_type . '</b> yra užimtos! <b>PRAŠOME IŠVALYKITE LINIJAS</b></p>';
            echo isset($resources_are_sufficient);
        }
        if (isset($resources_are_sufficient)) {
            if ((isset($resources_are_sufficient)) && (array_sum($resources_are_sufficient) == count($juice_recipes))) //if everything are enough...
            {
//            echo array_key_first($runnable_lines);
                $this->prodLine[$firstKey]['status'] = 'on'; //įjungiama linija

                echo 'spaudžiamos <b>' . $recipes . '</b> sultys<br>';
                foreach ($product_basket as $fruit => $used_amount) {
                    foreach ($this->smallBin as $bin_fruit => $bin_stock) {
                        if ($bin_fruit == $fruit) {
                            $this->smallBin[$bin_fruit] = ($bin_stock - $used_amount);
                            if ($this->smallBin[$bin_fruit] == 0) {
                                unset($this->smallBin[$bin_fruit]);
                            }
                        }
                    }
                    foreach ($this->bigBin as $bin_fruit => $bin_stock) {
                        if ($bin_fruit == $fruit) {
                            $this->bigBin[$bin_fruit] = ($bin_stock - $used_amount);
                            if ($this->bigBin[$bin_fruit] == 0) {
                                unset($this->bigBin[$bin_fruit]);
                            }
                        }
                    }

                }

                $this->warehouse[$recipes] = (isset($this->warehouse[$recipes])) ? ($this->warehouse[$recipes] + $line_capacity) : $line_capacity;

            } else {
                echo '<p style="color: red">Not enough fruits</p>';
            }
        }

        return $firstKey;
    }

    public function stopLine($id)
    {
        $this->prodLine[$id]['status'] = 'off'; //išjungiama linija
        echo 'išjungiama linija: ' . $id . '<br>';
    }

    public function info()
    {
        $t = '&nbsp;&nbsp;&nbsp;&nbsp;';
        $number = 0;
        echo '*****************************************************************************************************<br>';
        echo
        '<b>Gamyklos atsargos</b>:<br><br>';
        if (isset($this->smallBin)) {
            foreach ($this->smallBin as $fruit => $bin_content) {
                $number++;
                echo 'Mažoji talpykla nr.:' . $number . '' . $t . 'Vaisiai: ' . $fruit . '' . $t . 'kiekis :' . $bin_content . '<br>';
            }
        }
        $number = 0;
        echo '<br>';
        if (isset($this->bigBin)) {
            foreach ($this->bigBin as $fruit => $bin_content) {
                $number++;
                echo 'Didžioji talpykla nr.:' . $number . '' . $t . 'Vaisiai: ' . $fruit . '' . $t . 'kiekis :' . $bin_content . '<br>';
            }
        }

        if (isset($this->warehouse)) {
            echo '<br>Sandėlyje laikome: <br>';
            foreach ($this->warehouse as $juice_name => $juice_amount) {
                echo $juice_amount . ' vnt jau pagamintų <b>' . $juice_name . '</b> sulčių pakuočių<br>';
            }
            echo '<br>Sandėlio užimtumas yra <b>' . round((array_sum($this->warehouse) * 100) / $this->warehouse_max) . '%</b>';
        } else {
            echo '<br>Sandėlyje pagamintų sulčių pakuočių šiuo metu - <b>nėra</b>';
        }

        echo '<br><br>Situacija su gamybos linijomis: <br>';
        foreach ($this->prodLine as $item => $value) {
            echo $item . ' statusas yra <b>' . $value['status'] . '</b><br>';
        }

        echo '*****************************************************************************************************<br>';
    }

}