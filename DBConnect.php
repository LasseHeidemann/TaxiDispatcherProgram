<?php
/**
 * Created by PhpStorm.
 * User: Lasse
 * Date: 22.05.2017
 * Time: 19:20
 */

$DB_host = "sql11.freemysqlhosting.net:3306";
$DB_user = "sql11177551";
$DB_pass = "kgwa1WnjEC";
$DB_name = "sql11177551";


try{
    $DB_connect = new PDO("mysql:host={$DB_host};dbname={$DB_name}", $DB_user, $DB_pass);
    $DB_connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo $e->getMessage();
}

include_once 'DBFacade.php';
$dbFac = new DBFacade($DB_connect);


