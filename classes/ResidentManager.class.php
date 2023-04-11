<?php


//define a class called resident managaer 
class ResidentManager
{
    private $db;
    private $residentList;

    // Define a constructor that accepts a database connection
    public function __construct()
    {
        $search = null;
        if (isset($_GET['search-q'])) {
            $search = $_GET['search-q'];
        }

        $this->db = new DB();
        $this->residentList = $this->getResidents($search);
    }

    public function getresidentList()
    {
        return $this->residentList;
    }

    // Define a public method called "getResidents" that retrieves all residents from the database and returns them as an array
    public function getResidents($search = null)
    {

        // if user did not search any thing, this line of code will be executed
        $stmt = $this->db->connect()->prepare('SELECT * FROM Residents');

        // if the search is not null, means if the user searched for something
        if ($search != null) {

            if (is_numeric($search)) {
                $stmt = $this->db->connect()->prepare("SELECT * FROM residents WHERE `Resident ID` = :search");
                $stmt->bindValue(':search', $search, PDO::PARAM_INT);
            } else {
                $stmt = $this->db->connect()->prepare("SELECT * FROM residents WHERE `Last Name` LIKE :search OR `First Name` LIKE :search");
                $stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
            }

        }

        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);


        $residentList = [];

        foreach ($results as $row) {
            $resident = new Resident(
                $row['First Name'], $row['Last Name'], $row['Middle Initial'], $row['Resident ID'],
                $row['Position'], $row['DOB'], $row['Nationality'], $row['Gender'], $row['Marital Status'],
                $row['Family Type'], $row['Home Address'], $row['Mailing Address'], $row['Email Address'],
                $row['Phone Number'], $row['ID Number'], $row['Contact Name'], $row['Contact Relationship'],
                $row['Contact Telephone'], $row['Contact Address'], $row['Contact Email'], $row['Level of Study'],
                $row['Year of Study'], $row['Programme Name'], $row['Faculty Name'], $row['Name of School'], $row['Room Number']
            );

            array_push($residentList, $resident);
        }

