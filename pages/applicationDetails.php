<?php
session_start();

// if(!isset($_SESSION['id'])){
//     session_destroy();
//     header('Location: index.php');
//     exit;
// }
include 'classAutoloader.php';

$applicationList = new ApplicationListing();

$application_to_view = $applicationList->findApplication($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application View<?php //echo $application_to_view->getFirstName() . " " . $application_to_view->getLastName(); ?></title>
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="shortcut icon" href="../resources/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/applicationDetails.css">
</head>
<body>
    <?php include '_header.php'; ?>

    <div class="container">
        <aside class="sidebar">
            <ul>
                <a href="./dashboard.php"><li><i class="material-icons">home</i>Home</li></a>
                <a href="./applicationProcessing.php" class="currentPage"><li><i class="material-icons">assignment</i>Application Processing</li></a>
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
                <h2>Name: <?php echo $application_to_view->getFirstName() . " " . $application_to_view->getMiddleInitial() . " " . $application_to_view->getLastName(); ?></h2>
                <h3>Application #<?php echo $application_to_view->getApplicationID(); ?></h3>
                <h4>DOB: </h4> <p> <?php echo $application_to_view->getDOB(); ?> </p>
                <h4>Nationality: </h4> <p> <?php echo $application_to_view->getNationality(); ?> </p>
                <h4>Gender: </h4> <p> <?php echo $application_to_view->getGender(); ?> </p>
                <h4>Marital Status: </h4> <p> <?php echo $application_to_view->getMaritalStatus(); ?> </p>
                <h4>Family Type: </h4> <p> <?php echo $application_to_view->getFamilyType(); ?> </p>
                <h4>Home Address: </h4> <p> <?php echo $application_to_view->getHomeAddress(); ?> </p>
                <h4>Mailing Address: </h4> <p> <?php echo $application_to_view->getMailingAddress(); ?> </p>
                <h4>Email Address: </h4> <p> <?php echo $application_to_view->getEmailAddress(); ?> </p>
                <h4>Student ID: </h4> <p> <?php echo $application_to_view->getStudentID(); ?> </p>
                <h4>Contact: </h4> 
                    <p>Name: <?php echo $application_to_view->getContact()["name"]; ?> </p>
                    <p>Relationship: <?php echo $application_to_view->getContact()["relationship"]; ?> </p>
                    <p>Phone: <?php echo $application_to_view->getContact()["phone"]; ?> </p>
                    <p>Address: <?php echo $application_to_view->getContact()["address"]; ?> </p>
                    <p>Email: <?php echo $application_to_view->getContact()["email"]; ?> </p>
                <h4>Level of Study: </h4> <p> <?php echo $application_to_view->getLevelOfStudy(); ?> </p>
                <h4>Year of Study: </h4> <p> <?php echo $application_to_view->getYearOfStudy(); ?> </p>
                <h4>Programme: </h4> <p> <?php echo $application_to_view->getProgramme(); ?> </p>
                <h4>Faculty: </h4> <p> <?php echo $application_to_view->getFaculty(); ?> </p>
                <h4>School: </h4> <p> <?php echo $application_to_view->getSchool(); ?> </p>
                <h4>Room Type: </h4> <p> <?php echo $application_to_view->getRoomType(); ?> </p>
                <h4>Roommate Preference: </h4> <p> <?php echo $application_to_view->getRoommatePreference(); ?> </p>
            </section>
                
        </main>
    </div>

    <?php include '_footer.php' ?>
</body>
</html>