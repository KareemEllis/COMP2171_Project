<?php

class Applicant {

    private $applicantID;
    private $personalDetails;
    private $emergencyContactDetails;
    private $educationDetails;
    private $application;
    private $roomType;
    private $roommatePreference;
    

    public function __construct(
        $applicantID, $status, $firstName, $lastName, $middleInitial, $phoneNum,
        $DOB, $nationality, $gender, $maritalStatus, $familyType, 
        $homeAddress, $mailingAddress, $emailAddress, $studentID, $contactName, 
        $contactRelationship, $contactPhone, $contactAddress, $contactEmail, $levelOfStudy,
        $yearOfStudy, $programme, $faculty, $school, $roomType, $roommatePreference
    ){
        //NEED TO DO SOMETHING TO GET APPLICATION NUMBER
        $this->applicantID = $applicantID;

        $this->personalDetails = new PersonalDetails(
            $firstName, $lastName, $middleInitial, $phoneNum, $DOB, $nationality, 
            $gender, $maritalStatus, $familyType, $homeAddress, $mailingAddress, $emailAddress
        );

        $this->emergencyContactDetails = new EmergencyContactDetails(
            $contactName, $contactRelationship, $contactPhone, $contactAddress, $contactEmail
        );

        $this->educationDetails = new EducationDetails(
            $studentID, $levelOfStudy, $yearOfStudy, $programme, $faculty, $school
        );

        $this->application = new Application($status);

        $this->roomType = $roomType;
        $this->roommatePreference = $roommatePreference;

    }

    //GETTERS
    public function getApplicantID(){
        return $this->applicantID;
    }
    public function getApplication(){
        return $this->application;
    }
    public function getPersonalDetails(){
        return $this->personalDetails;
    }
    public function getEmergencyContactDetails(){
        return $this->emergencyContactDetails;
    }
    public function getEducationDetails(){
        return $this->educationDetails;
    }
    
    public function getRoomType(){
        return $this->roomType;
    }
    public function getRoommatePreference(){
        return $this->roommatePreference;
    }

    public function __toString()
    {
        echo "Application ID#" . $this->applicantID;
        echo "Name: " . $this->personalDetails->getFirstName() . " " . $this->personalDetails->getLastName();
        echo "Status: " . $this->application->getStatus();
    }
}