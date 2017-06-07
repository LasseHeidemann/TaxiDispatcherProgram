<?php
/**
 * Created by PhpStorm.
 * User: Lasse
 * Date: 01.06.2017
 * Time: 12:04
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
                <th><b>Firstname</b></th>
                <th><b>Lastname</b></th>
                <th><b>Email</b></th>
                <th><b>Mobile Number</b></th>
                <th><b>Reputation</b></th>
                </thead>
                <tbody>

                <?php

                $customer = $dbFac->displayCustomer();
                foreach ($customer as $customer => $value){
                    foreach ($value as $subvalue => $valueTwo){

                        echo '<tr>';
                        echo            '<td>'.$valueTwo["CustomerID"].'</td>';
                        echo            '<td>'.$valueTwo["FirstName"].'</td>';
                        echo            '<td>'.$valueTwo["LastName"].'</td>';
                        echo            '<td>'.$valueTwo["Email"].'</td>';
                        echo            '<td>'.$valueTwo["MobileNumber"].'</td>';

                        if ($valueTwo["Reputation"] >= 0 ) {
                            echo '<td style = "background-color: #008000"> '.$valueTwo["Reputation"].'</td>';
                        }

                        if ($valueTwo["Reputation"] < 0 ) {
                            echo '<td style = "background-color: #FF0000">'.$valueTwo["Reputation"].'</td>';
                        }

                        echo'<td><form action="" method="post"> <button name = setRepPositiv value = "'.$valueTwo["CustomerID"].'"> + Reputation</button> </form></td>';
                        echo'<td><form action="" method="post"> <button name = setRepNegativ value = "'.$valueTwo["CustomerID"].'"> - Reputation</button> </form></td>';

                    }
                };

                if(isset($_POST['setRepPositiv'])) {
                    $dbFac->setCustomerReputationPositiv($_POST['setRepPositiv']);
                    $dbFac->refresh(0);
                }

                if(isset($_POST['setRepNegativ'])) {
                    $dbFac->setCustomerReputationNegative($_POST['setRepNegativ']);
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