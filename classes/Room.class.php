<?php

class Room{

    private $roomNumber;
    private $roomType;
    private $status;
    private $block;
    private $resident1;
    private $resident2;

    public function __construct($roomNumber, $roomType, $status, $block, $resident1, $resident2){

        $this->roomNumber = $roomNumber;
        $this->roomType = $roomType;
        $this->status = $status;
        $this->block = $block;
        $this->resident1 = $resident1;
        $this->resident2 = $resident2;
    }
    
    public function getRoomNumber(){
        return $this->roomNumber;
    }

    public function getRoomType(){
        return $this->roomType;
    }

    public function getStatus(){
        return $this->status;
    }

    public function getBlock(){
        return $this->block;
    }

    public function getResident1(){
        return $this->resident1;
    }

    public function getResident2(){
        return $this->resident2;
    }

    //Set Room Status
    public function setStatus($newStatus){
        $this->status = $newStatus;
    }

    //Set resident1
    //what if resident already there
    public function setResident1($newResident){
        $this->resident1 = $newResident;
    }

    //Set resident2
    //what if resident already there
    public function setResident2($newResident){
        $this->resident2 = $newResident;
    }

    public function __toString()
    {
        echo "Room Number: ".$this->getRoomNumber();
        echo "Room Type: ".$this->getRoomType();
        echo "Block: ".$this->getBlock();
        echo "Resident #1: ".$this->getResident1();
        echo "Resident #2: ".$this->getResident2();
        echo "Status: ".$this->getStatus();
    }

}

?>