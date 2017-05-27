<?php

$title = "Taxis";

$content = '<h1>Taxis</h1>

<a href="CreateNewTaxi.php"> Add a new Taxi</a><br/> ';

include  'Template.php';
require  'DBConnect.php';

Class TaxiPage extends Page
{
    public function displayTaxi()
    {
        try {
            $stmt = $this->db->prepare("SELECT * 
                                        FROM taxi");
            $stmt->execute();

            $taxiRow = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() > 0) {
                //Creating a new user with the name and email from the database
                $taxi = new Taxi($taxiRow['taxiID'], $taxiRow['carName'], $taxiRow['carBrand'], $taxiRow['carSeats'], $taxiRow['licensePlate']);
                return $taxi;
            } else {
                echo 'No Taxi was found';

            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

foreach ($taxi as $taxi){
    $taxiID = $taxi['taxiID'];
    $carName = $taxi['carName'];
    $carBrand = $taxi['carBrand'];
    $carSeats = $taxi['carSeats'];
    $licensePlate = $taxi['licensePlate'];

$Taxipage = new TaxiPage();

    $Taxipage->content .="
    ";
}