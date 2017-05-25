<?php
/**
 * Created by PhpStorm.
 * User: Lasse
 * Date: 25.05.2017
 * Time: 19:20
 */

$DB_host = "localhost";
$DB_user = "root";
$DB_pass = "";
$DB_name = "TaxiApp";


try{
    $DB_connect = new PDO("mysql:host={$DB_host};dbname={$DB_name}", $DB_user, $DB_pass);
    $DB_connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo $e->getMessage();
}

include_once 'DBFacade.php';
//$user = new User($DB_connect);
$dbFac = new DBFacade($DB_connect);


