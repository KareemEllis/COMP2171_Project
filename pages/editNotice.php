<?php

include 'classAutoloader.php';

$loginManagement = new LoginManagement();
$authentification = new Authentification();
$noticeBoard = new NoticeBoard();

$loginManagement->startSession();

$editAuthentified = false;

if($loginManagement->checkIfLoggedIn() == false){
    header("Location: ./login.php");
}

//Checks if user is authenticated to edit the notice board
if($authentification->authNoticeBoardEdit() == false){
    header("Location: ./dashboard.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $noticeBoard->updateNoticeDetails($_POST['notice-id'], $_POST['notice-title'], $_POST['date'], $_POST['time'], $_POST['description'], $_POST['location']);
    exit;
}

$notice_to_view = $noticeBoard->findNotice($_GET['id']);

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

    <link rel="stylesheet" href="css/editNotice.css">
    <script src="./js/editNotice.js"></script>
</head>
<body>
    <?php include '_header.php'; ?>

    <div class="container">
        <aside class="sidebar">
            <ul>
                <a href="./dashboard.php"><li><i class="material-icons">home</i>Home</li></a>
                <a href="./applicationProcessing.php"><li><i class="material-icons">assignment</i>Application Processing</li></a>
                <a href="./requestProcessing.php"><li><i class="material-icons">home_repair_service</i>Request Processing</li></a>
                <a href="./roomAssignment.php"><li><i class="material-icons">hotel</i>Room Assignment</li></a>
                <a href="./residentProcessing.php"><li><i class="material-icons">people_outline</i>Residents</li></a>
                <a href="./noticeBoard.php" class="currentPage"><li><i class="material-icons">web</i>Notice Board</li></a>
                <a href="./reportGeneration.php"><li><i class="material-icons">assessment</i>Report Generation</li></a>
                <hr>
                <a href="./logout.php"><li><i class="material-icons">exit_to_app</i>Logout</li></a>
            </ul>
        </aside>

        <!-- ENTER CODE HERE -->
        <main>
            <header>
                <h1 class="title">Edit Notice</h1>
            </header>

            <section>   

                <form>
                    <label>Notice ID</label>  
                    <input disabled type="text" name="notice-id" id="notice-id" value="<?php echo $notice_to_view->getNoticeID(); ?>">

                    <label>Title</label>         
                    <input type="text" class="notice-title" name="notice-title" id="notice-title" 
                        value="<?php echo $notice_to_view->getNoticeDetails()->getTitle(); ?>"
                    >
                    <div class="titleMsg error"></div>

                    <!-- <label class="author">Author: <?php //echo $notice_to_view->getAuthor()->getFirstName() . " " . $notice_to_view->getAuthor()->getLastName(); ?></label>
                    <label class="post-date"><?php //echo $notice_to_view->getPostDate(); ?></label> -->

                    <label>Date</label>
                    <input type="date" name="date" id="date" 
                        <?php
                            $date = $notice_to_view->getNoticeDetails()->getDate(); 
                            $dateVal = "";
                            if($date == null || trim($date) == ""){
                                $dateVal = "";
                            }
                            else{
                                $dateVal = $date;
                            }
                        ?>
                        value="<?php echo $dateVal; ?>"
                    >
                    
                    <label>Time</label>
                    <input type="text" name="time" id="time" 
                        <?php 
                            $time = $notice_to_view->getNoticeDetails()->getTime(); 
                            $timeVal = "";
                            if($time == null || trim($time) == ""){
                                $timeVal = "N/A";
                            }
                            else{
                                $timeVal =  $time;
                            }
                        ?>
                        value="<?php echo $timeVal; ?>"
                    >
                    
                    <label>Location</label>
                    <input type="text" name="location" id="location" 
                        <?php 
                            $location = $notice_to_view->getNoticeDetails()->getLocation(); 
                            $locationVal = "";
                            if($location == null || trim($location) == ""){
                                $locationVal = "N/A";
                            }
                            else{
                                $locationVal = $location;
                            }
                        ?>
                        value="<?php echo $locationVal; ?>"
                    >
                    
                    <label>Description</label>
                    <?php 
                        $description = $notice_to_view->getNoticeDetails()->getDescription();
                        $descriptionVal = "";
                        if($description == null || trim($description) == ""){
                            $descriptionVal = "N/A";
                        }
                        else{
                            $descriptionVal = $description;
                        } 
                    ?>
                    <textarea name="description" id="description" cols="30" rows="10"><?php echo $descriptionVal; ?></textarea>

                    <div class="controls">
                        <button type="submit">Edit Notice</button>
                    </div>
                </form>   

            </section>
                
        </main>
    </div>

    <?php include '_footer.php' ?>
</body>
</html>