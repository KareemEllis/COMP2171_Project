<?php
session_start();
// if(!isset($_SESSION['id'])){
//     session_destroy();
//     header('Location: index.php');
//     exit;
// }
include 'classAutoloader.php';
        
$resManager = new ResidentManager();

// check which button was clicked and filter the residentList accordingly
if (isset($_POST['block_lynx'])) {
    $filtered_resident_list = array_filter($resManager->getresidentList(), function($resident) {
        return $resident->getRoomNumber() === 'Lynx Block';
    });
} elseif (isset($_POST['block_genus'])) {
    $filtered_resident_list = array_filter($resManager->getresidentList(), function($resident) {
        return $resident->getRoomNumber() === 'Genus Block';
    });
} elseif (isset($_POST['block_pardus'])) {
    $filtered_resident_list = array_filter($resManager->getresidentList(), function($resident) {
        return $resident->getRoomNumber() === 'Pardus Block';
    });
} else {
    $filtered_resident_list = $resManager->getresidentList();
}

// display the filtered data in a table
if (!empty($filtered_resident_list)) {
    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>First Name</th>';
    echo '<th>Last Name</th>';
    echo '<th>Room Number</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($filtered_resident_list as $resident) {
        echo '<tr>';
        echo '<td>' . $resident->getFirstName() . '</td>';
        echo '<td>' . $resident->getLastName() . '</td>';
        echo '<td>' . $resident->getRoomNumber() . '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
} else {
    echo 'No data found.';
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