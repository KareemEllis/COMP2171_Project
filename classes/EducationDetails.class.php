<?php

class EducationDetails {
    private $studentID;
    private $levelOfStudy;
    private $yearOfStudy;
    private $programme;
    private $faculty;
    private $school;

    public function __construct(
        $studentID, $levelOfStudy, $yearOfStudy,
        $programme, $faculty, $school
    )
    {
        $this->studentID = $studentID;
        $this->levelOfStudy = $levelOfStudy;
        $this->yearOfStudy = $yearOfStudy;
        $this->programme = $programme;
        $this->faculty = $faculty;
        $this->school = $school;
    }

    //GETTERS
    public function getStudentID(){
        return $this->studentID;
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
}

?>