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
    $noticeBoard->addNotice($_POST['notice-title'], $_POST['date'], $_POST['time'], $_POST['description'], $_POST['location'], $_SESSION['id'], date('Y-m-d'));
    exit;
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

    <link rel="stylesheet" href="css/postNotice.css">
    <script src="./js/postNotice.js"></script>
</head>
<body>
    <?php include '_header.php'; ?>

    <div class="container">
        <?php include '_navigation.php'; ?>

        <!-- ENTER CODE HERE -->
        <main>
            <header>
                <h1 class="title">Post New Notice</h1>
            </header>

            <section>   

                <form>
                    <label>Title <span>*</span></label>         
                    <input type="text" class="notice-title" name="notice-title" id="notice-title">
                    <div class="titleMsg error"></div>

                    <label>Date</label>
                    <input type="date" name="date" id="date">
                    
                    <label>Time</label>
                    <input type="text" name="time" id="time">
                    
                    <label>Location</label>
                    <input type="text" name="location" id="location" >
                    
                    <label>Description</label>

                    <textarea name="description" id="description" cols="30" rows="10"></textarea>

                    <div class="controls">
                        <button type="submit">Post Notice</button>
                    </div>
                </form>   

            </section>
                
        </main>
    </div>

    <?php include '_footer.php' ?>
</body>
</html>