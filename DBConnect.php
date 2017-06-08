<?php
/**
 * Created by PhpStorm.
 * User: Lasse
 * Date: 22.05.2017
 * Time: 19:20
 */
//Hosing information
$DB_host = "nsterdt.rf.gd";
$DB_user = "nsterdt_admin";
$DB_pass = "VZg&CpH4VzTb";
$DB_name = "nsterdt_taxiapp";

//Trying to connect
try{
    $DB_connect = new PDO("mysql:host={$DB_host};dbname={$DB_name}", $DB_user, $DB_pass);
    $DB_connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo $e->getMessage();
}

include_once 'DBFacade.php';
$dbFac = new DBFacade($DB_connect);


