
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

    <title> Bookings </title>
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
                <th><b>Booking ID</b></th>
                <th><b>Order ID</b></th>
                <th><b>Taxi ID</b></th>
                <th></th>

                </thead>
                <tbody>

                <?php

                $matchedOrders = $dbFac->displayMatchedOrders();
                foreach ($matchedOrders as $matchedOrders => $value){
                    foreach ($value as $subvalue => $valueTwo){

                        echo '<tr>';
                        echo            '<td>'.$valueTwo["MatchedID"].'</td>';
                        echo            '<td>'.$valueTwo["OrderID"].'</td>';
                        echo            '<td>'.$valueTwo["TaxiID"].'</td>';
                        echo            '<td><input type = button a href="UpdateTaxi.php" value = Completed </td>';

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
    <p> Welcome to our Taxi Company </p>
</footer>

</body>

</html>