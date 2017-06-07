<?php
include "DBConnect.php";

$_GET['id'] = $selectedTaxiID;
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

    <div id = "conecnt_area">

        <?php

        $selectedTaxis = $dbFac->displaySelectedTaxi($selectedTaxiID);
        foreach ($selectedTaxis as $selectedTaxi => $value) {
        foreach ($value as $subvalue => $valueTwo) {

        ?>
        <form method='post'>

                <fieldset>
                <legend>Update Taxi</legend>

                <label for = 'carName'>Name of the Car:</label>
                <input type = 'text'  name ='CarName' value= <?php '. $valueTwo["CarName"] .' ?>/><br/>

                <label for = 'carBrand'>Brand of the Car:</label>
                <input type = 'text' name ='CarBrand' value = <?php '. $valueTwo["CarBrand"] .' ?> /><br/>

                <label for = 'carSeats'>Number of Seats:</label>
                <input type = 'text' name ='CarSeats' value = <?php '. $valueTwo["CarSeats"] .' ?> /><br/>

                <label for = 'licensePlate'>Licenseplate:</label>
                <input type = 'text' name ='LicensePlate' value = <?php '. $valueTwo["LicensePlate"] .' ?> /><br/>

                <input type ='submit' name = 'sent' value='Submit'>
            </fieldset>
                </form>

                <?php

                if (isset($_POST['sent'])) {
                if($dbFac->editTaxi($_POST['CarName'] , $_POST['CarBrand'], $_POST['CarSeats'], $_POST['LicensePlate'], $selectedTaxiID )){
                $dbFac->redirect("TaxiPage.php");
                }else{
                echo "ERROR";
                }
                };
            }
        }
                ?>


    </div>
    </pos>

</div>

<footer>
    <p> Welcome to our Unter Taxi Company </p>
</footer>

</body>

</html>