<?php
/**
 * Created by PhpStorm.
 * User: Nico
 * Date: 6/7/2017
 * Time: 6:17 PM
 */

include 'DBConnect.php';

if ($_SERVER['REQUEST_METHOD'] == "GET"){
    $orders = $dbFac->getHighestOrderID();
    foreach ($orders as $orders => $value) {
        echo $value;
    }
}