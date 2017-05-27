<?php
/**
 * Created by PhpStorm.
 * User: Lasse
 * Date: 25.05.2017
 * Time: 21:20
 */

class DBFacade
{
    private $db;

    function __construct($DB_connect)
    {
        $this->db = $DB_connect;
    }

    /**
     * @param $user_username the users username
     * @param $user_password the users password
     * @param $user_email the users email
     * @param $user_name the users name
     */
    public function createTaxi($carName, $carBrand, $carSeats, $licensePlate)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO Taxi(CarName, CarBrand, CarSeats, LicensePlate) 
                                            VALUES(CarName=:carName, Carbrand=:carBrand, CarSeats=:carSeats, LicensePlate=:licensePlate)");

            $stmt->bindParam(':carName', $carName);
            $stmt->bindParam(':carBrand', $carBrand);
            $stmt->bindParam(':carSeats', $carSeats);
            $stmt->bindParam(':licensePlate', $licensePlate);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }


    public function deleteTaxi($taxiID){
        try{
            $stmt = $this->db->prepare("DELETE FROM taxi 
                                        WHERE TaxiID=:taxiID
                                        LIMIT 1");
            $stmt->execute(array(':taxiID'=>$taxiID));
            $taxiRow = $stmt->fetch(PDO::FETCH_ASSOC);
            if($stmt->rowCount() > 0){
                echo 'Taxi deleted';
            }else{
                echo 'Error no Taxi found';
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }


    /**
     * @param $name the name of the user
     * @param $email the email of the user
     */
    public function editTaxi($carName, $carBrand, $carSeats, $licensePlate, $taxiID){
        try{
            $stmt = $this->db->prepare("UPDATE taxi 
                                        SET CarName=:carName, Carbrand=:carBrand, CarSeats=:carSeats, LicensePlate=:licensePlate
                                        WHERE TaxiID =:taxiID");
            $stmt->bindParam(':carName', htmlspecialchars($carName), PDO::PARAM_STR);
            $stmt->bindParam(':carBrand', htmlspecialchars($carBrand), PDO::PARAM_STR);
            $stmt->bindParam(':carSeats', $carSeats, PDO::PARAM_INT);
            $stmt->bindParam(':licensePlate', htmlspecialchars($licensePlate), PDO::PARAM_STR);
            $stmt->bindParam(':taxiID', $taxiID, PDO::PARAM_INT);
            $result = $stmt->execute();

            if($result){
                echo 'Taxi was updated';
            }else{
                echo 'There was an error while updating the Taxi';
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }



}