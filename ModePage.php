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
                <th><b>Mode</b></th>
                <th><b>Status</b></th>


                </thead>
                <tbody>

                <?php

                $mode = $dbFac->displayMode();
                foreach ($mode as $mode => $value){
                    foreach ($value as $subvalue => $valueTwo){

                        echo '<tr>';
                        echo            '<td>'.$valueTwo["ModeName"].'</td>';

                        if ($valueTwo["ModeStatus"] == 0) {
                            echo '<td style = "background-color: #FFFFFF"></td>';
                        }

                        if ($valueTwo["ModeStatus"] == 1) {
                            echo '<td style = "background-color: #008000"></td>';
                        }

                        echo'<td><form action="" method="post"> <button name = change value = "'.$valueTwo["ModeID"].'"> Change Status</button> </form></td>';

                        if(isset($_POST['change'])) {

                            if ($valueTwo["ModeStatus"] == 0) {
                                $dbFac->changeStatusToActive($valueTwo["ModeID"]);
                                $dbFac->redirect("ModePage.php");
                            }

                            if ($valueTwo["ModeStatus"] == 1) {
                                $dbFac->changeStatusToInactive($valueTwo["ModeID"]);
                                $dbFac->redirect("ModePage.php");
                            }
                        }
                    }
                };

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