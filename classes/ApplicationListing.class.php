<?php

class ApplicationListing {
  
    private $db = new DB();
    private $applicationList;

    //Gets Applications from DB on instantiation
    public function __construct() {
        $this->applicationList = $this->getAllApplications();
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
        $index = null;
        //Find the index of the application to be deleted
        foreach ($this->applicationList as $i => $application) {
            if($application->getApplicationID() == $applicationID){
              $index == $i;
              break;
            }
        }

        if ($index == null) {
            // If the Application was found
            return null;
        }
        else {
            // If the Application was not found
            return $this->applicationList[$index];
        }
    }

    //Cretes an instance of an Application and adds it to the Database
    public function addApplication(
        $applicationID, $status, $firstName, $lastName, $middleInitial, 
        $DOB, $nationality, $gender, $maritalStatus, $familyType, 
        $homeAddress, $mailingAddress, $emailAddress, $studentID, $contactName, 
        $contactRelationship, $contactPhone, $contactAddress, $contactEmail, $levelOfStudy,
        $yearOfStudy, $programme, $faculty, $school, $roomType, $roommatePreference
    )
    {
        $application = new Application(
          $applicationID, $status, $firstName, $lastName, $middleInitial, 
          $DOB, $nationality, $gender, $maritalStatus, $familyType, 
          $homeAddress, $mailingAddress, $emailAddress, $studentID, $contactName, 
          $contactRelationship, $contactPhone, $contactAddress, $contactEmail, $levelOfStudy,
          $yearOfStudy, $programme, $faculty, $school, $roomType, $roommatePreference
        );
        
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
            array_push($this->applicationList, $application); //Add new instance of Application to List
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
        echo(
            "<table>".
            "<colgroup>".
              "<col style=\"width:10%\">".
              "<col style=\"width:25%\">".
              "<col style=\"width:25%\">".
              "<col style=\"width:25%\">".
              "<col style=\"width:5%\">".
            "</colgroup>".
              "<thead>".
                "<tr>".
                  "<th>Application ID</th> <th>Name</th> <th>Gender</th> <th>Status</th> <th></th>".
                "</tr>".  
              "</thead>".  
              "<tbody>"
          );
          
          foreach ($this->applicationList as $application){
            echo "<tr>";
            echo "<td>".$application->getID()."</td>" . "<td>".$application->getFirstName(). " " . $application->getLastName() . "</td>" . "<td>".$application->getGender()."</td>";
            // "<td>".
            // "<div class=\"dropdown\">
            //     <input type=\"text\" class=\"textBox ". $application['Status'] ."\" name = \"" . $application['ApplicationID']. "\" value=\"". $application['Status'] ."\" readonly>
            //             <div class=\"option\">
            //                 <div onclick=\"statusShow('Pending', ". $application['ApplicationID'] . ")\">Pending</div>
            //                 <div onclick=\"statusShow('Accepted', ". $application['ApplicationID'] . ")\">Accepted</div>
            //                 <div onclick=\"statusShow('Rejected', ". $application['ApplicationID'] . ")\">Rejected</div>
            //             </div>
            // </div>
            
            // </td>".
            // "<td><button onclick=\"detailShow(". $application['ApplicationID'] . ")\"><i class=\"material-icons\">search</i></button></td>";
            echo "</tr>";
          }
          
          echo(
              "<tbody>".
            "</table>"
          );
    }
}