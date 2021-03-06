<?php
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

        <?php
        $selectedTaxi = $dbFac->displaySelectedTaxi($_GET['id']);
        
        ?>
        <form method='post'>

                <fieldset>
                <legend>Update Taxi</legend>

                <label for = 'carName'>Name of the Car:</label>
                <input type = 'text'  name ='CarName' value="<?php echo $selectedTaxi["CarName"]  ?>"/><br/>

                <label for = 'carBrand'>Brand of the Car:</label>
                <input type = 'text' name ='CarBrand' value ="<?php echo $selectedTaxi["CarBrand"]  ?>" /><br/>

                <label for = 'carSeats'>Number of Seats:</label>
                <input type = 'text' name ='CarSeats' value ="<?php echo $selectedTaxi["CarSeats"] ?>" /><br/>

                <label for = 'licensePlate'>Licenseplate:</label>
                <input type = 'text' name ='LicensePlate' value ="<?php echo $selectedTaxi["LicensePlate"]  ?>" /><br/>

                <input type ='submit' name = 'sent' value='Submit'>
            </fieldset>
                </form>

                <?php

                if (isset($_POST['sent'])) {
                if($dbFac->editTaxi($_POST['CarName'] , $_POST['CarBrand'], $_POST['CarSeats'], $_POST['LicensePlate'], $_GET['id'] )){
                $dbFac->redirect("TaxiPage.php");
                }else{
                echo "ERROR";
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

</html>                                                                                                                                 