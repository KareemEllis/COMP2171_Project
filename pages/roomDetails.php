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
    
    $resident1 = $_POST['res1'];
    $resident2 = $_POST['res2'];


    $roomManager->updateResident1($roomNum, $resident1, $resident2);
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
</head>
<body>
    <?php include '_header.php'; ?>

    <div class="container">
        <aside class="sidebar">
            <ul>
                <a href="./dashboard.php"><li><i class="material-icons">home</i>Home</li></a>
                <a href="./applicationProcessing.php"><li><i class="material-icons">assignment</i>Application Processing</li></a>
                <a href="./roomAssignment.php" class="currentPage"><li><i class="material-icons">hotel</i>Room Assignment</li></a>
                <a href="./residentProcessing.php"><li><i class="material-icons">people_outline</i>Residents</li></a>
                <a href="./noticeBoard.php"><li><i class="material-icons">web</i>Notice Board</li></a>
                <a href="./reportGeneration.php"><li><i class="material-icons">assessment</i>Report Generation</li></a>
                <hr>
                <a href="./logout.php"><li><i class="material-icons">exit_to_app</i>Logout</li></a>
            </ul>
        </aside>

        <!-- ENTER CODE HERE -->
        <main>
            <header>
                <h1 class="title">Assign Room</h1>
            </header>

            <section>
                <div>
                    <div>
                        <h2><?php echo $roomNum?></h2>
                    </div>

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


                <!-- LOGIC FOR WHAT INPUT FIELDS ARE DISPLAYED -->

                <?php if($roomType == 'Single'&& $roomStatus == 'Available') : ?>

                    <form action="" method="post">
                        <label>Enter the Resident's ID</label>
                        <input type="text" name='res1' value="" placeholder="eg. 1">

                        <!-- Since single room, hid res2 input so it can be posted-->
                        <!-- Complete -->
                        <input type="hidden" name="res2" value="" />

                        <input name= "submit" type="submit" value="Assign Resident">
                    </form>
                    
                <?php endif; ?>
                

                <?php if($roomType == 'Double' && $roomStatus == 'Available') : ?>
                    <!-- If the room is a double room and resident1 is already there -->

                    <?php if($roomRes1 != '' && $roomRes2 == '') : ?>

                        <form action="" method="post">
                            <label>Enter the Resident's ID</label>
                            <input type="text" name='res1' value="" placeholder="eg. 1">

                            <input name= "submit" type="submit" value="Assign Resident">
                        </form>

                    <?php endif; ?>

                    <!-- If the room is a double room and resident2 is already there -->
                    <!-- NOTE: Might change cause resident1 will be required if both 
                    input fields empty so it wouldn't be possible for resident1 to be empty but
                    resident2 has a number-->

                    <?php if($roomRes2 != '' && $roomRes1 == '') : ?>

                        <form action="" method="post">
                            <label>Enter the Resident's ID</label>
                            <input type="text" name='res2' value="" placeholder="eg. 1">

                            <input name= "submit" type="submit" value="Assign Resident">
                        </form>

                    <?php endif; ?>

                    <!-- If the room is a double room and and both fields empty -->
                    <?php if($roomRes1 == '' && $roomRes2 == '') : ?>

                        <form action="" method="post">
                            <label>Enter the first Resident's ID</label>
                            <input type="text" name='res1' placeholder="eg. 1" value="">

                            <label>Enter the second Resident's ID</label>
                            <input type="text" name='res2' placeholder="eg. 2" value="">

                            <input name= "submit" type="submit" value="Assign Resident">
                        </form>

                    <?php endif; ?>

                <?php endif; ?>

                
                

            </section>
                
        </main>
    </div>

    <?php include '_footer.php' ?>
</body>
</html>