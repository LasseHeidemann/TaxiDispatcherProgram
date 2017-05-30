<?php
/**
 * Created by PhpStorm.
 * User: Nico
 * Date: 5/29/2017
 * Time: 9:27 PM
 */

include('DBFacade.php');

if (isset($_POST['FirstName']) && isset($_POST['LastName']) && isset($_POST['Email']) && isset($_POST['MobileNumber']) &&
    isset($_POST['Password']))
{
    //Get the POST variables
    $firstName = $_POST['FirstName'];
    $lastName = $_POST['LastName'];
    $email = $_POST['Email'];
    $mobileNumber = $_POST['MobileNumber'];
    $password = $_POST['Password'];

    /*$customer = new Customer($firstName, $lastName, $email, $mobileNumber, $password);
    $databaseFacade = new DBFacade();
    echo $databaseFacade->createCustomer($firstName, $lastName, $email, $mobileNumber, $password);*/

    try {
        $sql = "INSERT INTO `Customer` VALUES ( \"\",\"$firstName\",\"$lastName\",\"$email\",\"$mobileNumber\", $password)";
        include("DBConnect.php");
        __executeSqlStatement($sql, "insert");
    } catch (Exception $e){
        echo $e;
    }
}