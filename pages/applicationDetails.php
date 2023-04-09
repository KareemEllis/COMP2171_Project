<?php

include 'classAutoloader.php';

$loginManagement = new LoginManagement();
$applicationManagement = new ApplicationManagement();
$authentification = new Authentification();

$loginManagement->startSession();

$application_to_view = $applicationManagement->findApplicant($_GET['id']);

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
    <title><?php echo $application_to_view->getPersonalDetails()->getFirstName() . " " . $application_to_view->getPersonalDetails()->getLastName(); ?></title>
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="shortcut icon" href="../resources/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/applicationDetails.css">

    <script src="./js/applicationDetails.js"></script>
</head>
<body>
    <?php include '_header.php'; ?>

    <div class="container">
        <aside class="sidebar">
            <ul>
                <a href="./dashboard.php"><li><i class="material-icons">home</i>Home</li></a>
                <a href="./applicationProcessing.php" class="currentPage"><li><i class="material-icons">assignment</i>Application Processing</li></a>
                <a href="./requestAddForm.php"><i class="material-icons">build</i>Request Service</a>
                <a href="./requestProcessing.php"><li><i class="material-icons">home_repair_service</i>Request Processing</li></a>
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
                <div class="top">
                    <div>
                        <h2><?php echo $application_to_view->getPersonalDetails()->getFirstName() . " " . $application_to_view->getPersonalDetails()->getMiddleInitial() . " " . $application_to_view->getPersonalDetails()->getLastName(); ?></h2>
                        <h3>Application # <span class="ID"><?php echo $application_to_view->getApplicantID(); ?></span></h3>
                    </div>
                    <div>
                        <button class="btn-accept">Accept</button>
                        <button class="btn-reject">Reject</button>
                        <button class="btn-pending">Pending</button>
                    </div>
                </div>
                
                <h3>Application Status: 
                    <span class="status <?php echo $application_to_view->getApplication()->getStatus(); ?> "> 
                        <?php echo $application_to_view->getApplication()->getStatus(); ?>
                    </span>
                </h3>

                <h3 class="category-title">Personal Information</h3>
                <div class="category personalInfo">
                    <div class="category-box">
                        <h4>Gender: </h4> <p> <?php echo $application_to_view->getPersonalDetails()->getGender(); ?> </p>
                    </div>
                    <div class="category-box">
                        <h4>DOB: </h4> <p> <?php echo $application_to_view->getPersonalDetails()->getDOB(); ?> </p>
                    </div>
                    <div class="category-box">
                        <h4>Nationality: </h4> <p> <?php echo $application_to_view->getPersonalDetails()->getNationality(); ?> </p>
                    </div>
                    <div class="category-box">
                        <h4>Marital Status: </h4> <p> <?php echo $application_to_view->getPersonalDetails()->getMaritalStatus(); ?> </p>
                    </div>
                    <div class="category-box">
                        <h4>Family Type: </h4> <p> <?php echo $application_to_view->getPersonalDetails()->getFamilyType(); ?> </p>
                    </div>
                </div>
                
                <h3 class="category-title">Contact Information</h3>
                <div class="category contactInfo">
                    <div class="category-box">
                        <h4>Email Address: </h4> <p> <?php echo $application_to_view->getPersonalDetails()->getEmailAddress(); ?> </p>
                    </div>
                    <div class="category-box">
                        <h4>Home Address: </h4> <p> <?php echo $application_to_view->getPersonalDetails()->getHomeAddress(); ?> </p>
                    </div>
                    <div class="category-box">
                        <h4>Mailing Address: </h4> <p> <?php echo $application_to_view->getPersonalDetails()->getMailingAddress(); ?> </p>
                    </div>
                </div>
                
                <h3 class="category-title">Emergency Contact</h3>
                <div class="category emergencyContactInfo">
                    <div class="category-box">
                        <h4>Name: </h4><p> <?php echo $application_to_view->getEmergencyContactDetails()->getName(); ?> </p>
                    </div>
                    <div class="category-box">
                        <h4>Relationship: </h4><p> <?php echo $application_to_view->getEmergencyContactDetails()->getRelationship(); ?> </p>
                    </div>
                    <div class="category-box">
                        <h4>Phone: </h4><p> <?php echo $application_to_view->getEmergencyContactDetails()->getPhone(); ?> </p>
                    </div>
                    <div class="category-box">
                        <h4>Email: </h4><p> <?php echo $application_to_view->getEmergencyContactDetails()->getEmail(); ?> </p>
                    </div>
                    <div class="category-box">
                        <h4>Address: </h4><p> <?php echo $application_to_view->getEmergencyContactDetails()->getAddress(); ?> </p>
                    </div>
                </div>
      
                <h3 class="category-title">Education</h3>
                <div class="category educationInfo">
                    <div class="category-box">
                        <h4>Student ID: </h4> <p> <?php echo $application_to_view->getEducationDetails()->getStudentID(); ?> </p>
                    </div>
                    <div class="category-box">
                        <h4>Level of Study: </h4> <p> <?php echo $application_to_view->getEducationDetails()->getLevelOfStudy(); ?> </p>
                    </div>
                    <div class="category-box">
                        <h4>Year of Study: </h4> <p> <?php echo $application_to_view->getEducationDetails()->getYearOfStudy(); ?> </p>
                    </div>
                    <div class="category-box">
                        <h4>Programme: </h4> <p> <?php echo $application_to_view->getEducationDetails()->getProgramme(); ?> </p>
                    </div>
                    <div class="category-box">
                        <h4>Faculty: </h4> <p> <?php echo $application_to_view->getEducationDetails()->getFaculty(); ?> </p>
                    </div>
                    <div class="category-box">
                        <h4>School: </h4> <p> <?php echo $application_to_view->getEducationDetails()->getSchool(); ?> </p>
                    </div>
                </div>
                
                <h3 class="category-title">Accommodation</h3>
                <div class="category accommodationInfo">
                    <div class="category-box">
                        <h4>Room Type: </h4> <p> <?php echo $application_to_view->getRoomType(); ?> </p>
                    </div>
                    <div class="category-box">
                        <h4>Roommate Preference: </h4> <p> <?php echo $application_to_view->getRoommatePreference(); ?> </p>
                    </div>
                </div>  
                
            </section>
                
        </main>
    </div>

    <?php include '_footer.php' ?>
</body>
</html>