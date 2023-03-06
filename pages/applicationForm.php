<?php

include 'classAutoloader.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $applicationManagement = new ApplicationManagement();

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $initial = $_POST['initial'];
    $dob = $_POST['dob'];
    $nationality = $_POST['nationality'];
    $gender = $_POST['gender'];
    $maritalStatus = $_POST['maritalStatus'];
    $familyType = $_POST['familyType'];
    $homeAddress = $_POST['homeAddress'];
    $mailingAddress = $_POST['mailingAddress'];
    $email = $_POST['email'];
    $id = $_POST['id'];
    $contactName = $_POST['contactName'];
    $contactRelationship = $_POST['contactRelationship'];
    $contactPhone = $_POST['contactPhone'];
    $contactAddress = $_POST['contactAddress'];
    $contactEmail = $_POST['contactEmail'];
    $levelOfStudy = $_POST['level'];
    $yearOfStudy = $_POST['year'];
    $programme = $_POST['programme'];
    $faculty = $_POST['faculty'];
    $school = $_POST['school'];
    $roomType = $_POST['roomType'];
    $roommatePreference = $_POST['roommatePref'];

    $applicationManagement->addApplicant(
        $fname, $lname, $initial, $dob, $nationality,
        $gender, $maritalStatus, $familyType, $homeAddress, 
        $mailingAddress, $email, $id, $contactName, $contactRelationship,
        $contactPhone, $contactAddress, $contactEmail, $levelOfStudy, $yearOfStudy, 
        $programme, $faculty, $school, $roomType, $roommatePreference
    );

    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>George Alleyne Hall Application</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="./css/applicationForm.css">
    <script src="./js/applicationForm.js"></script>
</head>
<body>
    <main>
        <form action="" method="post">
            <header>
                <img src="../resources/logo.png" alt="George Alleyne Hall Logo" srcset="">
                <h1>Hall Application Form</h1>
            </header>
            <div class="name">
                <div class="box">
                    <label>First Name <span class="required">*</span></label>
                    <input type="text" name="fname" id="fname">
                    <div class="fnameMsg error"></div>
                </div>
                <div class="box">
                    <label>Last Name <span class="required">*</span></label>
                    <input type="text" name="lname" id="lname">
                    <div class="lnameMsg error"></div>
                </div>
            </div>

            <label>Middle Initial</label>
            <input type="text" name="initial" id="initial">

            <label>DOB <span class="required">*</span></label>
            <input type="date" name="dob" id="dob">
            <div class="dobMsg error"></div>

            <label>Nationality <span class="required">*</span></label>
            <input type="text" name="nationality" id="nationality">
            <div class="nationalityMsg error"></div>
            
            <label>Gender</label>
            <select name="gender" id="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            
            <label>Marital Status <span class="required">*</span></label>
            <select name="maritalStatus" id="maritalStatus">
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Widowed">Widowed</option>
                <option value="Divorced">Divorced</option>
                <option value="Separated">Separated</option>
            </select>
            
            <label>Family Type <span class="required">*</span></label>
            <select name="familyType" id="familyType">
                <option value="Nuclear">Nuclear</option>
                <option value="Single-parent">Single-parent</option>
                <option value="Extended">Extended</option>
            </select>
            
            <label>Home Address <span class="required">*</span></label>
            <textarea name="homeAddress" id="homeAddress" cols="30" rows="10"></textarea>
            <div class="homeAddressMsg error"></div>
            
            <label>Mailing Address <span class="required">*</span></label>
            <textarea name="mailingAddress" id="mailingAddress" cols="30" rows="10"></textarea>
            <div class="mailAddressMsg error"></div>
            
            <label>Email Address <span class="required">*</span></label>
            <input type="email" name="email" id="email">
            <div class="emailMsg error"></div>
            
            <label>Student ID <span class="required">*</span></label>
            <input type="number" name="id" id="id">
            <div class="idMsg error"></div>
            
            <label>Emergency Contact</label>
            <hr>
            <div class="contact">
                <label>Name <span class="required">*</span></label>
                <input type="text" name="contactName" id="contactName">
                <div class="contactNameMsg error"></div>

                <label>Relationship <span class="required">*</span></label>
                <input type="text" name="contactRelationship" id="contactRelationship">
                <div class="contactRelationshipMsg error"></div>

                <label>Phone <span class="required">*</span></label>
                <input type="tel" name="contactPhone" id="contactPhone">
                <div class="contactPhoneMsg error"></div>

                <label>Address <span class="required">*</span></label>
                <textarea name="contactAddress" id="contactAddress" cols="30" rows="10"></textarea>
                <div class="contactAddressMsg error"></div>

                <label>Email <span class="required">*</span></label>
                <input type="email" name="contactEmail" id="contactEmail">
                <div class="contactEmailMsg error"></div>
            </div>
            
            <label>Level of Study <span class="required">*</span></label>
            <select name="level" id="level">
                <option value="Undergraduate">Undergraduate</option>
                <option value="Graduate">Graduate</option>
            </select>
            
            <label>Year of Study <span class="required">*</span></label>
            <input type="number" name="year" id="year">
            <div class="yearMsg error"></div>
            
            <label>Programme <span class="required">*</span></label>
            <input type="text" name="programme" id="programme">
            <div class="programmeMsg error"></div>
            
            <label>Faculty <span class="required">*</span></label>
            <input type="text" name="faculty" id="faculty">
            <div class="facultyMsg error"></div>
            
            <label>School <span class="required">*</span></label>
            <input type="text" name="school" id="school">
            <div class="schoolMsg error"></div>
            
            <label>Room Type <span class="required">*</span></label>
            <select name="roomType" id="roomType">
                <option value="Single">Single</option>
                <option value="Double">Double</option>
            </select>
            
            <label>Roommate Preference</label>
            <input type="text" name="roommatePref" id="roommatePref">

            
            <div class="controls">
                <div class="msg"></div>

                <button type="submit">
                    <p>Submit Application</p>
                    <svg class="loading hide" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <style>
                            .spinner_GmWz{animation:spinner_Ctle .8s linear infinite;animation-delay:-.8s}.spinner_NuDr{animation-delay:-.65s}.spinner_OlQ0{animation-delay:-.5s}@keyframes spinner_Ctle{93.75%,100%{opacity:.2}}
                        </style><rect class="spinner_GmWz" x="1" y="4" width="6" height="14"/><rect class="spinner_GmWz spinner_NuDr" x="9" y="4" width="6" height="14"/>
                        <rect class="spinner_GmWz spinner_OlQ0" x="17" y="4" width="6" height="14"/>
                    </svg>
                </button>
            </div>
        </form>
        
    </main>

    <dialog class="modal">
        <h2>Are you sure you want to submit this application?</h2>
        <p>Please confirm the your details before submitting</p>

        <button class="confirm">Confirm</button> <button class="close">Close</button>
    </dialog>
</body>
</html>