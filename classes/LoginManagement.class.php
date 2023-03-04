<?php

class LoginManagement {

    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    //STARTS A PHP SESSION
    public function startSession(){
        session_start();
    }

    //CHECKS THE USERNAME AND PASSWORD
    public function login($username, $password){
        $stmt = $this->db->connect()->prepare("SELECT ID, Username, `First Name`, `Last Name`, `Position`, Password FROM Users INNER JOIN Residents ON Users.ID = Residents.`Resident ID` WHERE Users.Username = :username");
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //If Username was found
        if(count($result) == 1){
            //Checks Hash password in database

            if (password_verify($password, $result[0]['Password'])) {
                $_SESSION['username'] = $result[0]['Username'];
                $_SESSION['id'] = $result[0]['ID'];
                $_SESSION['firstName'] =  $result[0]['First Name'];
                $_SESSION['lastName'] =  $result[0]['Last Name'];
                $_SESSION['position'] = $result[0]['Position'];
                
                return true;
            }
            //If password is incorrect
            else{
                return false;
            }

        }
        //If username not found
        else{
            return false;
        }
    }

    public function checkIfLoggedIn(){
        if(isset($_SESSION['id'])){
            return true;
        }
        else{
            return false;
        }
    }

    public function logout(){
        session_destroy();
        header("Location: ./index.php");
        exit();
    }

}

?>