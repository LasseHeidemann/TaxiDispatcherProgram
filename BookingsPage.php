
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
        <div id = "conecnt_area">

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

                $matchedOrders = $dbFac->displayMatchedOrders();
                foreach ($matchedOrders as $matchedOrders => $value){
                    foreach ($value as $subvalue => $valueTwo){

                        if($valueTwo["MatchedOrderStatus"] == 0){

                        echo '<tr>';
                        echo            '<td>'.$valueTwo["MatchedID"].'</td>';
                        echo            '<td>'.$valueTwo["OrderID"].'</td>';
                        echo            '<td>'.$valueTwo["TaxiID"].'</td>';

                            if ($valueTwo["IsCanceled"] == 0) {
                                echo '<td style = "background-color: #FFFFFF"></td>';

                                echo'<td><form action="" method="post"><button name = complete value = "'.$valueTwo["MatchedID"].'"> Completed</button> </form></td>';
                            }

                            if ($valueTwo["IsCanceled"] == 1) {
                                echo '<td style = "background-color: #FF0000"></td>';

                                echo'<td><form action="" method="post"><button name = confirm value = "'.$valueTwo["MatchedID"].'"> Confirm</button> </form></td>';
                            }

                        echo '</tr>';
                        }
                    }
                }

                if(isset($_POST['complete'])) {
                    $dbFac->setMatchedOrderToCompleted($valueTwo["MatchedID"]);
                    $dbFac->setTaxiAvailable($valueTwo["TaxiID"]);
                    $dbFac->setCustomerReputationPositiv($dbFac->getCustomerIDfromOrder($valueTwo["OrderID"]));
                    $dbFac->refresh(0);
                }

                if(isset($_POST['confirm'])) {
                    $dbFac->setMatchedOrderToCompleted($valueTwo["MatchedID"]);
                    $dbFac->setTaxiAvailable($valueTwo["TaxiID"]);
                    $dbFac->setCustomerReputationNegative($dbFac->getCustomerIDfromOrder($valueTwo["OrderID"]));
                    $dbFac->refresh(0);
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