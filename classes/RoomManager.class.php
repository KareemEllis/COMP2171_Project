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

    // public function updateStatus(){

    // }


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