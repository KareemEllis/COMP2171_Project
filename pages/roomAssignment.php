<?php

include 'classAutoloader.php';


$roomManager = new RoomManager();
$loginManagement = new LoginManagement();
$authentification = new Authentification();

$loginManagement->startSession();

if($loginManagement->checkIfLoggedIn() == false){
    header("Location: ./login.php");
}
if($authentification->authApplicationProcessing() == false){
    header("Location: ./dashboard.php");
}

// checks if the residents in a room are filled and
// updates the status
$roomList = $roomManager->getRoomsList();


foreach ($roomList as $room){


    if ($room->getRoomType() == 'Double' && $room->getResident1() != null && $room->getResident2() != null){
        $roomManager->updateStatus($room, 'Occupied');
    }

    if ($room->getRoomType() == 'Double' && empty($room->getResident1()) && empty($room->getResident2())){
        $roomManager->updateStatus($room, 'Available');
    }


    if ($room->getRoomType() == 'Single' && $room->getResident1()!= null ){
        $roomManager->updateStatus($room, 'Occupied');
    }

    if ($room->getRoomType() == 'Single' && empty($room->getResident1()) ){
        $roomManager->updateStatus($room, 'Available');
    }

}

//display data
$tableData = $roomManager->displayRooms();


?>

<!-- html -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../resources/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/roomAssignment.css">
</head>
<body>
    <?php include '_header.php'; ?>

    <div class="container">
        <?php include '_navigation.php'; ?>

        <!-- ENTER CODE HERE -->
        <main>
            <header>
                <h1 class="title">Room Assignment</h1>

            </header>

            <section>

                <div class="top">
                    <h2>Rooms</h2>
                    <i class="fa fa-bed"></i>
                </div>

                <table class="roomTable">
                        <thead>
                            <tr>
                                <th>Room Number</th> <th>Room Type</th> <th>Block</th> <th>Resident 1</th> <th>Resident 2</th> <th>Status</th>
                            </tr> 
                        </thead>
                        <tbody>
                                <?php echo $tableData; ?>     
                        </tbody>
                </table>
                
            </section>
            
                
        </main>
    </div>

    <?php include '_footer.php' ?>
</body>
</html>