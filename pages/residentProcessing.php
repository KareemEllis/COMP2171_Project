<?php

include 'classAutoloader.php';

$residentManager = new ResidentManager();
$loginManagement = new LoginManagement();
$authentification = new Authentification();

$loginManagement->startSession();

if ($loginManagement->checkIfLoggedIn() == false) {
    header("Location: ./login.php");
}
if ($authentification->authApplicationProcessing() == false) {
    header("Location: ./dashboard.php");
}

// for search query
if (isset($_GET['search-q'])) {
    $search = $_GET['search-q'];
    $tableData = $residentManager->displayResidents($search);
} else {
    $tableData = $residentManager->displayResidents();
}



// delete result
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $res = $residentManager->deleteResident($id);
    if ($res) {
        header('Location: residentProcessing.php');
    }
}

// update the resident
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $residentManager->update_resident();
}

// filter positions
if (isset($_GET['filter_position'])) {
    $var = $_GET['filter_position'];
    $table = $residentManager->filter_position($var);
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

    <link rel="stylesheet" href="css/residentProcessing.css">
</head>

<body>
    <?php include '_header.php'; ?>

    <style>
        #filter_position {
            display: flex;
            justify-content: center;
            gap: 20px
        }
    </style>


    <div class="container">
        <aside class="sidebar">
            <ul>
                <a href="./dashboard.php"><li><i class="material-icons">home</i>Home</li></a>
                <a href="./applicationProcessing.php"><li><i class="material-icons">assignment</i>Application Processing</li></a>
                <a href="./requestAddForm.php"><i class="material-icons">build</i>Request Service</a>
                <a href="./requestProcessing.php"><li><i class="material-icons">home_repair_service</i>Request Processing</li></a>
                <a href="./roomAssignment.php"><li><i class="material-icons">hotel</i>Room Assignment</li></a>
                <a href="#" class="currentPage"><li><i class="material-icons">people_outline</i>Residents</li></a>
                <a href="./noticeBoard.php"><li><i class="material-icons">web</i>Notice Board</li></a>
                <a href="./reportGeneration.php"><li><i class="material-icons">assessment</i>Report Generation</li></a>
                <hr>
                <a href="./logout.php">
                    <li><i class="material-icons">exit_to_app</i>Logout</li>
                </a>
            </ul>
        </aside>

        <!-- ENTER CODE HERE -->
        <main class="resident_page">
            <header>
                <h1 class="title">Resident Processing</h1>
            </header>

            <section class="search-resident">
                <form action="residentProcessing.php" method="get">
                    <div class="row">
                        <div class="heading">
                            <h3>Search Resident</h3>
                        </div>
                        <div class="search-field">
                            <input type="text" name="search-q" placeholder="ID or Resident Name"
                                value="<?= isset($_GET['search-q']) ? $_GET['search-q'] : '' ?>">
                        </div>
                        <div class="button">
                            <button type="submit">Search</button>
                        </div>
                    </div>
                </form>
                <hr>
                <form action="residentProcessing.php" id="filter_position" method="get">
                    <div class="heading">
                        <h3>Filter</h3>
                    </div>
                    <div class="search-field">
                        <select name="filter_position" id="">
                            <option value="">Select Position</option>
                            <option <?= isset($_GET['filter_position']) && $_GET['filter_position'] == 'Standard Resident' ? 'selected' : '' ?> value="Standard Resident">Standard Resident</option>
                            <option <?= isset($_GET['filter_position']) && $_GET['filter_position'] == 'Block Representative' ? 'selected' : '' ?> value="Block Representative">Block Representative
                            </option>
                            <option <?= isset($_GET['filter_position']) && $_GET['filter_position'] == 'Resident Advisor' ? 'selected' : '' ?> value="Resident Advisor">Resident Advisor</option>
                        </select>
                    </div>
                    <div class="button">
                        <button type="submit">Filter results</button>
                    </div>

                </form>
            </section>

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
                            <th>Resident ID</th>
                            <th>Position</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Middle Initial</th>
                            <th>Home Address</th>
                            <th>Telephone Number</th>
                            <th>Room Number</th>
                            <th>Action</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_GET['filter_position'])) { ?>
                            <?= (!empty($table)) ? $table : "<tr><td colspan='8' class='no-record'>No record found</td></tr>"; ?>

                        <?php } else {
                            ?>
                            <?= (!empty($tableData)) ? $tableData : "<tr><td colspan='8' class='no-record'>No record found</td></tr>"; ?>

                        <?php } ?>
                    </tbody>
                </table>
            </section>

        </main>
    </div>

    <?php include '_footer.php' ?>
</body>

</html>