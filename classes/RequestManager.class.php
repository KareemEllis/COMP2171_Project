<?php

class RequestManager {
  
    private $db;
    private $requestList;

    //Gets requests from DB on instantiation
    public function __construct() {
        $this->db = new DB();
        $this->requestList = $this->getAllRequests();
    }

    public function getRequestList() {
        return $this->requestList;
    }

    //Gets requests from Requests Table in DB
    public function getAllRequests() {
        $stmt = $this->db->connect()->prepare("SELECT * FROM Requests");
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $requestList = [];

        foreach ($results as $row){
            //Creating Instances of Request Class from database data
            $request = new Request(
                $row['Date Submitted'], $row['RequestID'], $row['ResidentID'], $row['Resident'],
                $row['Service Type'], $row['Status'], $row["Details"], $row['Appointment Date'], $row['Appointment Time']
            );

            array_push($requestList, $request);
        }
        return $requestList;
    }

    //Find a Request
    public function findRequest($requestID) {
        $found = false;
        $index = 0;
        //Find the index of the request to be found
        foreach ($this->requestList as $request) {
            if($request->getRequestID() == $requestID){
              $found = true;
              break;
            }
            $index = $index + 1;
        }

        if (!$found) {
            // If the request was not found
            return null;
        }
        else {
            // If the request was found
            return $this->requestList[$index];
        }
    }

    public function displayRequests(){     
        $dataToDisplay = "";  
        foreach ($this->requestList as $request){
            $dataToDisplay .= "<tr>";
            $dataToDisplay .= "<td>".$request->getDateSubmitted()."</td>";
            $dataToDisplay .= "<td>".$request->getRequestID()."</td>";
            $dataToDisplay .= "<td>".$request->getResidentID()."</td>";
            $dataToDisplay .= "<td>".$request->getResident()."</td>";
            $dataToDisplay .= "<td>".$request->getServiceType()."</td>";
            $dataToDisplay .= "<td> <span class=\"" . $request->getStatus() . "\">" . $request->getStatus(). "<span> </td>"; 
            $dataToDisplay .= "<td> <a href=\" ./requestDetails.php?id=". $request->getRequestID() ."\" target=\"_blank\">View</a></td>"; //Should be a button to view the application details
            $dataToDisplay .= "</tr>";
        }
        return $dataToDisplay;
    }

    public function displayRequestsByStatus($status){
        $dataToDisplay = "";
        foreach ($this->requestList as $request){
            if($request->getStatus() == $status){
                $dataToDisplay .= "<tr>";
                $dataToDisplay .= "<td>".$request->getDateSubmitted()."</td>";
                $dataToDisplay .= "<td>".$request->getRequestID()."</td>";
                $dataToDisplay .= "<td>".$request->getResidentID()."</td>";
                $dataToDisplay .= "<td>".$request->getResident()."</td>";
                $dataToDisplay .= "<td>".$request->getServiceType()."</td>";
                $dataToDisplay .= "<td> <span class=\"" . $request->getStatus() . "\">" . $request->getStatus(). "<span> </td>"; 
                $dataToDisplay .= "<td> <a href=\" ./requestDetails.php?id=". $request->getRequestID() ."\" target=\"_blank\">View</a></td>"; //Should be a button to view the application details
                $dataToDisplay .= "</tr>";
            }
        }
        return $dataToDisplay;
    }

