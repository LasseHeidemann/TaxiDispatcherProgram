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
        //Here is the content, which shows all the Modes on the Page
        <div id = "content_area">

            <br>
            //Create the table for the modes
            <table class = 'overviewTable'
            <table border=1 cellspacing=1 cellpadding=2 align="center">
                <thead></thead>
                <th><b>Mode</b></th>
                <th><b>Status</b></th>

                </thead>
                <tbody>

                <?php
                //Getting all the modes form the function
                $mode = $dbFac->displayMode();

                //Looping htrow all the modes
                foreach ($mode as $mode => $value){
                    foreach ($value as $subvalue => $valueTwo){
                        //Adding values to the table
                        echo '<tr>';
                        echo            '<td>'.$valueTwo["ModeName"].'</td>';
                        //White background when the mode is off
                        if ($valueTwo["ModeStatus"] == 0) {
                            echo '<td style = "background-color: #FFFFFF"></td>';
                        }
                        //Green background when the mode is on
                        if ($valueTwo["ModeStatus"] == 1) {
                            echo '<td style = "background-color: #008000"></td>';
                        }
                        //Create the button
                        echo'<td><form action="" method="post"> <button name = change value = "'.$valueTwo["ModeID"].'"> Change Status</button> </form></td>';

                    }
                };

                if(isset($_POST['change'])) {

                    if ($valueTwo["ModeStatus"] == 0) {
                        $dbFac->changeStatusToActive($valueTwo["ModeID"]); // Set the Status from the Mode to "1"
                        $dbFac->redirect("ModePage.php"); // Redirects to the ModePage.php
                    }

                    if ($valueTwo["ModeStatus"] == 1) {
                        $dbFac->changeStatusToInactive($valueTwo["ModeID"]); // Set the Status from the Mode to "0"
                        $dbFac->redirect("ModePage.php");//Redirects to the ModePage.php
                    }
                }

                ?>
                </tbody>
            </table>
            <br>
        </div>
    </pos>
</div>
//Adding the footer
<footer>
    <p> Welcome to our Unter Taxi Company </p>
</footer>

</body>

</html>