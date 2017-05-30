<?php
/**
 * Created by PhpStorm.
 * User: Lasse
 * Date: 30.05.2017
 * Time: 10:16
 */

$title = "Taxis";

$content = '<h1>Taxis</h1>

<a href="CreateNewTaxi.php"> Add a new Taxi</a><br/> ';

include "DBConnect.php";

?>


<html>
    <head>

        <title> <?php echo $title; ?>  </title>
<link rel= "stylesheet" type= "text/css" href="Styles/Stylesheet.css"

</head>

<body>

<div id = "wrapper">
    <div id = "banner">
    </div>

    <nav id = "navigation">
        <ul id = "nav">
            <li><a href= "Index.php">Home</a></li>
            <li><a href= "BookingPage.php">Booking</a></li>
            <li><a href= "TaxiPage.php">Taxis</a></li>
        </ul>
    </nav>

    <pos>
    <div id = "conecnt_area">

        <table class = 'overviewTable'
        <table align="">
        <thead></thead>
        <th><b>ID</b></th>
        <th><b>Name</b></th>
        <th><b>Brand</b></th>
        <th><b>Seats</b></th>
        <th><b>Licenseplate</b></th>
        <th></th>
        <th></th>
        </thead>
            <tbody>

        <?php

        $taxis = $dbFac->displayTaxi();
        foreach ($taxis as $taxi => $value){
            foreach ($value as $subvalue => $valueTwo){

                echo '<tr>';
                echo            '<td>'.$valueTwo["TaxiID"].'</td>';
                echo            '<td>'.$valueTwo["CarName"].'</td>';
                echo            '<td>'.$valueTwo["CarBrand"].'</td>';
                echo            '<td>'.$valueTwo["CarSeats"].'</td>';
                echo            '<td>'.$valueTwo["LicensePlate"].'</td>';

                echo '</tr>';
            }
        }

        ?>
            </tbody>
        </table>

        <br>

        <a href="CreateNewTaxi.php"> Add a new Taxi</a><br/>

    </div>
    </pos>

    </div>

    <footer>
        <p> All rights reserved </p>
    </footer>

</body>

</html>