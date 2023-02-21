<?php

class Application {

    private $applicationID;
    private $status;
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
    private $studentID;
    private $contact;
    private $levelOfStudy;
    private $yearOfStudy;
    private $programme;
    private $faculty;
    private $school;
    private $roomType;
    private $roommatePreference;
    

    public function __construct(
        $applicationID, $status, $firstName, $lastName, $middleInitial, 
        $DOB, $nationality, $gender, $maritalStatus, $familyType, 
        $homeAddress, $mailingAddress, $emailAddress, $studentID, $contactName, 
        $contactRelationship, $contactPhone, $contactAddress, $contactEmail, $levelOfStudy,
        $yearOfStudy, $programme, $faculty, $school, $roomType, $roommatePreference
    ){
        $this->applicationID = $applicationID;
        $this->status = $status;
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
        $this->studentID = $studentID;
        $this->contact = [
            "name" => $contactName,
            "relationship" => $contactRelationship,
            "phone" => $contactPhone,
            "address" => $contactAddress,
            "email" => $contactEmail
        ];
        $this->levelOfStudy = $levelOfStudy;
        $this->yearOfStudy = $yearOfStudy;
        $this->programme = $programme;
        $this->faculty = $faculty;
        $this->school = $school;
        $this->roomType = $roomType;
        $this->roommatePreference = $roommatePreference;

    }

    //GETTERS
    public function getApplicationID(){
        return $this->applicationID;
    }
    public function getStatus(){
        return $this->status;
    }
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
    public function getEmailAddres(){
        return $this->emailAddress;
    }
    public function getStudentID(){
        return $this->studentID;
    }
    public function getContact(){
        return $this->contact;
    }
    public function getLevelOfStudy(){
        return $this->levelOfStudy;
    }
    public function getYearOfStudy(){
        return $this->yearOfStudy;
    }
    public function getProgramme(){
        return $this->programme;
    }
    public function getFaculty(){
        return $this->faculty;
    }
    public function getSchool(){
        return $this->school;
    }
    public function getRoomType(){
        return $this->roomType;
    }
    public function getRoommatePreference(){
        return $this->roommatePreference;
    }

    //SETTERS
    public function setStatus($newStatus){
        $this->status = $newStatus;
    }
}