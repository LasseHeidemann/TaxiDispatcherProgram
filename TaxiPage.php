<?php



$title = "Taxis";

$content = '<h1>Taxis</h1>

<a href="CreateNewTaxi.php"> Add a new Taxi</a><br/> ';

include  'Template.php';
include "DBConnect.php";

function CreateOverviewTable()
{
    $result = "
     <table class = 'overviewTable'
     <tr>
            <td></td>
            <td></td>
            <td><b>TaxiID</b></td>
            <td><b>CarName</b></td>
            <td><b>CarBrand</b></td>
            <td><b>CarSeats</b></td>
            <td><b>LicensePlate</b></td>
      </tr>";

    $databaseFacade = new DBFacade();
    $databaseFacade->displayTaxi();
    $taxiArray = array();

    while ($row = mysql_fetch_array($result)){

    }

    foreach ($taxiArray as $key => $value){
        $result = $result .
            "<tr>
                        <td><a href '' >Update</a></td>
                        <td><a href '' >Delete</a></td>
                        <td>$value->TaxiID</td>
                        <td>$value->CarName</td>
                        <td>$value->CarBrand</td>
                        <td>$value->CarSeats</td>
                        <td>$value->LicensePlate</td>
                        </tr>";

    }
    $result = $result . "</table>";
    return $result;

}