<?php

include 'classAutoloader.php';

$residentManager = new ResidentManager();
$loginManagement = new LoginManagement();
$authentification = new Authentification();

$loginManagement->startSession();

if($loginManagement->checkIfLoggedIn() == false){
    header("Location: ./login.php");
}
if($authentification->authApplicationProcessing() == false){
    header("Location: ./dashboard.php");
}

$tableData = $residentManager->displayResidents();


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
                <a href="./roomAssignment.php"><li><i class="material-icons">hotel</i>Room Assignment</li></a>
                <a href="#" class="currentPage"><li><i class="material-icons">people_outline</i>Residents</li></a>
                <a href="./noticeBoard.php"><li><i class="material-icons">web</i>Notice Board</li></a>
                <a href="./reportGeneration.php"><li><i class="material-icons">assessment</i>Report Generation</li></a>
                <hr>
                <a href="./logout.php"><li><i class="material-icons">exit_to_app</i>Logout</li></a>
            </ul>
        </aside>

        <!-- ENTER CODE HERE -->
        <main>
            <header>
                <h1 class="title">Resident Processing</h1>
            </header>

            <section>
                <h2>Residents</h2>

                <table>
                    <colgroup>
                            <col style="width: 10%">
                            <col style="width: 25%">
                            <col style="width: 25%">
                            <col style="width: 25%">
                            <col style="width: 10%">
                            <col style="width: 25%">
                            <col style="width: 15%">
                            <col style="width: 10%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>Resident ID</th> <th>Position</th> <th>First Name</th> <th>Last Name</th> <th>Middle Initial</th>
                                <th>Home Address</th> <th>Telephone Number</th> <th>Room Number</th>
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