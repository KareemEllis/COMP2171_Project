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

    
    public function updateResident1($roomNum, $res1) {

        $duplicate = FALSE;

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

            
            foreach ($results as $row){
                
                //checking if the entered resident id is already assigned to a room
                if ($row['Resident ID #1'] == $res1 || $row['Resident ID #2'] == $res1){
                    echo "Resident ID $res1 is already assigned to a room";
                    echo "<br>\n";
                    $duplicate = TRUE;
                }
                
            }

            if($duplicate == FALSE){
                $query = $this->db->connect()->prepare("UPDATE `Rooms` SET `Resident ID #1`= :res1 WHERE `Room Number`=:roomNum");
                $query->bindValue(':res1', $res1, PDO::PARAM_STR);
                $query->bindValue(':roomNum', $roomNum, PDO::PARAM_STR);

                if($query->execute()==false){
                    echo "Error, That ID doesn't belong to a Resident";
                }

                else{
                    echo "Successful";
                    echo "\r\n";
                }
            }


        }   
        
    }

    public function updateResident2($roomNum, $res2) {

        $duplicate = FALSE;

        $stmt = $this->db->connect()->prepare("SELECT `Resident ID` FROM `Residents` WHERE `Resident ID`= :res2");
        $stmt->bindValue(':res2', $res2, PDO::PARAM_STR);

        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($results)==0){
            echo "Sorry, ID Number $res2 not found";
            echo "<br>\n";
        }

        else{

            $query = $this->db->connect()->prepare("SELECT * FROM `Rooms`");
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_ASSOC);

            
            foreach ($results as $row){
                
                //checking if the entered resident id is already assigned to a room
                if ($row['Resident ID #1'] == $res2 || $row['Resident ID #2'] == $res2){
                    echo "Resident ID $res2 is already assigned to a room";
                    echo "<br>\n";
                    $duplicate = TRUE;
                }
                
            }

            if($duplicate == FALSE){
                $query = $this->db->connect()->prepare("UPDATE `Rooms` SET `Resident ID #1`= :res2 WHERE `Room Number`=:roomNum");
                $query->bindValue(':res2', $res2, PDO::PARAM_STR);
                $query->bindValue(':roomNum', $roomNum, PDO::PARAM_STR);

                if($query->execute()==false){
                    echo "Error, That ID doesn't belong to a Resident";
                }

                else{
                    echo "Successful";
                    echo "\r\n";
                }
            }


        }   
        

        
    }


    public function displayRooms(){     
        $dataToDisplay = "";  
        foreach ($this->roomsList as $dorm){
            $dataToDisplay .= "<tr>";
            $dataToDisplay .= "<td>".$dorm->getRoomNumber()."</td>";
            $dataToDisplay .= "<td>".$dorm->getRoomType()."</td>";
            $dataToDisplay .= "<td>".$dorm->getBlock()."</td>";
            $dataToDisplay .= "<td>".$dorm->getResident1()."</td>";
            $dataToDisplay .= "<td>".$dorm->getResident2()."</td>";
            $dataToDisplay .= "<td>".$dorm->getStatus()."</td>";
            $dataToDisplay .= <<<END
                                    <td><a href="./roomDetails.php?roomNum={$dorm->getRoomNumber()}" .>Select</a></td>
                                    END;
            $dataToDisplay .= "</tr>";
        }
        return $dataToDisplay;
    }


}