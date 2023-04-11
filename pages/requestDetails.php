<?php

include 'classAutoloader.php';

$loginManagement = new LoginManagement();
$requestManager = new RequestManager();
$authentification = new Authentification();

$loginManagement->startSession();

$request_to_view = $requestManager->findRequest($_GET['id']);

if($loginManagement->checkIfLoggedIn() == false){
    header("Location: ./login.php");
}
if($authentification->authApplicationProcessing() == false){
    header("Location: ./dashboard.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $request_to_view->getResident(); ?></title>
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="shortcut icon" href="../resources/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/requestDetails.css">
    <script src="js/requestDetails.js"></script>
</head>
<body>
    <?php include '_header.php'; ?>

    <div class="container">
        <?php include '_navigation.php'; ?>

        <!-- ENTER CODE HERE -->
        <main>
            <header>
                <h1 class="title">Service Request Processing</h1>
            </header>

            <section>
                <div class="top">
                    <div>
                        <h2><?php echo $request_to_view->getResident(); ?></h2>
                        <h3>Request # <span class="ID"><?php echo $request_to_view->getRequestID(); ?></span></h3>
                    </div>
                    <div>
                        <button class="btn-accept">Accept</button>
                        <button class="btn-reject">Reject</button>
                        <button class="btn-pending">Pending</button>
                        <button class="btn-complete">Complete</button>
                    </div>
                </div>
                
                <h3>Request Status: 
                    <span class="status <?php echo $request_to_view->getStatus(); ?> "> 
                        <?php echo $request_to_view->getStatus(); ?>
                    </span>
                </h3>

                <h3 class="category-title">Request Information</h3>
                <div class="category RequestInfo">
                    <div class="category-box">
                        <h4>Date Submitted: </h4> <p> <?php echo $request_to_view->getDateSubmitted(); ?> </p>
                    </div>
                    <div class="category-box">
                        <h4>Resident ID: </h4> <p> <?php echo $request_to_view->getResidentID(); ?> </p>
                    </div>
                    <div class="category-box">
                        <h4>Service Type: </h4> <p> <?php echo $request_to_view->getServiceType(); ?> </p>
                    </div>
                    <div class="category-box">
                        <h4>Appointment Date: </h4> <p> <?php echo $request_to_view->getAppointmentDate(); ?> </p>
                    </div>
                    <div class="category-box">
                        <h4>Appointment Time: </h4> <p> <?php echo $request_to_view->getAppointmentTime(); ?> </p>
                    </div>
                </div>
                
                <h3 class="category-title">Service Details</h3>
                <div class="category Details">
                    <div class="category-box">
                        <?php echo $request_to_view->getDetails(); ?> </p>
                    </div>
                </div>
            </section>
                
        </main>
    </div>

    <?php include '_footer.php' ?>
</body>
</html>