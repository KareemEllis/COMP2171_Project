<?php

class Authentification {

    public function authApplicationProcessing(){
        if($_SESSION['position'] == "Resident Advisor"){
            return true;
        }
        else{
            return false;
        }
    }

    public function authServiceProcessing(){
        if($_SESSION['position'] == "Resident Advisor"){
            return true;
        }
        else{
            return false;
        }
    }

    public function authRoomAssignment(){
        if($_SESSION['position'] == "Resident Advisor"){
            return true;
        }
        else{
            return false;
        }
    }

    public function authResidentProcessing(){
        if($_SESSION['position'] == "Resident Advisor"){
            return true;
        }
        else{
            return false;
        }
    }

    // public function authReportGeneration(){
        
    // }

    public function authNoticeBoardEdit(){
        if($_SESSION['position'] == "Resident Advisor" || $_SESSION['position'] == "Block Representative"){
            return true;
        }
        else{
            return false;
        }
    }
}

?>