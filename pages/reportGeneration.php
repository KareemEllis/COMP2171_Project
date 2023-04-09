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
</head>
<body>
    <?php include '_header.php'; ?>

    <div class="container">
        <?php include '_navigation.php'; ?>

        <!-- ENTER CODE HERE -->
        <main>
            <header>
                <h1 class="title">Reports</h1>
            </header>

            <section>
                <h2>Title</h2>
            </section>
                
        </main>
    </div>

    <?php include '_footer.php' ?>
</body>
</html>