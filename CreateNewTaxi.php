<?php


$title = "Add a new Taxi";


$content = "<form action = 'TaxiPage.php' method = 'POST'>

    <fieldset>
        <legend>Add a new Taxi</legend>

        <label for = 'carName'>Name of the Car:</label>
        <input type = 'text' class='inputField' name = 'txtCarName' /><br/>

        <label for = 'carBrand'>Brand of the Car:</label>
        <input type = 'text' class='inputField' name = 'txtCarBrand' /><br/>

        <label for = 'carSeats'>Number of Seats:</label>
        <input type = 'text' class='inputField' name = 'txtCarSeats' /><br/>

        <label for = 'licensePlate'>Licenseplate:</label>
        <input type = 'text' class='inputField' name = 'txtLicensePlate' /><br/>

        <input type ='submit' value='Submit'>

    </fieldset>

</form>";



if ($_SERVER['REQUEST_METHOD'] == 'post')
{
    $carName = htmlspecialchars($_POST["txtCarName"]);
    $carBrand = htmlspecialchars($_POST["txtCarBrand"]);
    $carSeats = htmlspecialchars($_POST["txtCarSeats"]);
    $licensePlate = htmlspecialchars($_POST["txtLicensePlate"]);

    $taxi = new Taxi($carName, $carBrand, $carSeats, $licensePlate);
    $databaseFacade = new DBFacade();
    echo $databaseFacade->createTaxi($taxi);

}


include  'Template.php';
include "DBFacade.php";


?>


