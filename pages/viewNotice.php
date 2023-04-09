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
if($authentification->authNoticeBoardEdit() == true){
    $editAuthentified = true;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['delete'])){

    }
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

    <link rel="stylesheet" href="css/viewNotice.css">
</head>
<body>
    <?php include '_header.php'; ?>

    <div class="container">
        <?php include '_navigation.php'; ?>

        <!-- ENTER CODE HERE -->
        <main>
            <header>
                <h1 class="title">Notice Board</h1>
            </header>

            <section>
                <?php 
                    if($editAuthentified == true){
                        echo (
                        "<div class=\"controls\">
                        <a class=\"edit\" href=\"./editNotice.php?id=" . $notice_to_view->getNoticeID() . "\">Edit Notice</a>
                        <a class=\"delete\" href=\"#\">Delete</a>
                        </div>"
                        );
                    }
                ?>
                

                <h2 class="notice-title"><?php echo $notice_to_view->getNoticeDetails()->getTitle(); ?></h2>
                <h3 class="author">Author: <?php echo $notice_to_view->getAuthor()->getFirstName() . " " . $notice_to_view->getAuthor()->getLastName(); ?></h3>
                <h3 class="post-date"><?php echo $notice_to_view->getPostDate(); ?></h3>

                <div class="content">
                    <h2>Details</h2>
                    <hr>
                    <h3>Date</h3>
                    <p>
                        <?php
                        $date = $notice_to_view->getNoticeDetails()->getDate(); 
                        if($date == null || trim($date) == "0000-00-00"){
                            echo "N/A";
                        }
                        else{
                            echo $date;
                        }
                        ?>
                    </p>
                    
                    <h3>Time</h3>
                    <p>
                        <?php 
                        $time = $notice_to_view->getNoticeDetails()->getTime(); 
                        if($time == null || trim($time) == ""){
                            echo "N/A";
                        }
                        else{
                            echo $time;
                        }
                        ?>
                    </p>
                    
                    <h3>Location</h3>
                    <p>
                        <?php 
                        $location = $notice_to_view->getNoticeDetails()->getLocation(); 
                        if($location == null || trim($location) == ""){
                            echo "N/A";
                        }
                        else{
                            echo $location;
                        }
                        ?>
                    </p>
                    
                    <h3>Description</h3>
                    <p>
                        <?php 
                        $description = $notice_to_view->getNoticeDetails()->getDescription();
                        if($description == null || trim($description) == ""){
                            echo "N/A";
                        }
                        else{
                            echo $description;
                        } 
                        ?>
                    </p>
                </div>

            </section>
                
        </main>
    </div>

    <?php include '_footer.php' ?>
</body>
</html>