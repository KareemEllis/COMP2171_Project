<?php

class Request {

    private $dateSubmitted;
    private $requestID;
    private $residentID;
    private $status;
    private $serviceType;
    private $resident;
    private $details;
    private $apptDate;
    private $apptTime;
    
    public function __construct($dateSubmitted,$requestID,$residentID,$resident,$serviceType,$status, $details,$apptDate,$apptTime){
        $this->dateSubmitted = $dateSubmitted;
        $this->requestID = $requestID;
        $this->residentID = $residentID;
        $this->resident = $resident;
        $this->serviceType =$serviceType;
        $this->status = $status;
        $this->details = $details;
        $this->apptDate = $apptDate;
        $this->apptTime = $apptTime;
    }

    //GETTERS

    public function getDateSubmitted(){
        return $this->dateSubmitted;
    }

    public function getRequestID(){
        return $this->requestID;
    }

    public function getResidentID(){
        return $this->residentID;
    }

    public function getResident(){
        return $this->resident;
    }

    public function getServiceType(){
        return $this->serviceType;
    }

    public function getStatus(){
        return $this->status;
    }

    public function getDetails(){
        return $this->details;
    }

    public function getAppointmentDate(){
        return $this->apptDate;
    }

    public function getAppointmentTime(){
        return $this->apptTime;
    }


    //SETTERS
    public function setStatus($newStatus){
        $this->status = $newStatus;
    }

    public function __toString()
    {
        echo "Date Submitted: " . $this->getDateSubmitted();
        echo "Request ID: ".$this->getRequestID();
        echo "Resident ID: ".$this->getResidentID();
        echo "Resident: ".$this->getResident();
        echo "Service Type: ".$this->getServiceType();
        echo "Status: ".$this->getStatus();
        echo "Details: ".$this->getDetails();
        echo "Appointment Date: ".$this->getAppointmentDate();
        echo "Appointment Time: ".$this->getAppointmentTime();
    }
}