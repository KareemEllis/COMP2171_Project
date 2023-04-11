<?php

class RoomManager{

    private $db;
    private $roomsList;

    public function __construct() {
        $this->db = new DB();
        $this->roomsList = $this->getAllRooms();
    }

    public function getRoomsList() {
        return $this->roomsList;
    }

    public function getAllRooms() {
        $stmt = $this->db->connect()->prepare("SELECT * FROM Rooms");
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $roomsList = [];

        foreach ($results as $row){
            $room = new Room(
                $row['Room Number'], $row['Room Type'], $row['Availability Status'], $row['Block'],
                $row['Resident ID #1'], $row['Resident ID #2']
            );

            array_push($roomsList, $room);
        }
        return $roomsList;
    }

    public function findRoom($roomNumber){

        foreach($this->getRoomsList() as $room){

            if ($room->getRoomNumber() == $roomNumber){
                return $room;
            }
        }

        //add some error handling
        
    }

    public function removeResidents($roomNum){

        $room = $this->findRoom($roomNum);
        $res = null;

        if ($room->getStatus()=='Available'){
            echo "There are no residents to remove";
            echo "<br>\n";
        }

        else{
            $stmt = $this->db->connect()->prepare("UPDATE `Rooms` SET `Resident ID #1` = NULL WHERE `Room Number`= :roomNum");
            $stmt->bindValue(':roomNum', $roomNum, PDO::PARAM_STR);
            $stmt->execute();

            $stmt = null;

            $stmt = $this->db->connect()->prepare("UPDATE `Rooms` SET `Resident ID #2` = NULL WHERE `Room Number`= :roomNum");
            $stmt->bindValue(':roomNum', $roomNum, PDO::PARAM_STR);
            $stmt->execute();

            $stmt = null;

            $stmt = $this->db->connect()->prepare("UPDATE `Residents` SET `Room Number` = ' ' WHERE `Room Number`= :roomNum");
            $stmt->bindValue(':roomNum', $roomNum, PDO::PARAM_STR);
            $stmt->execute();

            
            $room->setResident1($res);
            $room->setResident2($res);
            echo "Successfully Removed Current Residents";
            echo "<br>\n";

        }

        
    }

    public function updateStatus($room, $newStatus){
        $room->setStatus($newStatus);
        $roomNum = $room->getRoomNumber();

        $stmt = $this->db->connect()->prepare("UPDATE `Rooms` SET `Availability Status` = :newStatus WHERE `Room Number`= :roomNum");
        $stmt->bindValue(':newStatus', $newStatus, PDO::PARAM_STR);
        $stmt->bindValue(':roomNum', $roomNum, PDO::PARAM_STR);

        $stmt->execute();
    }

    
    public function updateResident1($roomNum, $res1) {

        

        $stmt = $this->db->connect()->prepare("SELECT `Resident ID` FROM `Residents` WHERE `Resident ID`= :res1");
        $stmt->bindValue(':res1', $res1, PDO::PARAM_STR);

        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($results)==0){
            echo "Sorry, ID Number $res1 not found";
            echo "<br>\n";
        }

        
        else{

            $query = $this->db->connect()->prepare("SELECT * FROM `Rooms`");
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_ASSOC);

            $duplicate = FALSE;
            foreach ($results as $row){
                
                //checking if the entered resident id is already assigned to a room
                if ($row['Resident ID #1'] == $res1 || $row['Resident ID #2'] == $res1){
                    
                    $duplicate = TRUE;
                }
                
            }


            if ($duplicate == TRUE){
                echo "Resident ID $res1 is already assigned to a room";
                echo "<br>\n";
            }

            else{
                $query = $this->db->connect()->prepare("UPDATE `Rooms` SET `Resident ID #1`= :res1 WHERE `Room Number`=:roomNum");
                $query->bindValue(':res1', $res1, PDO::PARAM_STR);
                $query->bindValue(':roomNum', $roomNum, PDO::PARAM_STR);

                if($query->execute()==false){
                    echo "Error, That ID doesn't belong to a Resident";
                }

                else{
                    $query = $this->db->connect()->prepare("UPDATE `Residents` SET `Room Number` = :roomNum WHERE `Resident ID` = :res1");
                    $query->bindValue(':res1', $res1, PDO::PARAM_STR);
                    $query->bindValue(':roomNum', $roomNum, PDO::PARAM_STR);
                    $query->execute();


                    $room = $this->findRoom($roomNum);
                    $room->setResident1($res1);
                    echo "Successful";
                    echo "<br>\n";
                }
            }


        }   
        
    }

    public function updateResident2($roomNum, $res2) {


        $stmt = $this->db->connect()->prepare("SELECT `Resident ID` FROM `Residents` WHERE `Resident ID`= :res2");
        $stmt->bindValue(':res2', $res2, PDO::PARAM_STR);

        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($results)==0){
            echo "Sorry, ID Number $res2 not found";
            echo "<br>\n";
        }

        else{

            $duplicate = FALSE;

            $query = $this->db->connect()->prepare("SELECT * FROM `Rooms`");
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_ASSOC);

            
            foreach ($results as $row){
                
                //checking if the entered resident id is already assigned to a room
                if ($row['Resident ID #1'] == $res2 || $row['Resident ID #2'] == $res2){
                    $duplicate = TRUE;
                }
                
            }

            if ($duplicate == TRUE){
                echo "Resident ID $res2 is already assigned to a room";
                echo "<br>\n";
            }

            if($duplicate == FALSE){
                $query = $this->db->connect()->prepare("UPDATE `Rooms` SET `Resident ID #2`= :res2 WHERE `Room Number`=:roomNum");
                $query->bindValue(':res2', $res2, PDO::PARAM_STR);
                $query->bindValue(':roomNum', $roomNum, PDO::PARAM_STR);

                if($query->execute()==false){
                    echo "Error, That ID doesn't belong to a Resident";
                }

                else{
                    $query = $this->db->connect()->prepare("UPDATE `Residents` SET `Room Number` = :roomNum WHERE `Resident ID` = :res2");
                    $query->bindValue(':res2', $res2, PDO::PARAM_STR);
                    $query->bindValue(':roomNum', $roomNum, PDO::PARAM_STR);
                    $query->execute();

                    $room = $this->findRoom($roomNum);
                    $room->setResident2($res2);
                    echo "Successful";
                    echo "<br>\n";
                }
            }


        }   
        

        
    }


    public function displayRooms(){     
        $dataToDisplay = "";  
        foreach ($this->roomsList as $dorm){

            

            $dataToDisplay .= "<tr>";
            $dataToDisplay .= <<<END
                                    <td>
                                        <a href="./roomDetails.php?roomNum={$dorm->getRoomNumber()}" .>{$dorm->getRoomNumber()}</a>
                                    </td>
                                    END;
            // $dataToDisplay .= "<td>".$dorm->getRoomNumber()."</td>";
            $dataToDisplay .= "<td>".$dorm->getRoomType()."</td>";
            $dataToDisplay .= "<td>".$dorm->getBlock()."</td>";
            $dataToDisplay .= "<td>".$dorm->getResident1()."</td>";
            $dataToDisplay .= "<td>".$dorm->getResident2()."</td>";

            $status = $dorm->getStatus();
            if ($status == 'Occupied'){
                $dataToDisplay .= "<td><span class='Occupied'>".$dorm->getStatus()."</span></td>";
            }
            elseif($status == 'Available'){
                $dataToDisplay .= "<td><span class='Available'>".$dorm->getStatus()."</span></td>";
            }
            



            $dataToDisplay .= "</tr>";
            
        }
        return $dataToDisplay;
    }


}