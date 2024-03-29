<?php

include 'classAutoloader.php';

$loginManagement = new LoginManagement();
$authentification = new Authentification();
$roomManager = new roomManager();

$loginManagement->startSession();

$selectedRoom = $roomManager->findRoom($_GET['roomNum']);

if($loginManagement->checkIfLoggedIn() == false){
    header("Location: ./login.php");
}
if($authentification->authApplicationProcessing() == false){
    header("Location: ./dashboard.php");
}

$roomNum = $selectedRoom->getRoomNumber();
$roomType = $selectedRoom->getRoomType();
$roomStatus = $selectedRoom->getStatus();
$roomBlock = $selectedRoom->getBlock();
$roomRes1 = $selectedRoom->getResident1();
$roomRes2 = $selectedRoom->getResident2();




if(isset($_POST['submit'])){


    if(!empty($_POST['res1'])){

        $resident1 = $_POST['res1'];
        $roomManager->updateResident1($roomNum, $resident1);

    }

    if(!empty($_POST['res2'])){

        $resident2 = $_POST['res2'];
        $roomManager->updateResident2($roomNum, $resident2);
    }

    if (empty($_POST['res1'])== true && empty($_POST['res2']) == true){
        echo "Please enter a resident";
    }

    
}

if (isset($_POST['remove'])){
    $roomManager->removeResidents($roomNum);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="shortcut icon" href="../resources/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/roomDetails.css">
</head>
<body>
    <?php include '_header.php'; ?>

    <div class="container">
        <?php include '_navigation.php'; ?>

        <!-- ENTER CODE HERE -->
        <main>
            <header>
                <h1 class="title">Assign Room</h1>
            </header>

            <section>
                <div class="details">
                    <div class="header">
                        <div>
                            <h2 class="roomNum"><?php echo $roomNum?></h2>
                        </div>

                        <div class="head_sec2">
                            <div>
                                <h3><?php echo $roomType?> , <?php echo $roomBlock?></h3>
                            </div>

                            <?php if($roomType == 'Double' && $roomStatus == 'Occupied') : ?>
                                <div>
                                    <h3>Residents: <?php echo $roomRes1?>, <?php echo $roomRes2?></h3>
                                </div>
                            <?php endif; ?>
                            
                            <div>
                                <h3><?php echo $roomStatus?></h3>
                            </div>
                        </div>
                        

                        

                        
                        
                    </div>

                    <div class="roomForm">
                        <!-- LOGIC FOR WHAT INPUT FIELDS ARE DISPLAYED -->

                        <?php if($roomType == 'Single') : ?>

                        <form action="" method="post">
                            <div class="resID">
                                <label>Enter the Resident's ID:</label>
                                <input type="text" name='res1' value=" " placeholder="eg. 1">
                            </div>
                            
                            <div class="buttonBox">
                                <div class="assignBtn_div">
                                    <input class= "assignBtn" name= "submit" type="submit" value="Assign Resident">
                                </div>

                                <div class="removeBtn_div">
                                    <input class= "removeBtn" name= "remove" type="submit" value="Remove Current Residents">
                                </div>
                            </div>
                            
                            
                        </form>


                        <?php endif; ?>


                        <?php if($roomType == 'Double') : ?>


                        <form action="" method="post">

                            <div class="resID">
                                <label>Enter the first Resident's ID:</label>
                                <input type="text" name='res1' placeholder="eg. 1">
                            </div>
                            

                            <div class="resID">
                                <label>Enter the second Resident's ID:</label>
                                <input type="text" name='res2' placeholder="eg. 2">
                            </div>
                            
                            <div class="buttonBox">
                                <div class="assignBtn_div">
                                    <input class= "assignBtn" name= "submit" type="submit" value="Assign Resident">
                                </div>

                                <div class="removeBtn_div">
                                    <input class= "removeBtn" name= "remove" type="submit" value="Remove Current Residents">
                                </div>
                            </div>
                            
                        </form>


                        <?php endif; ?>
                    </div>
                </div>

            </section>
                
        </main>
    </div>

    <?php include '_footer.php' ?>
</body>
</html>