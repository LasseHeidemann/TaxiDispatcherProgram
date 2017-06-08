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

    //Importing the created Stylesheet.css
    <link rel= "stylesheet" type= "text/css" href="Styles/Stylesheet.css"

</head>

<body>

//Adding the banner to the Page
<div id = "wrapper">
    <div id = "banner">
    </div>

    //Adding the navigation to the Page, with the hrefs to the other Pages
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
        //Here is the content, which shows all the MatchedOder on the Page
        <div id = "content_area">

        <br>
        //Creating the Taxi Table
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
        //Getting all the Taxis form the DB
        $taxis = $dbFac->displayTaxi();
        //Looping throw all the taxis
        foreach ($taxis as $taxi => $value) {
            foreach ($value as $subvalue => $valueTwo) {
                //Adding data to the table
                echo '<tr>';
                echo '<td>' . $valueTwo["TaxiID"] . '</td>';
                echo '<td>' . $valueTwo["CarName"] . '</td>';
                echo '<td>' . $valueTwo["CarBrand"] . '</td>';
                echo '<td>' . $valueTwo["CarSeats"] . '</td>';
                echo '<td>' . $valueTwo["LicensePlate"] . '</td>';


                //create button with href and also posts the ID of the taxi to the next page
                echo '<td><form action="UpdateTaxi.php?id=' . $valueTwo["TaxiID"] . '" method="post"><button name = update value = "' . $valueTwo["TaxiID"] . '"> Update</button></form></td>';
                //create button
                echo '<td><form action="" method="post"><button name = delete value = "' . $valueTwo["TaxiID"] . '"> Delete</button></form></td>';
                echo '</tr>';

                };
            }

            if (isset($_POST['delete'])) {
            if ($dbFac->deleteTaxi($_POST['delete']))//Delete Customer
                $dbFac->redirect("TaxiPage.php");//redirect to the TaxiPage.php
            } else {
        }

        ?>
            </tbody>
        </table>
        <br>
            //Adding a link to the CreateNewTaxiPage.php
        <a href="CreateNewTaxi.php"> Add a new Taxi</a><br/>
    </div>
    </pos>

    </div>
//Adding the footer
    <footer>
        <p> Welcome to our Unter Taxi Company </p>
    </footer>

</body>

</html>