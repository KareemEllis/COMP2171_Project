<?php
session_start();
// if(!isset($_SESSION['id'])){
//     session_destroy();
//     header('Location: index.php');
//     exit;
// }

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
        <aside class="sidebar">
            <ul>
                <a href="./dashboard.php"><li><i class="material-icons">home</i>Home</li></a>
                <a href="./applicationProcessing.php"><li><i class="material-icons">assignment</i>Application Processing</li></a>
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
                <h1 class="title">Notice Board</h1>
            </header>

            <section>
                <h2 class="notice-title">SOME TITLE</h2>
                <h3 class="author">Author: Kareem Ellis</h3>
                <h3 class="post-date">August 27, 2002</h3>

                <div class="content">
                    <h2>Details</h2>
                    <hr>
                    <h3>Date</h3>
                    <p>September 10, 2022</p>
                    <h3>Time</h3>
                    <p>10:00 pm</p>
                    <h3>Location</h3>
                    <p>Student Union</p>
                    <h3>Description</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus exercitationem voluptate a fugiat voluptatibus dolor perferendis necessitatibus nostrum debitis vitae hic facilis, autem dignissimos tenetur excepturi minima nam deleniti error!
                            Itaque voluptates nam quaerat a, molestiae officiis veniam nemo eveniet unde enim quidem excepturi tempora ex modi, quasi odit at voluptatem ullam. Enim repellat voluptatum, suscipit omnis autem natus in.
                            Aut maiores totam quis nam beatae assumenda, impedit ex nobis ipsa incidunt, facilis officiis doloremque, similique eaque distinctio. Saepe voluptate delectus enim quasi esse voluptatum impedit perspiciatis soluta similique tenetur!</p>
                </div>

            </section>
                
        </main>
    </div>

    <?php include '_footer.php' ?>
</body>
</html>