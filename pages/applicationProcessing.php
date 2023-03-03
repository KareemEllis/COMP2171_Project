<?php
session_start();

// if(!isset($_SESSION['id'])){
//     session_destroy();
//     header('Location: index.php');
//     exit;
// }
include 'classAutoloader.php';

$applicationManagement = new ApplicationManagement();

$tableData = $applicationManagement->displayApplicants();
$filter = 'all';

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['filter'])){
        if($_GET['filter'] == "all"){
            $tableData = $applicationManagement->displayApplicants();
            $filter = 'all';
        }
        if($_GET['filter'] == "accepted"){
            $tableData = $applicationManagement->displayApplicantsByStatus("Accepted");
            $filter = 'accepted';
        }
        if($_GET['filter'] == "rejected"){
            $tableData = $applicationManagement->displayApplicantsByStatus("Rejected");
            $filter = 'rejected';
        }
        if($_GET['filter'] == "pending"){
            $tableData = $applicationManagement->displayApplicantsByStatus("Pending");
            $filter = 'pending';
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
    <link rel="stylesheet" href="css/applicationProcessing.css">

</head>
<body>
    <?php include '_header.php'; ?>

    <div class="container">
        <aside class="sidebar">
            <ul>
                <a href="./dashboard.php"><li><i class="material-icons">home</i>Home</li></a>
                <a href="#" class="currentPage"><li><i class="material-icons">assignment</i>Application Processing</li></a>
                <a href="./roomAssignment.php"><li><i class="material-icons">hotel</i>Room Assignment</li></a>
                <a href="./residentProcessing.php"><li><i class="material-icons">people_outline</i>Residents</li></a>
                <a href="./noticeBoard.php"><li><i class="material-icons">web</i>Notice Board</li></a>
                <a href="./reportGeneration.php"><li><i class="material-icons">assessment</i>Report Generation</li></a>
                <hr>
                <a href="./logout.php"><li><i class="material-icons">exit_to_app</i>Logout</li></a>
            </ul>
        </aside>

        <!-- ENTER CODE HERE -->
        <main>
            <header>
                <h1 class="title">Application Processing</h1>
            </header>

            <section>
                <h2>Applications</h2>
                <div class="controls">
                    <i class="material-icons">filter_list</i>
                    <h3>Filter By:</h3>
                    <a href="./applicationProcessing.php?filter=all" class="<?php if($filter == 'all'){echo 'active';} ?>  filter-all">All</a>
                    <a href="./applicationProcessing.php?filter=rejected" class="<?php if($filter == 'rejected'){echo 'active';} ?> filter-rejected">Rejected</a>
                    <a href="./applicationProcessing.php?filter=pending" class="<?php if($filter == 'pending'){echo 'active';} ?> filter-pending">Pending</a>
                    <a href="./applicationProcessing.php?filter=accepted" class="<?php if($filter == 'accepted'){echo 'active';} ?> filter-accepted">Accepted</a>
                </div>
                <table>
                    <colgroup>
                        <col style="width: 25%">
                        <col style="width: 25%">
                        <col style="width: 25%">
                        <col style="width: 15%">
                        <col style="width: 10%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>Application ID</th> <th>Name</th> <th>Gender</th> <th>Status</th> <th></th>
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