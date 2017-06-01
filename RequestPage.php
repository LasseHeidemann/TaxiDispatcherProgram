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


                </thead>
                <tbody>

                <?php

                $orders = $dbFac->displayOrder();
                $status_colors = array(0=> '#0000FF', 2 => '#00FF00');
                foreach ($orders as $order => $value) {
                    foreach ($value as $subvalue => $valueTwo) {

                        if($valueTwo["OrderStatus"] == 0){

                        echo '<tr>';
                        echo '<td>' . $valueTwo["OrderID"] . '</td>';
                        echo '<td>' . $valueTwo["CustomerID"] . '</td>';
                        echo '<td>' . $valueTwo["Location"] . '</td>';
                        echo '<td>' . $valueTwo["Destination"] . '</td>';
                        echo '<td>' . $valueTwo["Time"] . '</td>';

                        if ($valueTwo["SharedTaxi"] == 0) {
                            echo '<td style = "background-color: #FFFFFF"></td>';
                        }

                        if ($valueTwo["SharedTaxi"] == 1) {
                            echo '<td style = "background-color: #008000"></td>';
                        }

                        echo '<td>' . $valueTwo["Persons"] . '</td>';
                        echo '<td>' . $valueTwo["Childseats"] . '</td>';

                        if ($valueTwo["Handicapped"] == 0) {
                            echo '<td style = "background-color: #FFFFFF"></td>';
                        }

                        if ($valueTwo["Handicapped"] == 1) {
                            echo '<td style = "background-color: #008000"></td>';
                        }

                        echo "'<td><select id='selectedTaxi' name = 'selectedTaxi'>";

                        $taxis = $dbFac->displayTaxi();
                        foreach ($taxis as $taxi => $value) {
                            foreach ($value as $subvalue => $valueTwo) {
                                echo '<option value=' . $valueTwo["TaxiID"] . '>Taxi: ' . $valueTwo["TaxiID"] . ',  ' . $valueTwo["CarName"] . ', Seats: ' . $valueTwo["CarSeats"] . ' </option>';
                            }
                        }
                        echo '</select></td>';

                        echo '<td><input type = button name = submit a href="UpdateTaxi.php" value = GO! </td>';

                            if($_POST['submit'] && $_POST['submit'] != 0)
                            {
                                $selectedTaxi=$_POST['selectedTaxi'];

                                echo $selectedTaxi;
                            }

                        echo '</tr>';
                        }

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