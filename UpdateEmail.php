<?php
/**
 * Created by PhpStorm.
 * User: Nico
 * Date: 6/6/2017
 * Time: 8:02 PM
 */

include 'DBConnect.php';

if($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['OldEmail']) && (isset($_POST['NewEmail']))
    ) {
        //Get the POST variables
        $oldEmail = $_POST['OldEmail'];
        $newEmail = $_POST['NewEmail'];

        echo $dbFac->updateCustomerEmail($oldEmail, $newEmail);
    }
}