<?php

class Resident {

    private $firstName;
    private $lastName;
    private $middleInitial;
    private $residentID;
    private $position;
    private $DOB;
    private $nationality;
    private $gender;
    private $maritalStatus;
    private $familyType;
    private $homeAddress;
    private $mailingAddress;
    private $emailAddress;
    private $phoneNumber;
    private $studentID;
    private $contact;
    private $levelOfStudy;
    private $yearOfStudy;
    private $programme;
    private $faculty;
    private $school;
    private $roomNumber;
    

    public function __construct(
        $firstName, $lastName, $middleInitial, $residentID, $position,
        $DOB, $nationality, $gender, $maritalStatus, $familyType, 
        $homeAddress, $mailingAddress, $emailAddress, $phoneNumber, $studentID, $contactName, 
        $contactRelationship, $contactPhone, $contactAddress, $contactEmail, $levelOfStudy,
        $yearOfStudy, $programme, $faculty, $school, $roomNumber
    ){
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->middleInitial = $middleInitial;
        $this->residentID = $residentID;
        $this->position = $position;
        $this->DOB = $DOB;
        $this->nationality = $nationality;
        $this->gender = $gender;
        $this->maritalStatus = $maritalStatus;
        $this->familyType = $familyType;
        $this->homeAddress = $homeAddress;
        $this->mailingAddress = $mailingAddress;
        $this->emailAddress = $emailAddress;
        $this->phoneNumber = $phoneNumber;
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
        $this->roomNumber = $roomNumber;

    }

    ///////////////////////////
    //////////GETTERS//////////
    //////////////////////////
    public function getFirstName(){
        return $this->firstName;
    }
    public function getLastName(){
        return $this->lastName;
    }
    public function getMiddleInitial(){
        return $this->middleInitial;
    }
    public function getResidentID(){
        return $this->residentID;
    }
    public function getPosition(){
        return $this->position;
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
    public function getPhoneNumber(){
        return $this->phoneNumber;
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
    public function getRoomNumber(){
        return $this->roomNumber;
    }

    ///////////////////////////
    //////////SETTERS//////////
    //////////////////////////
    public function setFirstName($newFirstName){
        $this->firstName = $newFirstName;
    }
    public function setLastName($newLastName){
        $this->lastName = $newLastName;
    }
    public function setMiddleInitial($newMiddleInitial){
        $this->middleInitial = $newMiddleInitial;
    }
    public function setResidentID($newResidentID){
        $this->residentID = $newResidentID;
    }
    public function setPosition($newPosition){
        $this->position = $newPosition;
    }
    public function setDOB($newDOB){
        $this->DOB = $newDOB;
    }
    public function setNationality($newNationality){
        $this->nationality = $newNationality;
    }
    public function setGender($newGender){
        $this->gender = $newGender;
    }
    public function setMaritalStatus($newMaritalStatus){
        $this->maritalStatus = $newMaritalStatus;
    }
    public function setFamilyType($newFamilyType){
        $this->familyType = $newFamilyType;
    }
    public function setHomeAddress($newHomeAddress){
        $this->homeAddress = $newHomeAddress;
    }
    public function setMailingAddress($newMailingAddress){
        $this->mailingAddress = $newMailingAddress;
    }
    public function setEmailAddres($newEmailAddress){
        $this->emailAddress = $newEmailAddress;
    }
    public function setPhoneNumber($newPhoneNumber){
        $this->phoneNumber = $newPhoneNumber;
    }
    public function setStudentID($newStudentID){
        $this->studentID = $newStudentID;
    }
    public function setContact($newName, $newRelationShip, $newPhone, $newAddress, $newEmail){
        $this->contact = [
            "name" => $newName,
            "relationship" => $newRelationShip,
            "phone" => $newPhone,
            "address" => $newAddress,
            "email" => $newEmail
        ];
    }
    public function setLevelOfStudy($newLevelOfStudy){
        $this->levelOfStudy = $newLevelOfStudy;
    }
    public function setYearOfStudy($newYearOfStudy){
        $this->yearOfStudy = $newYearOfStudy;
    }
    public function setProgramme($newProgramme){
        $this->programme = $newProgramme;
    }
    public function setFaculty($newFaculty){
        $this->faculty = $newFaculty;
    }
    public function setSchool($newSchool){
        $this->school = $newSchool;
    }
    public function setRoomNumber($newRoomNumber){
        $this->roomNumber = $newRoomNumber;
    }
}