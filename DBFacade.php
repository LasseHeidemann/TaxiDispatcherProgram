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
    public function register($user_username, $user_password, $user_email, $user_name){
        try{
            if(filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
                $new_password = password_hash($user_password, PASSWORD_BCRYPT);
                $stmt = $this->db->prepare("INSERT INTO user(username, password, email, name, user_level) 
                                            VALUES(:uusername, :upass, :uemail, :uname, 0)");
                $stmt->bindParam(":uusername", $user_username);
                $stmt->bindParam(":upass", $new_password);
                $stmt->bindParam(":uemail", $user_email);
                $stmt->bindParam(":uname", $user_name);

                $stmt->execute();
                return true;
            }else{
                echo "Your email is not correct";
                return false;
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    /**
     * @param $uname username from the user
     * @param $uemail email from the user
     * @param $upass password from the user
     * @return bool either true/false if user could login or not
     */
    public function login($uname, $uemail, $upass){
        try{
            $stmt = $this->db->prepare("SELECT user_ID, password 
                                        FROM user 
                                        WHERE username=:uname
                                        OR email=:uemail
                                        LIMIT 1");
            $stmt->execute(array(':uname'=>$uname, ':uemail'=>$uemail));
            $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
            if($stmt->rowCount() > 0){
                if(password_verify($upass, $userRow['password'])){
                    $_SESSION['user_session'] = $userRow['user_ID'];
                    return true;
                }else{
                    return false;
                }
            }else{
                echo 'Error no user found';
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function deleteUser($uemail){
        try{
            $stmt = $this->db->prepare("DELETE FROM user 
                                        WHERE email=:uemail
                                        LIMIT 1");
            $stmt->execute(array(':uemail'=>$uemail));
            $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
            if($stmt->rowCount() > 0){
                echo 'User deleted';
            }else{
                echo 'Error no user found';
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }


    /**
     * @param $name the name of the user
     * @param $email the email of the user
     */
    public function editUser($name, $email, $userid){
        try{
            $stmt = $this->db->prepare("UPDATE user 
                                        SET name=:uname, email=:uemail 
                                        WHERE user_ID =:userid");
            $stmt->bindParam(':uname', htmlspecialchars($name), PDO::PARAM_STR);
            $stmt->bindParam(':uemail', htmlspecialchars($email), PDO::PARAM_STR);
            $stmt->bindParam(':userid', $userid, PDO::PARAM_INT);
            $result = $stmt->execute();

            if($result){
                echo 'User was updated';
            }else{
                echo 'There was an error while updating the user';
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    /**
     * @param $userid the users userid
     * @return User User object with the users information
     */
    public function displayUser($userid){
        try{
            $stmt = $this->db->prepare("SELECT name, email 
                                        FROM user 
                                        WHERE user_ID =:userid 
                                        LIMIT 1");
            $stmt->bindParam(":userid", $userid, PDO::PARAM_INT);
            $stmt->execute();
            $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
            if($stmt->rowCount() > 0){
                //Creating a new user with the name and email from the database
                $user = new User($userRow['name'], $userRow['email']);
                return $user;
            }else{
                echo 'No user was found';

            }

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

}