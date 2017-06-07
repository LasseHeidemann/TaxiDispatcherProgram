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
            <li><a href= "TaxiPage.php">Taxis</a></li>
            <li><a href= "ModePage.php">Mode</a></li>
            <li><a href= "CustomerPage.php">Customer</a></li>
        </ul>
    </nav>

    <pos>
    <div id = "conecnt_area">

        <br>

        <table class = 'overviewTable'
        <table border=1 cellspacing=1 cellpadding=2 align="center">
        <thead></thead>
        <th><b>ID</b></th>
        <th><b>Name</b></th>
        <th><b>Brand</b></th>
        <th><b>Seats</b></th>
        <th><b>Licenseplate</b></th>



        </thead>
            <tbody>

        <?php

        $taxis = $dbFac->displayTaxi();
        foreach ($taxis as $taxi => $value) {
            foreach ($value as $subvalue => $valueTwo) {

                echo '<tr>';
                echo '<td>' . $valueTwo["TaxiID"] . '</td>';
                echo '<td>' . $valueTwo["CarName"] . '</td>';
                echo '<td>' . $valueTwo["CarBrand"] . '</td>';
                echo '<td>' . $valueTwo["CarSeats"] . '</td>';
                echo '<td>' . $valueTwo["LicensePlate"] . '</td>';

                echo '<td><form action="UpdateTaxi.php?id=' . $valueTwo["TaxiID"] . '" method="post"><button name = update value = "' . $valueTwo["TaxiID"] . '"> Update</button></form></td>';

                echo '<td><form action="" method="post"><button name = delete value = "' . $valueTwo["TaxiID"] . '"> Delete</button></form></td>';
                echo '</tr>';

                    if (isset($_POST['delete'])) {
                    if ($dbFac->deleteTaxi($_POST['delete']))
                        $dbFac->refresh(0);
                    } else {

                    }
                };
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
        <p> Welcome to our Unter Taxi Company </p>
    </footer>

</body>

</html>