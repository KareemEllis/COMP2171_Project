<?php

include 'classAutoloader.php';

$loginManagement = new LoginManagement();
$requestManager = new RequestManager();
$authentification = new Authentification();

$loginManagement->startSession();

if($loginManagement->checkIfLoggedIn() == false){
    header("Location: ./login.php");
}
if($authentification->authApplicationProcessing() == false){
    header("Location: ./dashboard.php");
}

$tableData = $requestManager->displayRequests();
$filter = 'all';

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['filter'])){
        if($_GET['filter'] == "all"){
            $tableData = $requestManager->displayRequests();
            $filter = 'all';
        }
        if($_GET['filter'] == "progress"){
            $tableData = $requestManager->displayRequestsByStatus("In Progress");
            $filter = 'progress';
        }
        if($_GET['filter'] == "rejected"){
            $tableData = $requestManager->displayRequestsByStatus("Rejected");
            $filter = 'rejected';
        }
        if($_GET['filter'] == "pending"){
            $tableData = $requestManager->displayRequestsByStatus("Pending");
            $filter = 'pending';
        }
        if($_GET['filter'] == "completed"){
            $tableData = $requestManager->displayRequestsByStatus("Completed");
            $filter = 'completed';
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['query'])){
        if($_POST['query'] == 'delete'){
            $requestManager->deleteRejectedRequests();
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
    <link rel="stylesheet" href="css/requestProcessing.css">
    <script src="./js/requestProcessing.js"></script>

</head>
<body>
    <?php include '_header.php'; ?>

    <div class="container">
        <aside class="sidebar">
            <ul>
                <a href="./dashboard.php"><li><i class="material-icons">home</i>Home</li></a>
                <a href="./applicationProcessing.php"><li><i class="material-icons">assignment</i>Application Processing</li></a>
                <a href="#" class="currentPage"><li><i class="material-icons">home_repair_service</i>Request Processing</li></a>
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
                <h1 class="title">Service Request Processing</h1>
            </header>

            <section>
                <div class="top">
                    <h2>Requests</h2>
                    <div>
                        <?php include 'requestSearchForm.php'; ?>
                    </div>
                    <div>
                        <button class="btn-delete">Delete Rejected Applicants</button>
                    </div>
                </div>
                <div class="controls">
                    <i class="material-icons">filter_list</i>
                    <h3>Filter By:</h3>
                    <a href="./requestProcessing.php?filter=all" class="<?php if($filter == 'all'){echo 'active';} ?>  filter-all">All</a>
                    <a href="./requestProcessing.php?filter=rejected" class="<?php if($filter == 'rejected'){echo 'active';} ?> filter-rejected">Rejected</a>
                    <a href="./requestProcessing.php?filter=pending" class="<?php if($filter == 'pending'){echo 'active';} ?> filter-pending">Pending</a>
                    <a href="./requestProcessing.php?filter=progress" class="<?php if($filter == 'progress'){echo 'active';} ?> filter-progress">In Progress</a>
                    <a href="./requestProcessing.php?filter=completed" class="<?php if($filter == 'completed'){echo 'active';} ?> filter-completed">Completed</a>
                </div>
                <table id = "table">
                    <colgroup>
                        <col style="width: 20%">
                        <col style="width: 20%">
                        <col style="width: 20%">
                        <col style="width: 20%">
                        <col style="width: 20%">
                    </colgroup>
                    <thead>
                        <tr>
                        <th class="sort-by" id ="dateSubmittedHeader"> Date Submitted</th><th>Request ID</th><th>Resident ID</th> <th>Resident Name</th> <th>Service Type</th> <th>Status</th> <th></th>
                        </tr> 
                    </thead>
                    <tbody class = "tableData">
                            <?php echo $tableData; ?>     
                    </tbody>
                </table>
            </section>
                
        </main>
    </div>

    <?php include '_footer.php' ?>
</body>
</html>