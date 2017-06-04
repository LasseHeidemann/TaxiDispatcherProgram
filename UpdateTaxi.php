<?php
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

    <div id = "conecnt_area">

        <form method='post'>

            <fieldset>
                <legend>Update Taxi</legend>

                <label for = 'carName'>Name of the Car:</label>
                <input type = 'text'  name ='CarName' /><br/>

                <label for = 'carBrand'>Brand of the Car:</label>
                <input type = 'text' name ='CarBrand' /><br/>

                <label for = 'carSeats'>Number of Seats:</label>
                <input type = 'text' name ='CarSeats' /><br/>

                <label for = 'licensePlate'>Licenseplate:</label>
                <input type = 'text' name ='LicensePlate' /><br/>

                <input type ='submit' name = 'sent' value='Submit'>
            </fieldset>
        </form>

        <?php
        if (isset($_POST['sent'])) {
            if($dbFac->createTaxi($_POST['CarName'] , $_POST['CarBrand'], $_POST['CarSeats'], $_POST['LicensePlate'])){
            }else{
                echo "ERROR";
            }
        };

        ?>
    </div>

</div>

<footer>
    <p> Welcome to our Taxi Company </p>
</footer>

</body>

</html>