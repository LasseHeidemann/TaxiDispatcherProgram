<?php
/**
 * Created by PhpStorm.
 * User: Nico
 * Date: 6/1/2017
 * Time: 11:04 AM
 */

include 'DBConnect.php';

if($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['CustomerID']) && isset($_POST['Location']) && isset($_POST['Destination']) && isset($_POST['DateTime']) &&
        isset($_POST['SharedTaxi']) && isset($_POST['Persons'])&& isset($_POST['Childseats'])&& isset($_POST['Handicapped'])

    ) {
        //Get the POST variables
        $customerID = $_POST['CustomerID'];
        $location = $_POST['Location'];
        $destination = $_POST['Destination'];
        $dateTime = $_POST['DateTime'];
        $sharedTaxi = $_POST['SharedTaxi'];
        $persons = $_POST['Persons'];
        $childseats = $_POST['Childseats'];
        $handicapped = $_POST['Handicapped'];

        echo $dbFac->createOrder($customerID, $location, $destination, $dateTime, $sharedTaxi, $persons, $childseats, $handicapped);
    }
}