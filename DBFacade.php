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
     * Create a new Taxi
     * @param carName - Name of the car
     * @param carBrand - Brand of the car
     * @param carSeats - Number of seats
     * @param licensePlate - licensePlate of the car
     */
    public function createTaxi($carName, $carBrand, $carSeats, $licensePlate)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO Taxi(CarName, CarBrand, CarSeats, LicensePlate) 
                                            VALUES(:carName,:carBrand,:carSeats,:licensePlate)");

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

    /**
     * Delete Taxi with the given ID
     * @param $taxiID - The ID of the Taxi
     */

    public function deleteTaxi($taxiID){
        try{
            $stmt = $this->db->prepare("DELETE FROM Taxi 
                                        WHERE TaxiID=:taxiID");
            if($stmt->execute(array(':taxiID'=>$taxiID))){
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    /**
     * Update Taxi
     * @param carName - Name of the car
     * @param carBrand - Brand of the car
     * @param carSeats - Number of seats
     * @param licensePlate - licensePlate of the car
     */

    public function editTaxi($carName, $carBrand, $carSeats, $licensePlate, $taxiID){
        try{
            $stmt = $this->db->prepare("UPDATE Taxi 
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
                return true;
            }else{
                echo 'There was an error while updating the Taxi';
                return false;
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    /**
     * Displays the Taxi from the drop-down list
     * @param $taxiID - The ID of the Taxi
     */

    public function displaySelectedTaxi($taxiID)
    {
        try {
            $stmt = $this->db->prepare("SELECT * 
                                        FROM Taxi
                                        WHERE TaxiID=:taxiID");
            $stmt->bindParam(':taxiID', $taxiID);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Displays all Taxis
     */

    public function displayTaxi()
    {
        $taxiList = array();

        try {
            $stmt = $this->db->prepare("SELECT * 
                                        FROM Taxi");
            $stmt->execute();

            $row[] = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() > 0) {
                foreach ($row as $taxi) {
                    array_push($taxiList, $taxi);

                }
                return $taxiList;

            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Displays all the available Taxis with "1" at Available
     */

    public function displayAvailableTaxi()
    {
        $taxiList = array();

        try {
            $stmt = $this->db->prepare("SELECT * 
                                        FROM Taxi
                                        WHERE Available = 1");
            $stmt->execute();

            $row[] = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() > 0) {
                foreach ($row as $taxi) {
                    array_push($taxiList, $taxi);

                }
                return $taxiList;

            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Sets Available at the Taxi to "1"
     * @param $taxiID - The Taxi ID
     */

    public function setTaxiAvailable($taxiID){
        try{
            $stmt = $this->db->prepare("UPDATE Taxi
                                        Set Available = 1
                                        WHERE TaxiID=:taxiID");
            if($stmt->execute(array(':taxiID'=>$taxiID))){
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    /**
     * Sets Available at the Taxi to "0"
     * @param $taxiID - The Taxi ID
     */

    public function setTaxiBusy($taxiID){
        try{
            $stmt = $this->db->prepare("UPDATE Taxi
                                        Set Available = 0
                                        WHERE TaxiID=:taxiID");
            if($stmt->execute(array(':taxiID'=>$taxiID))){
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    /**
     * Displays all the different modes
     */

    public function displayMode()
    {
        $modeList = array();

        try {
            $stmt = $this->db->prepare("SELECT * 
                                        FROM Modes");
            $stmt->execute();

            $row[] = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() > 0) {
                foreach ($row as $mode) {
                    array_push($modeList, $mode);

                }
                return $modeList;

            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Change the Status of the Mode to "1"
     * @param $modeID - The ID of the Mode
     */

    public function changeStatusToActive($modeID){
        try{
            $stmt = $this->db->prepare("UPDATE Modes
                                        Set Modestatus = 1
                                        WHERE ModeID=:modeID");
            if($stmt->execute(array(':modeID'=>$modeID))){
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    /**
     * Change the Status of the Mode to "0"
     * @param $modeID - The ID of the Mode
     */

    public function changeStatusToInactive($modeID){
        try{
            $stmt = $this->db->prepare("UPDATE Modes
                                        Set Modestatus = 0
                                        WHERE ModeID=:modeID");
            if($stmt->execute(array(':modeID'=>$modeID))){
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    /**
     * Change the Status of the Mode to "1"
     * @param $matchedOrderID - ID from the matchedOrder
     */

    public function setMatchedOrderToCompleted($matchedOrderID){
    try{
        $stmt = $this->db->prepare("UPDATE MatchedOrder
                                        Set MatchedOrderStatus = 1
                                        WHERE MatchedID=:matchedOrderID");
        if($stmt->execute(array(':matchedOrderID'=>$matchedOrderID))){
            return true;
        }else{
            return false;
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

    /**
     * Change the OrderStatus from the OrderTable to "1"
     * @param $orderID - ID from the Order
     */

    public function setOrderToCompleted($orderID){
        try{
            $stmt = $this->db->prepare("UPDATE OrderTable
                                        Set OrderStatus = 1
                                        WHERE OrderID=:orderID");
            if($stmt->execute(array(':orderID'=>$orderID))){
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    /**
     * Give the Reputation of the Customer + 1
     * @param $customerID - The ID of the Customer
     */

    public function setCustomerReputationPositiv($customerID){
        try{
            $stmt = $this->db->prepare("UPDATE Customer
                                        Set Reputation = Reputation + 1
                                        WHERE CustomerID=:customerID");
            if($stmt->execute(array(':customerID'=>$customerID))){
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    /**
     * Give the Reputation of the Customer - 1
     * @param $customerID - The ID of the Customer
     */

    public function setCustomerReputationNegative($customerID){
        try{
            $stmt = $this->db->prepare("UPDATE Customer
                                        Set Reputation = Reputation - 1
                                        WHERE CustomerID=:customerID");
            if($stmt->execute(array(':customerID'=>$customerID))){
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    /**
     * Displays all the Orders
     */

    public function displayOrder()
    {
        $orderList = array();

        try {
            $stmt = $this->db->prepare("SELECT * 
                                        FROM OrderTable
                                        WHERE OrderStatus = 0");
            $stmt->execute();

            $row[] = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() > 0) {
                foreach ($row as $order) {
                    array_push($orderList, $order);

                }
                return $orderList;

            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Creating a new matchedOrder
     * @param $orderID - the ID of the Order
     * @param $taxiID - The ID of the Taxi
     */

    public function createMatchedOrder($orderID, $taxiID)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO MatchedOrder(OrderID, TaxiID) 
                                            VALUES(:orderID,:taxiID)");

            $stmt->bindParam(':orderID', $orderID);
            $stmt->bindParam(':taxiID', $taxiID);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    /**
     * Displays all matchedOrders
     */

    public function displayMatchedOrders()
    {
        $matchedOrderList = array();

        try {
            $stmt = $this->db->prepare("SELECT * 
                                        FROM MatchedOrder
                                        WHERE MatchedOrderStatus = 0");
            $stmt->execute();

            $row[] = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() > 0) {
                foreach ($row as $matchedOrder) {
                    array_push($matchedOrderList, $matchedOrder);

                }
                return $matchedOrderList;

            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Gets the Customer ID from the Order
     * @param $orderID - the ID of the Order
     */

    function getCustomerIDfromOrder($orderID)
    {
        $customerID = null;
        try
        {
            $stmt = $this->db->prepare("SELECT CustomerID
                                    FROM OrderTable
                                    WHERE OrderID=:orderID");
            $stmt->bindParam(':orderID', $orderID);
            $stmt->execute();
            $id = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() > 0)
            {
                $customerID = $id['CustomerID'];
                return $customerID;
            }
            else
            {
                return false;
            }
        }

        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    /**
     * Gets the Email of the customer
     * @param $customerID - The ID of the Customer
     */

    function getCustomerEmail($customerID)
    {
        $email = null;
        try
        {
            $stmt = $this->db->prepare("SELECT Email
                                    FROM Customer
                                    WHERE CustomerID=:customerID");
            $stmt->bindParam(':customerID', $customerID);
            $stmt->execute();
            $email = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() > 0)
            {
                $customerEmail = $email['Email'];
                return $customerEmail;
            }
            else
            {
                return false;
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    /**
     * Displays all the Customer
     */

    public function displayCustomer()
    {
        $customerList = array();

        try {
            $stmt = $this->db->prepare("SELECT * 
                                        FROM Customer");
            $stmt->execute();

            $row[] = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() > 0) {
                foreach ($row as $customer) {
                    array_push($customerList, $customer);

                }
                return $customerList;

            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /** Creates a new Customer
     * @param $firstName - Firstname of the Customer
     * @param $lastName - Lastname of the Customer
     * @param $email - Email of the Customer
     * @param $mobileNumber - Mobilnumber of the Customer
     * @param $password - Password of the Customer
     */

    public function createCustomer($firstName, $lastName, $email, $mobileNumber, $password)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO Customer(FirstName, LastName, Email, MobileNumber, Password) 
                                            VALUES(:firstName, :lastName, :email, :mobileNumber, :password)");

            $stmt->bindParam(':firstName', $firstName);
            $stmt->bindParam(':lastName', $lastName);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':mobileNumber', $mobileNumber);
            $stmt->bindParam(':password', $password);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    /**
     * Sends an email to the Customer
     * @param $receiver - the Customer ID
     */

    public function sendEmailWithMailer($receiver){
        require("class.phpmailer.php");
        $mail = new phpmailer();
        $mail->IsSMTP();
        $mail->Host     = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "Untertaxi@gmail.com";
        $mail->Password = "Nila1234";

        $mail->From     = "Untertaxi@gmail.com";
        $mail->FromName = "Unter Taxi Company";
        $mail->AddAddress($receiver);
        $mail->WordWrap = 50;
        $mail->IsHTML(true);
        $mail->Body     =  "Hello, your Taxi will arrive within the next 20 minutes. Thank you for your order. Your Unter Taxi Company.";

        //Sends the email
        if(!$mail->Send())
        {echo "Message could not be sent<p>";
            echo "Mailer Error: " . $mail->ErrorInfo;
            exit;
        }else {
            echo "ERROR";
        }
    }


    /**
     * Redirects the User to the linked page.
     */

    function redirect($url)
    {
        header('Location: ' . $url);
    }

}