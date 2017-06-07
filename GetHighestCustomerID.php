<?php
/**
 * Created by PhpStorm.
 * User: Nico
 * Date: 6/7/2017
 * Time: 5:37 PM
 */

include 'DBConnect.php';

if ($_SERVER['REQUEST_METHOD'] == "GET"){
    $costumers = $dbFac->getHighestCustomerID();
    foreach ($costumers as $costumers => $value) {
        echo $value;
    }
}