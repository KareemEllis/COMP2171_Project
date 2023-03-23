<?php

class NoticeBoard {
    private $db;
    private $noticeList;

    public function __construct() {
        $this->db = new DB();
        $this->noticeList = $this->getAllNotices();
    }

    // Getter method for noticeList
    public function getNoticeList() {
        return $this->noticeList;
    }

    // Method to get all notices from database
    public function getAllNotices() {
        $stmt = $this->db->connect()->prepare("SELECT * FROM notices");
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $noticeList = [];

        foreach ($results as $row){
            //Creating Instances of Notice Class from database data
            $stmt2 = $this->db->connect()->prepare("SELECT * FROM residents WHERE `Resident ID` = :residentID");
            $stmt2->bindValue(':residentID', $row['author'], PDO::PARAM_STR);
            $stmt2->execute();
            $results2 = $stmt2->fetchAll(PDO::FETCH_ASSOC)[0];

            $author = new Resident(
                $results2['First Name'], $results2['Last Name'], $results2['Middle Initial'], $results2['Resident ID'], $results2['Position'],
                $results2['DOB'], $results2['Nationality'], $results2['Gender'], $results2['Marital Status'], $results2['Family Type'], $results2['Home Address'],
                $results2['Mailing Address'], $results2['Email Address'], $results2['Phone Number'], $results2['ID Number'], $results2['Contact Name'],
                $results2['Contact Relationship'], $results2['Contact Telephone'], $results2['Contact Address'], $results2['Contact Email'], $results2['Level of Study'],
                $results2['Year of Study'], $results2['Programme Name'], $results2['Faculty Name'], $results2['Name of School'], $results2['Room Number']
            );

            $notice = new Notice(
              $row['id'], $author, $row['post_date'], $row['title'], $row['date'],
              $row['time'], $row['location'], $row['description']
            );

            array_push($noticeList, $notice);
        }
        return $noticeList;
    }

    // Method to find a notice by ID
    public function findNotice($noticeID) {
        $found = false;
        $index = 0;

        //Find the index of the notice to be deleted
        foreach ($this->noticeList as $notice) {
            if($notice->getNoticeID() == $noticeID){
              $found = true;
              break;
            }
            $index = $index + 1;
        }

        if ($found == false) {
            // If the notice was not found
            return null;
        }
        else {
            // If the notice was found
            return $this->noticeList[$index];
        }
    }

    // Method to add a new notice
    public function addNotice($title, $date, $time, $description, $location, $author, $postDate) {
        $stmt = $this->db->connect()->prepare(
            "INSERT INTO notices (author, post_date, title, date, time, location, description) 
            
            VALUES (:author, :post_date, :title, :date, :time, :location, :description)
        ");

        $stmt->bindValue(':author', $author, PDO::PARAM_STR);
        $stmt->bindValue(':post_date', $postDate, PDO::PARAM_STR);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':date', $date, PDO::PARAM_STR);   
        $stmt->bindValue(':time', $time, PDO::PARAM_STR);  
        $stmt->bindValue(':location', $location, PDO::PARAM_STR);  
        $stmt->bindValue(':description', $description, PDO::PARAM_STR);  

        // Executes SQL statement and checks if successful
        if($stmt->execute() == false){
            //If adding the notice to the database was unsuccessful
            echo "Notice not posted";
            echo "ERROR: " . $stmt->errorInfo();
        }
        else{
            //If the notice was successfully added to the database
            echo "Notice Successfully Posted";
        }

        $stmt = null;
    }

    // Method to delete a notice by ID
    public function deleteNotice($noticeID) {
        $notice = null;
        $notice = $this->findNotice($noticeID);
        
        if ($notice != null) {
            $stmt = $this->db->connect()->prepare("DELETE FROM notices WHERE id = :id");
            $stmt->bindValue(':id', $notice->getNoticeID(), PDO::PARAM_STR); 

            // Executes SQL statement and checks if successful
            if ($stmt->execute() == false) {
                // If SQL Execution was unsuccessful
                echo "Failed to delete Notice from Database";
                echo "ERROR: " . $stmt->errorInfo();
            }
            else{
                // If SQL Execution was successful
                echo "Successfully deleted Notice";
            }
            
            $stmt = null;
        }
        else {
          echo "A notice does not exist for Notice #" . $noticeID;
        }
    }

    // Method to update the details of a notice by ID
    public function updateNoticeDetails($noticeID, $title, $date, $time, $description, $location) {
        $stmt = $this->db->connect()->prepare(
            "UPDATE notices
            SET 
            title = :title, 
            date = :date, 
            time = :time, 
            location = :location, 
            description = :description 
            WHERE id = :id"
        );
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':date', $date, PDO::PARAM_STR);
        $stmt->bindValue(':time', $time, PDO::PARAM_STR);
        $stmt->bindValue(':location', $location, PDO::PARAM_STR);
        $stmt->bindValue(':description', $description, PDO::PARAM_STR);
        $stmt->bindValue(':id', $noticeID, PDO::PARAM_STR);

        $stmt->execute();
    }

    // Method to display all notices
    public function displayNotices($editAuth) {
        $dataToDisplay = "";  
        foreach ($this->noticeList as $notice){
            $dataToDisplay .= "<div class=\"notice\">";
            
            //Checks if the user is authentificated to Edit and Delete notices
            if($editAuth == true){
                $dataToDisplay .= "<div class=\"controls\">";
                $dataToDisplay .= "<a class=\"control-btn edit\" href=\"./editNotice.php?id=" . $notice->getNoticeID() . "\"><i class=\"material-icons\">edit</i></a>";
                $dataToDisplay .= "<a onClick=\"deleteNotice(this," . $notice->getNoticeID() . ")\" class=\"control-btn delete\"><i class=\"material-icons\">delete</i></a>";
                $dataToDisplay .= "</div>"; //Closing .controls div
            }

            $dataToDisplay .= "<div class=\"top\">";
            $dataToDisplay .= "<h2>" . $notice->getNoticeDetails()->getTitle() . "</h2>";
            $dataToDisplay .= "<h3 class=\"author\">Author: " . $notice->getAuthor()->getFirstName() . " " . $notice->getAuthor()->getLastName() . "</h3>";
            $dataToDisplay .= "<h3 class=\"date\">" . $notice->getPostDate() . "</h3>";
            $dataToDisplay .= "</div>"; //Closing .top div

            $dataToDisplay .= "<div class=\"content\">";
            $dataToDisplay .= $notice->getNoticeDetails()->getDescription();
            $dataToDisplay .= "</div>"; //Closing .content div

            $dataToDisplay .= "<a class=\"see-more\" href=\"./viewNotice.php?id=". $notice->getNoticeID() ."\">See More</a>";
            $dataToDisplay .= "</div>"; //Closing .notice div
        }
        return $dataToDisplay;
    }
}

?>