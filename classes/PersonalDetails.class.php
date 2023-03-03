<?php

class PersonalDetails {
    private $firstName;
    private $lastName;
    private $middleInitial;
    private $DOB;
    private $nationality;
    private $gender;
    private $maritalStatus;
    private $familyType;
    private $homeAddress;
    private $mailingAddress;
    private $emailAddress;

    public function __construct(
        $firstName, $lastName, $middleInitial, 
        $DOB, $nationality, $gender, $maritalStatus, $familyType, 
        $homeAddress, $mailingAddress, $emailAddress
    )
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->middleInitial = $middleInitial;
        $this->DOB = $DOB;
        $this->nationality = $nationality;
        $this->gender = $gender;
        $this->maritalStatus = $maritalStatus;
        $this->familyType = $familyType;
        $this->homeAddress = $homeAddress;
        $this->mailingAddress = $mailingAddress;
        $this->emailAddress = $emailAddress;
    }

    //GETTERS
    public function getFirstName(){
        return $this->firstName;
    }
    public function getLastName(){
        return $this->lastName;
    }
    public function getMiddleInitial(){
        return $this->middleInitial;
    }
    public function getDOB(){
        return $this->DOB;
    }
    public function getNationality(){
        return $this->nationality;
    }
    public function getGender(){
        return $this->gender;
    }
    public function getMaritalStatus(){
        return $this->maritalStatus;
    }
    public function getFamilyType(){
        return $this->familyType;
    }
    public function getHomeAddress(){
        return $this->homeAddress;
    }
    public function getMailingAddress(){
        return $this->mailingAddress;
    }
    public function getEmailAddress(){
        return $this->emailAddress;
    }
}

?>