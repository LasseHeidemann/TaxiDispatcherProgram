
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
                        echo            '<td><form action="" method="post"><button name = complete value = "'.$valueTwo["MatchedID"].'"> Completed</button> </form></td>';

                        if(isset($_POST['complete'])) {
                            $dbFac->setMatchedOrderToCompleted($valueTwo["MatchedID"]);
                            $dbFac->setTaxiAvailable($valueTwo["TaxiID"]);
                            $dbFac->refresh(0);
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