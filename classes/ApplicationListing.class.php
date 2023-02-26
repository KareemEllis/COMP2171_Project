<?php

class ApplicationListing {
  
    private $db;
    private $applicationList;

    //Gets Applications from DB on instantiation
    public function __construct() {
        $this->db = new DB();
        $this->applicationList = $this->getAllApplications();
    }

    public function getApplicationList() {
        return $this->applicationList;
    }

    //Gets Applications from Application Table in DB
    public function getAllApplications() {
        $stmt = $this->db->connect()->prepare("SELECT * FROM Applicants");
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $applicationList = [];

        foreach ($results as $row){
            //Creating Instances of Application Class from database data
            $application = new Application(
              $row['ApplicationID'], $row['Status'], $row['First Name'], $row['Last Name'], $row['Middle Initial'],
              $row["DOB"], $row['Nationality'], $row['Gender'], $row['Marital Status'], $row['Family Type'], $row['Home Address'],
              $row['Mailing Address'], $row['Email Address'], $row['ID Number'], $row['Contact Name'], $row['Contact Relationship'],
              $row['Contact Telephone'], $row['Contact Address'], $row['Contact Email'], $row['Level of Study'], $row['Year of Study'],
              $row['Programme Name'], $row['Faculty Name'], $row['Name of School'], $row['Room Type'], $row['Roommate Preference']
            );

            array_push($applicationList, $application);
        }
        return $applicationList;
    }

    //Find an Application
    public function findApplication($applicationID) {
        $found = false;
        $index = 0;
        //Find the index of the application to be deleted
        foreach ($this->applicationList as $application) {
            if($application->getApplicationID() == $applicationID){
              $found = true;
              break;
            }
            $index = $index + 1;
        }

        if (!$found) {
            // If the Application was found
            return null;
        }
        else {
            // If the Application was not found
            return $this->applicationList[$index];
        }
    }

    //Comparison functions to sort by ID
    public function compareApplicationID($a, $b){
        return $a->getApplicationID() - $b->getApplicationID();
    }

    public function compareApplicationID_Reverse($a, $b){
        return $b->getApplicationID() - $a->getApplicationID();
    }

    public function sortByApplicationID_Ascending(){
        usort($applicationList, 'compareApplicationID');
    }
    public function sortByApplicationID_Descending(){
        usort($applicationList, 'compareApplicationID_Reverse');
    }

    public function compareName($a, $b){
        $aName = $a->getFirstName() . " " . $a->getLastName();
        $bName = $b->getFirstName() . " " . $b->getLastName();
        return strcmp($aName, $bName);
    }
    public function compareName_Reverse($a, $b){
        $aName = $a->getFirstName() . " " . $a->getLastName();
        $bName = $b->getFirstName() . " " . $b->getLastName();
        return strcmp($bName, $aName);
    }
    
    public function sortByName_Ascending(){
        usort($applicationList, 'compareName');
    }
    public function sortByName_Descending(){
        usort($applicationList, 'compareName_Reverse');
    }

