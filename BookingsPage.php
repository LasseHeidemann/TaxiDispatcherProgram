<?php
/**
 * Created by PhpStorm.
 * User: Lasse
 * Date: 30.05.2017
 * Time: 10:16
 */
include "DBConnect.php";

/**
 * The BookingsPage.php is for the MatchedOrders, which are Orders/Requests with a assigned Taxi.
 * The Page will show all the MatchedOrders which are activ, but also the ones who got canceled by a Customer throw the APP.
 * @param MatchedOrderID - The ID of the MatchedOrder
 * @param OrderID - The Order ID
 * @param TaxiID - The ID of the assigned Taxi to the MatchedOrder
 * @param Canceled - Shows if the Order got canceled by the Customer throw the APP
 */

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
                <th><b>Booking ID</b></th>
                <th><b>Order ID</b></th>
                <th><b>Taxi ID</b></th>
                <th><b>Canceled</b></th>

                </thead>
                <tbody>

                <?php
                //Displaying all the MatchedOrders, where the OrderStatus is = 0, so that it shows all the not completed MatchedOrders and also the canceled Orders from the Customer
                $matchedOrders = $dbFac->displayMatchedOrders();

                //Looping throw all the MatchedOrders which a OrderStatus = 0
                foreach ($matchedOrders as $matchedOrders => $value){
                    foreach ($value as $subvalue => $valueTwo){

                        //Adding the Data to the Table
                        echo '<tr>';
                        echo '<td>'.$valueTwo["MatchedID"].'</td>';
                        echo '<td>'.$valueTwo["OrderID"].'</td>';
                        echo '<td>'.$valueTwo["TaxiID"].'</td>';

                            //If statement for the Button. When the Order is not canceled, then the Dispatcher can complete the Order with the Button
                            if ($valueTwo["IsCanceled"] == 0) {

                                //Adding a white background if the Order is not canceled
                                echo '<td style = "background-color: #FFFFFF"></td>';

                                //Adding the Button to the Page, which completes an finished Order, so the Customer has arrived his destination
                                echo'<td><form action="" method="post"><button name = complete value = "'.$valueTwo["MatchedID"].'"> Completed</button> </form></td>';
                            }

                            //If statement for the Button. When the Order is canceled, then the Dispatcher should confirm, that he noticed, that the Order was deleted
                            if ($valueTwo["IsCanceled"] == 1) {

                                //Adding a red background if the Order is canceled
                                echo '<td style = "background-color: #FF0000"></td>';

                                //Adding the Button to the Page, which confirms, that the Dispatcher has seen the canceled Order
                                echo'<td><form action="" method="post"><button name = confirm value = "'.$valueTwo["MatchedID"].'"> Confirm</button> </form></td>';
                            }

                        echo '</tr>';
                        }

                }
                //Button action to complete an MatchedOrder, which means, that the Customer has arrived his destination
                if(isset($_POST['complete'])) {

                    $dbFac->setMatchedOrderToCompleted($valueTwo["MatchedID"]); // Set the MatchedOrderStatus again to "1"
                    $dbFac->setTaxiAvailable($valueTwo["TaxiID"]); // Set Available in the Taxi Table again to "1"
                    $dbFac->setCustomerReputationPositiv($dbFac->getCustomerIDfromOrder($valueTwo["OrderID"])); // Set the Customer Reputation +1
                    $dbFac->redirect("BookingsPage.php"); // Go to BookingPage.php
                }
                //Button action to confrim an MatchedOrder, which means, that the Employee has seen, that the Order got canceled
                if(isset($_POST['confirm'])) {
                    $dbFac->setMatchedOrderToCompleted($valueTwo["MatchedID"]); // Set the MatchedOrderStatus again to "1"
                    $dbFac->setTaxiAvailable($valueTwo["TaxiID"]); // Set Available in the Taxi Table again to "1"
                    $dbFac->setCustomerReputationNegative($dbFac->getCustomerIDfromOrder($valueTwo["OrderID"])); // Set the Customer Reputation -1
                    $dbFac->redirect("BookingsPage.php"); // Go to BookingPage.php
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