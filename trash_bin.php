<?php
////    private function is_there_bin_with_same_fruits($size,$fruit, $amount)
////    {
////        $bin = ${'this->'$size'Bin[$fruit]'}
////        if ((isset($bin) == true)) /*is there a BIG bin with the same fruits?*/
////        {
////            if (($this->bigBin[$fruit] + $amount) <= $this->bigBin_max) /*do contents of that bin and amount of this fruit fits in a BIG bin? */
////            {
////                $this->bigBin[$fruit] += $amount;
////            }
////            else /*contents doesn't fit in BIG bin*/
////            {
////                echo 'NETELPA !!!';
////            }
////        }
////        else /*there is no BIG bin with the same fruits*/
////        {
////            if ((isset($this->bigBin) ? count($this->bigBin) : 0) < $this->count_of_big_bins)/*is there empty BIG bins?*/
////            {
////                $this->bigBin[$fruit] = $this->smallBin[$fruit] + $amount;
////                unset($this->smallBin[$fruit]);
////
////            }
////            else /*there is no empty BIG bins...*/
////            {
////                echo 'NETELPA !!!';
////            }
////        }
////    }
//
//
//private function storeFruits($fruit, $amount)
//{
//    if ($amount <= $this->smallBin_max) /*do the amount of fruits fits in a SMALL bin?*/
//
//    {
//        if ((isset($this->bigBin[$fruit]) == true)) /*is there a BIG bin with the same fruits?*/
//        {
//            if (($this->bigBin[$fruit] + $amount) <= $this->bigBin_max) /*do contents of that bin and amount of this fruit fits in a BIG bin? */
//            {
//                $this->bigBin[$fruit] += $amount;
//            }
//            else /*contents doesn't fit in BIG bin*/
//            {
//                echo $fruit.' NETELPA !!!';
//            }
//        }
//        else
//        {
//            if ((isset($this->smallBin[$fruit]) == true)) /*is there a SMALL bin with the same fruits?*/
//            {
//                if (($this->smallBin[$fruit] + $amount) <= $this->smallBin_max) /*do contents of that bin and amount of this fruit fits in a SMALL bin? */
//                {
//                    $this->smallBin[$fruit] += $amount;
//                }
//                else/*contents doesn't fit in SMALL bin*/
//                {
//                    if ((isset($this->bigBin[$fruit]) == true)) /*is there a BIG bin with the same fruits?*/
//                    {
//                        if (($this->bigBin[$fruit] + $amount) <= $this->bigBin_max) /*do contents of that bin and amount of this fruit fits in a BIG bin? */
//                        {
//                            $this->bigBin[$fruit] += $amount;
//                        }
//                        else /*contents doesn't fit in BIG bin*/
//                        {
//                            echo 'NETELPA !!!';
//                        }
//                    }
//                    else /*there is no BIG bin with the same fruits*/
//                    {
//                        if ((isset($this->bigBin) ? count($this->bigBin) : 0) < $this->count_of_big_bins)/*is there empty BIG bins?*/
//                        {
//                            $this->bigBin[$fruit] = $this->smallBin[$fruit] + $amount;
//                            unset($this->smallBin[$fruit]);
//
//                        }
//                        else /*there is no empty BIG bins...*/
//                        {
//                            echo 'NETELPA !!!';
//                        }
//                    }
//                }
//            }
//            else /*there is no SMALL bin with the same fruits*/
//            {
//                if ((isset($this->smallBin) ? count($this->smallBin) : 0) < $this->count_of_small_bins)/*is there empty SMALL bins?*/
//                {
//                    $this->smallBin[$fruit] = $amount;
//                }
//                else /*there is no empty SMALL bins...*/
//                {
//                    if ((isset($this->bigBin[$fruit]) == true)) /*is there a BIG bin with the same fruits?*/
//                    {
//                        if (($this->bigBin[$fruit] + $amount) <= $this->bigBin_max) /*do contents of that bin and amount of this fruit fits in a BIG bin? */
//                        {
//                            $this->bigBin[$fruit] += $amount;
//                        }
//                        else /*contents doesn't fit in BIG bin*/
//                        {
//                            echo 'NETELPA !!!';
//                        }
//                    }
//                    else /*there is no BIG bin with the same fruits*/
//                    {
//                        if ((isset($this->bigBin) ? count($this->bigBin) : 0) < $this->count_of_big_bins)/*is there empty BIG bins?*/
//                        {
//                            $this->bigBin[$fruit] = $amount;
//                        }
//                        else /*there is no empty BIG bins...*/
//                        {
//                            echo 'NETELPA !!!';
//                        }
//                    }
//                }
//            }
//        }
//    }
//    else /*amount of fruits fits in a BIG bin*/
//    {
//        if ((isset($this->bigBin[$fruit]) == true)) /*is there a BIG bin with the same fruits?*/
//        {
//            if (($this->bigBin[$fruit] + $amount) <= $this->bigBin_max) /*do contents of that bin and amount of this fruit fits in a BIG bin? */
//            {
//                $this->bigBin[$fruit] += $amount;
//            }
//            else /*contents doesn't fit in BIG bin*/
//            {
//                echo 'NETELPA !!!';
//            }
//        }
//        else /*there is no BIG bin with the same fruits*/
//        {
//            if ((isset($this->bigBin) ? count($this->bigBin) : 0) < $this->count_of_big_bins)/*is there empty BIG bins?*/
//            {
//                $this->bigBin[$fruit] = $amount;
//            }
//            else /*there is no empty BIG bins...*/
//            {
//                echo 'NETELPA !!!';
//            }
//        }
//    }
//}