    //Cretes an instance of an Application and adds it to the Database
    public function addApplication(
        $firstName, $lastName, $middleInitial, 
        $DOB, $nationality, $gender, $maritalStatus, $familyType, 
        $homeAddress, $mailingAddress, $emailAddress, $studentID, $contactName, 
        $contactRelationship, $contactPhone, $contactAddress, $contactEmail, $levelOfStudy,
        $yearOfStudy, $programme, $faculty, $school, $roomType, $roommatePreference
    )
    {   
        //ADD APPLICATION TO THE DATABASE
        //Add default status of Pending to status
        $stmt = $this->db->connect()->prepare(
            "INSERT INTO Applicants (Status, `First Name`, `Last Name`, `Middle Initial`, `DOB`, `Nationality`, 
            `Gender`, `Marital Status`, `Family Type`, `Home Address`, `Mailing Address`, `Email Address`,
            `ID Number`, `Contact Name`, `Contact Relationship`, `Contact Telephone`, `Contact Address`, `Contact Email`, 
            `Level of Study`, `Year of Study`, `Programme Name`, `Faculty Name`, `Name of School`, `Room Type`, `Roommate Preference`) 
            
            VALUES ('Pending', :firstName, :lastName, :middleInitial, :dob, :nationality, :gender, :maritalStatus, :familyType, :homeAddress,
            :mailingAddress, :emailAddress, :studentID, :contactName, :contactRelationship, :contactTelephone, :contactAddress, 
            :contactEmail, :levelOfStudy, :yearOfStudy, :programme, :faculty, :school, :roomType, :roommatePref)");

        $stmt->bindValue(':firstName', $firstName, PDO::PARAM_STR);
        $stmt->bindValue(':lastName', $lastName, PDO::PARAM_STR);
        $stmt->bindValue(':middleInitial', $middleInitial, PDO::PARAM_STR);
        $stmt->bindValue(':dob', $DOB, PDO::PARAM_STR);                     //CHEK THE DOB FORMAT!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        $stmt->bindValue(':nationality', $nationality, PDO::PARAM_STR);
        $stmt->bindValue(':gender', $gender, PDO::PARAM_STR);
        $stmt->bindValue(':maritalStatus', $maritalStatus, PDO::PARAM_STR);
        $stmt->bindValue(':familyType', $familyType, PDO::PARAM_STR);
        $stmt->bindValue(':homeAddress', $homeAddress, PDO::PARAM_STR);
        $stmt->bindValue(':mailingAddress', $mailingAddress, PDO::PARAM_STR);
        $stmt->bindValue(':emailAddress', $emailAddress, PDO::PARAM_STR);   //CHECK FOR EMAIL FORMAT 
        $stmt->bindValue(':studentID', $studentID, PDO::PARAM_STR);
        $stmt->bindValue(':contactName', $contactName, PDO::PARAM_STR);
        $stmt->bindValue(':contactRelationship', $contactRelationship, PDO::PARAM_STR);
        $stmt->bindValue(':contactTelephone', $contactPhone, PDO::PARAM_STR);
        $stmt->bindValue(':contactAddress', $contactAddress, PDO::PARAM_STR);
        $stmt->bindValue(':contactEmail', $contactEmail, PDO::PARAM_STR);
        $stmt->bindValue(':levelOfStudy', $levelOfStudy, PDO::PARAM_STR);
        $stmt->bindValue(':yearOfStudy', $yearOfStudy, PDO::PARAM_STR);
        $stmt->bindValue(':programme', $programme, PDO::PARAM_STR);
        $stmt->bindValue(':faculty', $faculty, PDO::PARAM_STR);
        $stmt->bindValue(':school', $school, PDO::PARAM_STR);
        $stmt->bindValue(':roomType', $roomType, PDO::PARAM_STR);
        $stmt->bindValue(':roommatePref', $roommatePreference, PDO::PARAM_STR);

        // Executes SQL statement and checks if successful
        if($stmt->execute() == false){
            //If adding the application to the database was unsuccessful
            echo "Application not submitted";
            echo "ERROR: " . $stmt->errorInfo();
        }
        else{
            //If the application was successfully added to the database
            echo "Application Successfully Submitted";
        }

        $stmt = null;
    }

    //Delete an application from the database and removes from array
    public function deleteApplication($applicationID) {
        $index = null;
        //Find the index of the application to be deleted
        foreach ($this->applicationList as $i => $application) {
            if($application->getApplicationID() == $applicationID){
              $index == $i;
              break;
            }
        }

        if ($index != null) {
            $application_to_delete = $this->applicationList[$index];

            $stmt = $this->db->connect()->prepare("DELETE FROM Applicants WHERE ApplicationID = $application_to_delete->getApplicationID();");

            // Executes SQL statement and checks if successful
            if ($stmt->execute() == false) {
                // If SQL Execution was unsuccessful
                echo "Failed to delete Application from Database";
                echo "ERROR: " . $stmt->errorInfo();
            }
            else{
                // If SQL Execution was successful
                echo "Successfully deleted Application";
                unset($this->applicationList[$index]); //Removes Application from the list
            }
            
            $stmt = null;
        }
        else {
          echo "An application does not exit for Application #" . $applicationID;
        }

    }

    //Sets status of Application to Accepted, Rejected or Pending
    public function updateApplicationStatus($applicationID, $newStatus) {
        $application_to_update =  $this->findApplication($applicationID);
        $application_to_update->setStatus($newStatus);
    }

    public function displayApplications(){     
        $dataToDisplay = "";  
        foreach ($this->applicationList as $application){
            $dataToDisplay .= "<tr>";
            $dataToDisplay .= "<td>".$application->getApplicationID()."</td>";
            $dataToDisplay .= "<td>".$application->getFirstName(). " " . $application->getLastName() . "</td>";
            $dataToDisplay .= "<td>".$application->getGender()."</td>";
            $dataToDisplay .= "<td>".$application->getStatus()."</td>"; 
            $dataToDisplay .= "<td> <a href=\" ./applicationDetails.php?id=". $application->getApplicationID() ."\" target=\"_blank\">View</a></td>"; //Should be a button to view the application details
            $dataToDisplay .= "</tr>";
        }
        return $dataToDisplay;
    }

    public function displayApplicationsByStatus($status){
        $dataToDisplay = "";
        foreach ($this->applicationList as $application){
            if($application->getStatus() == $status){
                $dataToDisplay .= "<tr>";
                $dataToDisplay .= "<td>".$application->getApplicationID()."</td>";
                $dataToDisplay .= "<td>".$application->getFirstName(). " " . $application->getLastName() . "</td>";
                $dataToDisplay .= "<td>".$application->getGender()."</td>";
                $dataToDisplay .= "<td>".$application->getStatus()."</td>"; 
                $dataToDisplay .= "<td> <a href=\" ./applicationDetails.php?id=". $application->getApplicationID() ."\" target=\"_blank\">View</a></td>"; //Should be a button to view the application details
                $dataToDisplay .= "</tr>";
            }
        }
        return $dataToDisplay;
    }
}