    public function displayRequestsBySearch($id, $searchType) {
        $dataToDisplay = "";
        foreach ($this->requestList as $request) {
            if ($searchType == 'residentID' && $request->getResidentID() == $id) {
                $dataToDisplay .= "<tr>";
                $dataToDisplay .= "<td>".$request->getDateSubmitted()."</td>";
                $dataToDisplay .= "<td>".$request->getRequestID()."</td>";
                $dataToDisplay .= "<td>".$request->getResidentID()."</td>";
                $dataToDisplay .= "<td>".$request->getResident()."</td>";
                $dataToDisplay .= "<td>".$request->getServiceType()."</td>";
                $dataToDisplay .= "<td> <span class=\"" . $request->getStatus() . "\">" . $request->getStatus(). "<span> </td>"; 
                $dataToDisplay .= "<td> <a href=\" ./requestDetails.php?id=". $request->getRequestID() ."\" target=\"_blank\">View</a></td>"; 
                $dataToDisplay .= "</tr>";
            } elseif ($searchType == 'requestID' && $request->getRequestID() == $id) {
                $dataToDisplay .= "<tr>";
                $dataToDisplay .= "<td>".$request->getDateSubmitted()."</td>";
                $dataToDisplay .= "<td>".$request->getRequestID()."</td>";
                $dataToDisplay .= "<td>".$request->getResidentID()."</td>";
                $dataToDisplay .= "<td>".$request->getResident()."</td>";
                $dataToDisplay .= "<td>".$request->getServiceType()."</td>";
                $dataToDisplay .= "<td> <span class=\"" . $request->getStatus() . "\">" . $request->getStatus(). "<span> </td>"; 
                $dataToDisplay .= "<td> <a href=\" ./requestDetails.php?id=". $request->getRequestID() ."\" target=\"_blank\">View</a></td>"; 
                $dataToDisplay .= "</tr>";
            }
        }
        return $dataToDisplay;
    }
    

    public function updateRequestStatus($requestID, $newStatus) {
        $stmt = $this->db->connect()->prepare("UPDATE Requests SET Status = :status WHERE RequestID = :id");
        $stmt->bindValue(':status', $newStatus, PDO::PARAM_STR);
        $stmt->bindValue(':id', $requestID, PDO::PARAM_STR);

        $stmt->execute();

        $request = $this->findRequest($requestID);
        $request->setStatus($newStatus);
    }

    //Add a new request to the database
    public function addRequest($dateSubmitted, $residentID, $serviceType, 
                                $resident, $details, $apptDate, $apptTime)
    {
        $stmt = $this->db->connect()->prepare(
            "INSERT INTO requests (`Date Submitted`, ResidentID, Resident, Status, `Service Type`, `Details`, `Appointment Date`, `Appointment Time`) 
            
            VALUES (:dateSubmitted, :residentID, :resident, :status, :serviceType, :details, :apptDate, :apptTime)
        ");

        $status = "Pending";
        $stmt->bindValue(':dateSubmitted', $dateSubmitted, PDO::PARAM_STR);
        $stmt->bindValue(':residentID', $residentID, PDO::PARAM_STR);
        $stmt->bindValue(':resident', $resident, PDO::PARAM_STR);
        $stmt->bindValue(':status', $status, PDO::PARAM_STR);
        $stmt->bindValue(':serviceType', $serviceType, PDO::PARAM_STR);
        $stmt->bindValue(':details', $details, PDO::PARAM_STR);
        $stmt->bindValue(':apptDate', $apptDate, PDO::PARAM_STR);
        $stmt->bindValue(':apptTime', $apptTime, PDO::PARAM_STR);

        // Executes SQL statement and checks if successful
        if($stmt->execute() == false){
            //If adding the service request to the database was unsuccessful
            echo "Failure";
            echo "ERROR: " . $stmt->errorInfo();
        }
        else{
            //If the service request was successfully added to the database
            echo "Success";
        }

        $stmt = null;
    }

    //Delete a request from the database and removes from array
    public function deleteRequest($requestID) {
        $index = null;
        //Find the index of the request to be deleted
        foreach ($this->requestList as $i => $request) {
            if($request->getRequestID() == $requestID){
              $index == $i;
              break;
            }
        }

        if ($index != null) {
            $request_to_delete = $this->requestList[$index];

            $stmt = $this->db->connect()->prepare("DELETE FROM Requests WHERE RequestID = $request_to_delete->getRequestID();");

            // Executes SQL statement and checks if successful
            if ($stmt->execute() == false) {
                // If SQL Execution was unsuccessful
                echo "Failed to delete Request from Database";
                echo "ERROR: " . $stmt->errorInfo();
            }
            else{
                // If SQL Execution was successful
                echo "Successfully deleted Request";
                unset($this->requestList[$index]); //Removes request from the list
            }
            
            $stmt = null;
        }
        else {
          echo "A request does not exist for Request number" . $requestID;
        }

    }
    

    public function deleteRejectedRequests(){
        $stmt = $this->db->connect()->prepare(
            "DELETE FROM Requests WHERE `Status` = 'Rejected';"
        );
        $stmt->execute();
    }
    
}