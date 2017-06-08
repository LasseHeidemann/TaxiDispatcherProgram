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
            <li><a href= "TaxiPage.php">Taxis</a></li>
            <li><a href= "ModePage.php">Mode</a></li>
            <li><a href= "CustomerPage.php">Customer</a></li>
        </ul>
    </nav>

    <pos>
        <div id = "content_area">

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
                //Getting all the Orders with OderStatus = "0"
                $orders = $dbFac->displayOrder();
                //Looping throw all the Orders
                foreach ($orders as $order => $value) {
                    foreach ($value as $subvalue => $valueTwo) {

                        //Adding data to the Table
                            echo '<tr>';
                            echo '<td>' . $valueTwo["OrderID"] . '</td>';
                            echo '<td>' . $valueTwo["CustomerID"] . '</td>';
                            echo '<td>' . $valueTwo["Location"] . '</td>';
                            echo '<td>' . $valueTwo["Destination"] . '</td>';
                            echo '<td>' . $valueTwo["Time"] . '</td>';

                        //White background when the shardeTaxi is off
                            if ($valueTwo["SharedTaxi"] == 0) {
                                echo '<td style = "background-color: #FFFFFF"></td>';
                            }
                        //green background when the shardeTaxi is on
                            if ($valueTwo["SharedTaxi"] == 1) {
                                echo '<td style = "background-color: #008000"></td>';
                            }

                            echo '<td>' . $valueTwo["Persons"] . '</td>';
                            echo '<td>' . $valueTwo["ChildSeats"] . '</td>';

                        //White background when the handicapped is off
                            if ($valueTwo["Handicapped"] == 0) {
                                echo '<td style = "background-color: #FFFFFF"></td>';
                            }

                        //green background when the handicapped is on
                            if ($valueTwo["Handicapped"] == 1) {
                                echo '<td style = "background-color: #008000"></td>';
                            }

                            //Creating the Drop-Down list for the available taxis
                            echo "<td><form action='#' method='post'><select name = 'selected_Taxi'>";
                            // Getting all the available taxis
                            $taxis = $dbFac->displayAvailableTaxi();

                            //looping throw all the available taxis
                        foreach ($taxis as $taxi => $value) {
                            foreach ($value as $subvalue => $valueTwoTaxi) {
                                //creating an option value for each available taxi
                                echo '<option value=' . $valueTwoTaxi["TaxiID"] . '>Taxi: ' . $valueTwoTaxi["TaxiID"] . ',  ' . $valueTwoTaxi["CarName"] . ', Seats: ' . $valueTwoTaxi["CarSeats"] . '</option>';

                            }
                        }
                            echo '</select></td>';
                            //creating the submit button
                            echo '<td><form action="" method="post"><button name = submit value = "' . $valueTwo["OrderID"] . '"> GO! </button></form></td></form>';

                            echo '</tr>';
                    }

                    if (isset($_POST['submit'])) {
                        //Getting the selected Taxi from the drop-down List
                        $selectedTaxi = $_POST['selected_Taxi'];

                        $customerID = $dbFac->getCustomerIDfromOrder($_POST['submit']); // Get the CustomerID from the OrderTable
                        $receiverMail = $dbFac->getCustomerEmail($customerID); // Get the CustomerEmail from the Customer Table

                        if ($dbFac->createMatchedOrder($_POST['submit'], $selectedTaxi)) { // creating a new matchedOrder
                            $dbFac->sendEmailWithMailer($receiverMail); // send the email to the customer
                            $dbFac->setTaxiBusy($selectedTaxi); // set the taxi to busy.. available = "0"
                            $dbFac->setOrderToCompleted($_POST['submit']); // set the order to completed - so it will not be shown on the pange longer OrderStatus = "1"
                            $dbFac->redirect("BookingsPage.php"); // redirects to the BookingPage.php

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