<?php
/**
 * Created by PhpStorm.
 * User: Lasse
 * Date: 30.05.2017
 * Time: 10:16
 */
include "DBConnect.php";

?>


<html>
<head>

    <title> Orders </title>
    <link rel= "stylesheet" type= "text/css" href="Styles/Stylesheet.css"

</head>

<body>

<div id = "wrapper">
    <div id = "banner">
    </div>

    <nav id = "navigation">
        <ul id = "nav">
            <li><a href= "RequestPage.php">Requests</a></li>
            <li><a href= "BookingsPage.php">Bookings</a></li>
            <li><a href= "TaxiPage2.php">Taxis</a></li>
            <li><a href= "SharedModePage.php">Shared Mode</a></li>
        </ul>
    </nav>

    <pos>
        <div id = "conecnt_area">

            <br>

            <table class = 'overviewTable'
            <table border=1 cellspacing=1 cellpadding=2 align="center">
                <thead></thead>
                <th><b>ID</b></th>
                <th><b>Customer ID</b></th>
                <th><b>Location</b></th>
                <th><b>Destination</b></th>
                <th><b>Time</b></th>
                <th><b>SharedTaxi</b></th>
                <th><b>Persons</b></th>
                <th><b>Childseats</b></th>
                <th>Handicapped</th>
                <th>Select Taxi</th>
                <th></th>

                </thead>
                <tbody>

                <?php

                $orders = $dbFac->displayOrder();
                foreach ($orders as $order => $value){
                    foreach ($value as $subvalue => $valueTwo){

                        echo '<tr>';
                        echo            '<td>'.$valueTwo["OrderID"].'</td>';
                        echo            '<td>'.$valueTwo["CustomerID"].'</td>';
                        echo            '<td>'.$valueTwo["Location"].'</td>';
                        echo            '<td>'.$valueTwo["Destination"].'</td>';
                        echo            '<td>'.$valueTwo["Time"].'</td>';
                        echo            '<td>'.$valueTwo["SharedTaxi"].'</td>';
                        echo            '<td>'.$valueTwo["Persons"].'</td>';
                        echo            '<td>'.$valueTwo["Childseats"].'</td>';
                        echo            '<td>'.$valueTwo["Handicapped"].'</td>';
                        echo            '<td><input type = button a href="UpdateTaxi.php" value = Update </td>';
                        echo            '<td><input type = button a href="UpdateTaxi.php" value = GO! </td>';

                        echo '</tr>';
                    }
                }

                ?>
                </tbody>
            </table>

            <br>

        </div>
    </pos>

</div>

<footer>
    <p> All rights reserved </p>
</footer>

</body>

</html>