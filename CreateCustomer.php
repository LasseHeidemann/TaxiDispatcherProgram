<?php
/**
 * Created by PhpStorm.
 * User: Nico
 * Date: 5/29/2017
 * Time: 9:27 PM
 */

include 'DBConnect.php';

echo $dbFac->createTaxi("h","dsa","4","ab124");

if($_SERVER['REQUEST_METHOD'] == "POST") {
    echo $_POST['FirstName'];
    if (isset($_POST['FirstName']) && isset($_POST['LastName']) && isset($_POST['Email']) && isset($_POST['MobileNumber']) &&
        isset($_POST['Password'])
    ) {
        //Get the POST variables
        $firstName = $_POST['FirstName'];
        $lastName = $_POST['LastName'];
        $email = $_POST['Email'];
        $mobileNumber = $_POST['MobileNumber'];
        $password = $_POST['Password'];

        echo $dbFac->createCustomer($firstName, $lastName, $email, $mobileNumber, $password);
    }
}