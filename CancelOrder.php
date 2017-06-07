<?php
/**
 * Created by PhpStorm.
 * User: Nico
 * Date: 6/7/2017
 * Time: 9:03 PM
 */

include 'DBConnect.php';

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset ($_POST['OrderID'])
    ){
        $orderID = $_POST['OrderID'];

        $dbFac->cancelOrder($orderID);
        $dbFac->cancelMatchedOrder($orderID);
    }
}