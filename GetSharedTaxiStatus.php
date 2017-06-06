<?php
/**
 * Created by PhpStorm.
 * User: Nico
 * Date: 6/4/2017
 * Time: 1:36 PM
 */

include 'DBConnect.php';

if ($_SERVER['REQUEST_METHOD'] == "GET"){
    $modes = $dbFac->displayMode();
    foreach ($modes as $modes => $value){
        foreach ($value as $subvalue => $valueTwo){
            if($valueTwo["ModeName"] == "SharedTaxi"){
                echo $valueTwo["ModeStatus"];
            }
        }
    }
}