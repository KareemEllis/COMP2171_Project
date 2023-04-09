<?php

include 'classAutoloader.php';

$loginManagement = new LoginManagement();
$loginManagement->startSession();

if($loginManagement->checkIfLoggedIn() == false){
    header("Location: ./login.php");
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
    
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/main.css">
    
</head>
<body>
    <?php include '_header.php'; ?>

    <div class="container">
        <?php include '_navigation.php'; ?>

        <!-- ENTER CODE HERE -->
        <main>
            <header>
                <h1 class="title">Dashboard</h1>
            </header>

            <section>
                <h2>Welcome <?php echo $_SESSION['firstName'] . " " . $_SESSION['lastName'] ?></h2>
            </section>
                
        </main>
    </div>

    <?php include '_footer.php' ?>
</body>
</html>