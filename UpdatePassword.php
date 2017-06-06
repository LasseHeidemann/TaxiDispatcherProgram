<?php
/**
 * Created by PhpStorm.
 * User: Nico
 * Date: 6/6/2017
 * Time: 8:42 PM
 */

include 'DBConnect.php';

if($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['NewPassword']) && (isset($_POST['Email']))
    ) {
        //Get the POST variables
        $newPassword = $_POST['NewPassword'];
        $email = $_POST['Email'];

        echo $dbFac->updateCustomerEmail($newPassword, $email);
    }
}