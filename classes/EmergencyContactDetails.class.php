<?php

class EmergencyContactDetails {

    private $name;
    private $relationship;
    private $phone;
    private $address;
    private $email;

    public function __construct($name, $relationship, $phone, $address, $email){
        $this->name = $name;
        $this->relationship = $relationship;
        $this->phone = $phone;
        $this->address = $address;
        $this->email = $email;
    }

    //GETTERS
    public function getName(){
        return $this->name;
    }

    public function getRelationship(){
        return $this->relationship;
    }

    public function getPhone(){
        return $this->phone;
    }

    public function getAddress(){
        return $this->address;
    }

    public function getEmail(){
        return $this->email;
    }
}

?>