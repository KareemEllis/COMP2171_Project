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

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $noticeBoard->deleteNotice($_POST['id']);
    exit;
}
$notices = $noticeBoard->displayNotices($editAuthentified);

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

    <link rel="stylesheet" href="css/noticeBoard.css">
    <script src="./js/noticeBoard.js"></script>
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
                        echo "<div class=\"post-notice\"><a href=\"./postNotice.php\">Post New Notice</a></div>";
                    }
                ?>
                <div class="notices">
                    <?php echo $notices; ?>
                </div>
            </section>
                
        </main>
    </div>

    <?php include '_footer.php' ?>

    <dialog class="modal">
        <h2>Confirm delete</h2>
        <p>Are you sure you want to delete this notice?</p>

        <button class="confirm">Yes, delete it</button> <button class="close">Cancel</button>
    </dialog>
</body>
</html>