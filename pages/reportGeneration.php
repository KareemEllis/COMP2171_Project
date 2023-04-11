<?php
session_start();
// if(!isset($_SESSION['id'])){
//     session_destroy();
//     header('Location: index.php');
//     exit;
// }

include 'classAutoloader.php';
//include 'ResidentManager.class.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $resView = new ResidentManager();
    $filters = [
        "firstName" => $_POST['firstName'] ?? "",
        "middleInitial" => $_POST['middleInitial'] ?? "",
        "lastName" => $_POST['lastName'] ?? "",
        "position" => $_POST['position'] ?? "",
        "nationality" => $_POST['nationality'] ?? "",
        "roomNumber" => $_POST['roomNumber'] ?? ""
    ];
    if (isset($_POST['button'])) {
        $resView = new ResidentManager();
        if ($_POST['button'] == "Residents") {
            $table = $resView->displayResidents();
            echo $table;
        } elseif ($_POST['button'] == "Block Lynx") {
            // logic for displaying Lynx block residents
        } elseif ($_POST['button'] == "Block Genus") {
            // logic for displaying Genus block residents
        } elseif ($_POST['button'] == "Block Pardus") {
            // logic for displaying Pardus block residents
        }
    }
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
    <link rel="stylesheet" href="css/reportGeneration.css">
    <script src="js/reportGeneration.js"></script>
</head>
<body>
    <?php include '_header.php'; ?>

    <div class="container">
        <?php include '_navigation.php'; ?>

        <!-- ENTER CODE HERE -->
        <section class="mainContent">

<header>
    <h1>Report Generation</h1>
</header>

<section class="views">
<div class="title"><h2>Report Type</h2></div>
    <button class="view-residents">Residents</button>
    <button class="view-blockL">Block Lynx</button>
    <button class="view-blockG">Block Genus</button>
    <button class="view-blockP">Block Pardus</button>
</section>

<section class="filters">
<div class="title"><h2>Filters</h2></div>
    <button class="filter-fName on">First Name</button>
    <button class="filter-mName on">Middle Initial</button>
    <button class="filter-lName on">Last Name</button>
    <button class="filter-position on">Position</button>
    <button class="filter-nationality on">Nationality</button>
    <button class="filter-room on">Room Number</button>
</section>

<div class ="download"id="download"><button>Download Report</button></div>

<div id="results">
    <div class="container">
        
    </div>
</div>
</section>
    </div>

    <dialog class="modal">
    <h2 class="modaltitle">You are generating a report</h2>
    <p class="modalplease">Please confirm the details below before fetching for a report from the system</p>
    <p class="reportType">REPORT TYPE: ALL RESIDENTS</p>
    <p class="reportColumns">COLUMNS: FIRST NAME</p>
    <div class = "confirmclose"><button class="confirm">Confirm<button class="close">Close</button></button></div>
</dialog>  
    <?php include '_footer.php' ?>
</body>
</html>