<?php

class Application {

    private $status;
    
    public function __construct($status){
        $this->status = $status;
    }

    //GETTERS
    public function getStatus(){
        return $this->status;
    }

    //SETTERS
    public function setStatus($newStatus){
        $this->status = $newStatus;
    }

    public function __toString()
    {
        echo "Status: " . $this->getStatus();
    }
}