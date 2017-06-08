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
        <div id = "content_area">

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
                //Getting all the Customers from the function
                $customer = $dbFac->displayCustomer();

                //Looping throw all the Customers
                foreach ($customer as $customer => $value){
                    foreach ($value as $subvalue => $valueTwo){

                        //Adding values to the table
                        echo '<tr>';
                        echo            '<td>'.$valueTwo["CustomerID"].'</td>';
                        echo            '<td>'.$valueTwo["FirstName"].'</td>';
                        echo            '<td>'.$valueTwo["LastName"].'</td>';
                        echo            '<td>'.$valueTwo["Email"].'</td>';
                        echo            '<td>'.$valueTwo["MobileNumber"].'</td>';

                        //Setting the color from the field to green, if the customer has a positiv Reputation
                        if ($valueTwo["Reputation"] >= 0 ) {
                            echo '<td style = "background-color: #008000"> '.$valueTwo["Reputation"].'</td>';
                        }

                        //Setting the color from the field to red, if the customer has a negativ Reputation
                        if ($valueTwo["Reputation"] < 0 ) {
                            echo '<td style = "background-color: #FF0000">'.$valueTwo["Reputation"].'</td>';
                        }
                        // Creating both buttons for + Rep and - Rep
                        echo'<td><form action="" method="post"> <button name = setRepPositiv value = "'.$valueTwo["CustomerID"].'"> + Reputation</button> </form></td>';
                        echo'<td><form action="" method="post"> <button name = setRepNegativ value = "'.$valueTwo["CustomerID"].'"> - Reputation</button> </form></td>';

                    }
                };
                // Button click
                if(isset($_POST['setRepPositiv'])) {
                    $dbFac->setCustomerReputationPositiv($_POST['setRepPositiv']); // Set the Customer Reputation +1
                    $dbFac->redirect("CustomerPage.php"); // Goes back to the CustomerPage.php
                }

                if(isset($_POST['setRepNegativ'])) {
                    $dbFac->setCustomerReputationNegative($_POST['setRepNegativ']);// Set the Customer Reputation -1
                    $dbFac->redirect("CustomerPage.php");// Goes back to the CustomerPage.php
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