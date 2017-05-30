<?php

include "DBConnect.php";

$title = "Add a new Taxi";

$content = "<form method='post'>

<fieldset>
        <legend>Add a new Taxi</legend>

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
</form>";

if (isset($_POST['sent'])) {
    if($dbFac->createTaxi($_POST['CarName'] , $_POST['CarBrand'], $_POST['CarSeats'], $_POST['LicensePlate'])){
        $dbFac->redirect("BookingPage.php");
    }else{
        echo "ERROR";
    }
}

include  'Template.php';


?>                                                                                                                                                                                                                 