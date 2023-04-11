<?php

include 'classAutoloader.php';

$loginManagement = new LoginManagement();
$authentification = new Authentification();
$requestManager = new RequestManager();

$loginManagement->startSession();

if($loginManagement->checkIfLoggedIn() == false){
    header("Location: ./login.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $residentName = $_SESSION['firstName'] . " " . $_SESSION['lastName'];
    $time = $_POST['apptTime'];
    $formattedTime = "";
    
    if($time == ""){
        $formattedTime = "NA";
    }
    else{
        $formattedTime = date('g:i A', strtotime($time));
    }

    $requestManager->addRequest(
        date('Y-m-d'), $_SESSION['id'], $_POST['serviceType'], $residentName,
        $_POST['details'], $_POST['apptDate'], $formattedTime
    );

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

    <link rel="stylesheet" href="css/requestService.css">
    <script src="./js/requestService.js"></script>
</head>
<body>
    <?php include '_header.php'; ?>

    <div class="container">
        <?php include '_navigation.php'; ?>

        <!-- ENTER CODE HERE -->
        <main>
            <header>
                <h1 class="title">Request Service</h1>
            </header>

            <section>   
                <div class="fetchMsg hide"></div>

                <form>
                    <label>Service Type</label>
                    <select name="serviceType" id="serviceType">
                        <option value="Maintenance">Maintenance</option>
                        <option value="Laundry">Laundry</option>
                    </select>

                    <label>Appointment Date</label>
                    <input type="date" name="apptDate" id="apptDate">

                    <label>Appointment Time</label>
                    <input type="time" id="apptTime" name="apptTime">
                    
                    <label>Details</label>
                    <textarea name="details" id="details" cols="30" rows="10"></textarea>
                    <div class="detailsMsg error"></div>

                    <div class="controls">
                        <button type="submit">Send Request</button>
                    </div>
                </form>   

            </section>
                
        </main>
    </div>

    <?php include '_footer.php' ?>
</body>
</html>