        return $residentList;
    }




    // Define a public method called "findResident" that retrieves a resident from the database based on their ID and returns their information as an array
    public function findResident($id)
    {
        $stmt = $this->db->connect()->prepare('SELECT * FROM Residents WHERE `Resident ID` = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Define a public method called "updateResident" that updates a resident in the database based on their ID
    public function updateResident($id)
    {
        $resident = $this->findResident($id);

        if (!$resident) {
            return false; // Resident not found
        }

        $stmt = $this->db->connect()->prepare('UPDATE Residents WHERE id = :id');
        $stmt->bindParam(':firstname', $firstName);
        $stmt->bindParam(':lastname', $lastName);
        $stmt->bindParam(':middleInitial', $middleInitial);
        $stmt->bindParam(':residentID', $residentID);
        $stmt->bindParam(':position', $position);
        $stmt->bindParam(':DOB', $DOB);
        $stmt->bindParam(':nationality', $nationality);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':martialStatus', $maritalStatus);
        $stmt->bindParam(':familyType', $familyType);
        $stmt->bindParam(':homeAddress', $homeAddress);
        $stmt->bindParam(':mailingAddress', $mailingAddress);
        $stmt->bindParam(':emailAddress', $emailAddress);
        $stmt->bindParam(':phoneNumber', $phoneNumber);
        $stmt->bindParam(':studentID', $studentID);
        $stmt->bindParam(':contact', $contact);
        $stmt->bindParam(':levelOfStudy', $levelOfStudy);
        $stmt->bindParam(':yearOfStudy', $yearOfStudy);
        $stmt->bindParam(':programme', $programme);
        $stmt->bindParam(':faculty', $faculty);
        $stmt->bindParam(':school', $school);
        // $stmt->bindParam(':roomNumber', $roomNumber);
        $stmt->execute();

    }

    public function update_resident()
    {

        $stmt = $this->db->connect()->prepare('UPDATE Residents SET 
        `First Name` = :firstname, 
        `Last Name` = :lastname,
        `Middle Initial` = :middleInitial,
        `Position` = :position,
        `Home Address` = :homeAddress,
        `Phone Number` = :phoneNumber,
        `Room Number` = :roomNumber,
        `DOB`= :dob,
        `Nationality` = :nationality,
        `Gender` = :gender,
        `Marital Status` = :mart_status,
        `Family Type` = :family_type,
        `Mailing Address` = :mailing_address,
        `ID Number` = :id_number,
        `Contact Name` = :contact_name,
        `Contact Relationship` = :contact_relation,
        `Contact Telephone` = :contact_tel,
        `Contact Address` = :contact_addre,
        `Contact Email` = :contact_email,
        `Level of Study` = :level_of_std,
        `Year of Study` = :year_of_std,
        `Programme Name` = :programm_name,
        `Faculty Name` = :faculity_name,
        `Name of School` = :name_of_sch
    WHERE `Resident ID` = :id');


        // Bind the POST data values to the statement placeholders
        $stmt->bindParam(':firstname', $_POST['first_name']);
        $stmt->bindParam(':lastname', $_POST['last_name']);
        $stmt->bindParam(':middleInitial', $_POST['middle_initial']);
        $stmt->bindParam(':position', $_POST['position']);
        $stmt->bindParam(':homeAddress', $_POST['home_address']);
        $stmt->bindParam(':phoneNumber', $_POST['phone_number']);
        // $stmt->bindParam(':roomNumber', $_POST['room_no']);
        $stmt->bindParam(':dob', $_POST['dob']);
        $stmt->bindParam(':nationality', $_POST['nationality']);
        $stmt->bindParam(':gender', $_POST['gender']);
        $stmt->bindParam(':mart_status', $_POST['marital_status']);
        $stmt->bindParam(':family_type', $_POST['family_type']);
        $stmt->bindParam(':mailing_address', $_POST['mail_address']);
        $stmt->bindParam(':id_number', $_POST['id_number']);
        $stmt->bindParam(':contact_name', $_POST['contact_name']);
        $stmt->bindParam(':contact_relation', $_POST['contact_relation']);
        $stmt->bindParam(':contact_tel', $_POST['contact_telephone']);
        $stmt->bindParam(':contact_addre', $_POST['contact_address']);
        $stmt->bindParam(':contact_email', $_POST['contact_email']);
        $stmt->bindParam(':level_of_std', $_POST['study_level']);
        $stmt->bindParam(':year_of_std', $_POST['year_of_study']);
        $stmt->bindParam(':programm_name', $_POST['programme_name']);
        $stmt->bindParam(':faculity_name', $_POST['faci']);
        $stmt->bindParam(':name_of_sch', $_POST['school_nam']);
        $stmt->bindParam(':id', $_POST['r_id']);

        // Execute the update statement
        $stmt->execute();
        if ($stmt->execute()) {
            return "Resident data updated successfully!";
        } else {
            return "No rows were affected by the update statement!";
        }

    }


    // filter residents base on position
    public function filter_position($search)
    {
        $stmt = $this->db->connect()->prepare("SELECT * FROM residents WHERE `Position` = :search");
        $stmt->bindValue(':search', $search, PDO::PARAM_STR);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);


        $dataToDisplay = "";

        foreach ($results as $resident) {
            $dataToDisplay .= "<tr>";
            $dataToDisplay .= "<td>" . $resident['Resident ID'] . "</td>";
            $dataToDisplay .= "<td>" . $resident['Position'] . "</td>";
            $dataToDisplay .= "<td>" . $resident['First Name'] . "</td>";
            $dataToDisplay .= "<td>" . $resident['Last Name'] . "</td>";
            $dataToDisplay .= "<td>" . $resident['Middle Initial'] . "</td>";
            $dataToDisplay .= "<td>" . $resident['Home Address'] . "</td>";
            $dataToDisplay .= "<td>" . $resident['Phone Number'] . "</td>";
            $dataToDisplay .= "<td>" . $resident['Room Number'] . "</td>";
            $dataToDisplay .= "<td><a href=\"update-resident.php?id=" . $resident['Resident ID'] . "\">Edit</a></td>";
            $dataToDisplay .= "<td><a href=\"residentProcessing.php?id=" . $resident['Resident ID'] . "\">Delete</a></td>";


            $dataToDisplay .= "</tr>";
        }

        return $dataToDisplay;
    }

    public function deleteResident($id)
    {
        $stmt = $this->db->connect()->prepare('DELETE FROM Residents WHERE `Resident ID` = :id');
        $stmt->bindParam(':id', $id);
        return $stmt->execute();

    }


    public function displayResidents($search = null)
    {

        $dataToDisplay = "";



        if ($search != null) {
            foreach ($this->residentList as $resident) {
                $dataToDisplay .= "<tr>";
                $dataToDisplay .= "<td>" . $resident->getResidentID() . "</td>";
                $dataToDisplay .= "<td>" . $resident->getPosition() . "</td>";
                $dataToDisplay .= "<td>" . $resident->getFirstName() . "</td>";
                $dataToDisplay .= "<td>" . $resident->getLastName() . "</td>";
                $dataToDisplay .= "<td>" . $resident->getMiddleInitial() . "</td>";
                $dataToDisplay .= "<td>" . $resident->getHomeAddress() . "</td>";
                $dataToDisplay .= "<td>" . $resident->getPhoneNumber() . "</td>";
                $dataToDisplay .= "<td>" . $resident->getRoomNumber() . "</td>";
                $dataToDisplay .= "<td><a href=\"update-resident.php?id=" . $resident->getResidentID() . "\">Edit</a></td>";

                $dataToDisplay .= "<td><a href=\"residentProcessing.php?id=" . $resident->getResidentID() . "\">Delete</a></td>";


            }
        } else {
            foreach ($this->residentList as $resident) {
                $dataToDisplay .= "<tr>";
                $dataToDisplay .= "<td>" . $resident->getResidentID() . "</td>";
                $dataToDisplay .= "<td>" . $resident->getPosition() . "</td>";
                $dataToDisplay .= "<td>" . $resident->getFirstName() . "</td>";
                $dataToDisplay .= "<td>" . $resident->getLastName() . "</td>";
                $dataToDisplay .= "<td>" . $resident->getMiddleInitial() . "</td>";
                $dataToDisplay .= "<td>" . $resident->getHomeAddress() . "</td>";
                $dataToDisplay .= "<td>" . $resident->getPhoneNumber() . "</td>";
                $dataToDisplay .= "<td>" . $resident->getRoomNumber() . "</td>";
                $dataToDisplay .= "<td><a href=\"update-resident.php?id=" . $resident->getResidentID() . "\">Edit</a></td>";
                $dataToDisplay .= "<td><a href=\"residentProcessing.php?id=" . $resident->getResidentID() . "\">Delete</a></td>";

            }
        }

        return $dataToDisplay;
    }
}