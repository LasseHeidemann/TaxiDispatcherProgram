<?php
include "DBConnect.php";
?>

<html>
<head>
    //Importing the created Stylesheet.css
    <link rel= "stylesheet" type= "text/css" href="Styles/Stylesheet.css"

</head>

<body>
//Creating the Banner
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

    <div id = "content_area">

        <form method='post'>
            //Creating a fieldset with the headline "Add a new Taxi"
            <fieldset>
                <legend>Add a new Taxi</legend>

                //Creating Labels, Textfields and the Submit Button
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
        //Creating Button for inserting a new Taxi. Takes the inputted CarName, CarBrand, CarSeats and LicensePlate as input
        if (isset($_POST['sent'])) {
            if($dbFac->createTaxi($_POST['CarName'] , $_POST['CarBrand'], $_POST['CarSeats'], $_POST['LicensePlate'])){
                $dbFac->redirect("TaxiPage.php");
            }else{
                echo "ERROR";
            }
        };

        ?>
    </div>
</div>
//Creating the footer
<footer>
    <p> Welcome to our Unter Taxi Company </p>
</footer>

</body>

</html>                                                                                                                                                                                                        