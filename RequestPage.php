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
    <meta http-equiv="refresh" content="5" >
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

                        if($valueTwo["OrderStatus"] == 0) {

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
                            echo '<td>' . $valueTwo["ChildSeats"] . '</td>';

                            if ($valueTwo["Handicapped"] == 0) {
                                echo '<td style = "background-color: #FFFFFF"></td>';
                            }

                            if ($valueTwo["Handicapped"] == 1) {
                                echo '<td style = "background-color: #008000"></td>';
                            }

                            echo "<td><form action='#' method='post'><select name = 'selected_Taxi'>";

                            $taxis = $dbFac->displayTaxi();
                            foreach ($taxis as $taxi => $value) {
                                foreach ($value as $subvalue => $valueTwoTaxi) {

                                    if ($valueTwoTaxi["Available"] == 1) {
                                        echo '<option value=' . $valueTwoTaxi["TaxiID"] . '>Taxi: ' . $valueTwoTaxi["TaxiID"] . ',  ' . $valueTwoTaxi["CarName"] . ', Seats: ' . $valueTwoTaxi["CarSeats"] . '</option>';
                                    }
                                }
                            }

                            echo '</select></td>';

                            echo '<td><form action="" method="post"><button name = submit value = "' . $valueTwo["OrderID"] . '"> GO! </button></form></td></form>';

                            echo '</tr>';
                        }
                    }

                    if (isset($_POST['submit'])) {
                        $selectedTaxi = $_POST['selected_Taxi'];

                        $customerID = $dbFac->getCustomerIDfromOrder($_POST['submit']);
                        $receiverMail = $dbFac->getCustomerEmail($customerID);

                        $receiver = $receiverMail;
                        $topic = 'Information about your requested Taxi';
                        $from = 'From: Unter Taxi <untertaxi@gmail.com>';
                        $text = 'Hello, your Taxi will arrive within the next 20 mintues. Thank you for your order. Your Unter Taxi Company';

                        if ($dbFac->createMatchedOrder($_POST['submit'], $selectedTaxi)) {
                            $dbFac->setTaxiBusy($selectedTaxi);
                            $dbFac->setOrderToCompleted($_POST['submit']);
                            mail($receiver, $topic, $text, $from);
                            $dbFac->redirect("BookingsPage.php");

                        } else {
                            echo "ERROR";
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
    <p> Welcome to our Unter Taxi Company </p>
</footer>

</body>

</html>