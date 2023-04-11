<?php

include 'classAutoloader.php';

$residentManager = new ResidentManager();
$loginManagement = new LoginManagement();
$authentification = new Authentification();
$roomManager = new RoomManager();


$loginManagement->startSession();

if ($loginManagement->checkIfLoggedIn() == false) {
    header("Location: ./login.php");
}
if ($authentification->authApplicationProcessing() == false) {
    header("Location: ./dashboard.php");
}


// check if id is set, fetch record of user
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $resident = $residentManager->findResident($id);
} else {
    die('No data found');
}

// get rooms to show in the dropdown
$rooms = $roomManager->getRoomsList();



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Resident</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="shortcut icon" href="../resources/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/update-resident.css">
    <script src="./js/updateResident.js"></script>
</head>

<body>
    <?php include '_header.php'; ?>

    <div class="container">
        <?php include '_navigation.php'; ?>

        <!-- ENTER CODE HERE -->
        <main class="resident_page">
            <header>
                <h1 class="title">Update Resident</h1>
            </header>

            <section>
                <form id="update_resident_form">
                    <input type="hidden" name="r_id" value="<?= $resident['Resident ID'] ?>">
                    <div class="mb-4">

                        <label for="">Select Position</label>
                        <select name="position" id="">
                            <option value="">Select position</option>
                            <option <?= ($resident['Position']) == 'Standard Resident' ? 'selected' : '' ?>
                                value="Standard Resident">Standard Resident</option>
                            <option <?= ($resident['Position']) == 'Block Representative' ? 'selected' : '' ?>
                                value="Block Representative">Block Representative
                            </option>
                            <option <?= ($resident['Position']) == 'Resident Advisor' ? 'selected' : '' ?>
                                value="Resident Advisor">Resident Advisor
                            </option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="">First Name</label>
                        <input type="text" name="first_name" placeholder="First Name"
                            value="<?= $resident['First Name'] ?>">
                    </div>
                    <div class="mb-4">
                        <label for="">Last Name</label>
                        <input type="text" name="last_name" placeholder="Last Name"
                            value=" <?= $resident['Last Name'] ?>">
                    </div>
                    <div class="mb-4">
                        <label for="">Nationality</label>
                        <input type="text" name="nationality" value="<?= $resident['Nationality'] ?>">
                    </div>
                    <div class="mb-4">
                        <label for="">Select Gender</label>
                        <select name="gender" id="">
                            <option value="">Select Gender</option>
                            <option <?= ($resident['Gender']) == 'Male' ? 'selected' : '' ?> value="Male">Male</option>
                            <option <?= ($resident['Gender']) == 'Female' ? 'selected' : '' ?> value="Female">Female
                            </option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="">Marital Status</label>
                        <select name="marital_status" id="">
                            <option value="">Marital Status</option>
                            <option <?= ($resident['Marital Status']) == 'Single' ? 'selected' : '' ?> value="Single">
                                Single</option>
                            <option <?= ($resident['Marital Status']) == 'Married' ? 'selected' : '' ?> value="Married">
                                Married
                            </option>
                            <option <?= ($resident['Marital Status']) == 'Divorced' ? 'selected' : '' ?> value="Divorced">
                                Divorced
                            </option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="">Family Type</label>
                        <select name="family_type" id="">
                            <option value="">Family Type</option>
                            <option <?= ($resident['Family Type']) == 'Nuclear' ? 'selected' : '' ?> value="Nuclear">
                                Nuclear</option>
                            <option <?= ($resident['Family Type']) == 'Single' ? 'selected' : '' ?> value="Single">
                                Single
                            </option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="">Dob</label>
                        <input type="date" name="dob" value="<?= $resident['DOB'] ?>">
                    </div>
                    <div class="mb-4">
                        <label for="">Middle Initial</label>
                        <input type="text" name="middle_initial" placeholder="Middle Initial"
                            value="<?= $resident['Middle Initial'] ?>">
                    </div>
                    <div class="mb-4">
                        <label for="">Home Address</label>
                        <textarea name="home_address" id="" cols="30"
                            rows="10"><?= $resident['Home Address'] ?></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="">Telephone Number</label>
                        <input type="number" name="phone_number" placeholder="Telephone Number"
                            value="<?= $resident['Phone Number'] ?>">
                    </div>

                    <div class="mb-4">
                        <label for="">Mailing Address</label>
                        <input type="text" name="mail_address" placeholder="Mailing Address"
                            value="<?= $resident['Mailing Address'] ?>">
                    </div>

                    <div class="mb-4">
                        <label for="">ID Number</label>
                        <input type="number" name="id_number" placeholder="ID Number"
                            value="<?= $resident['ID Number'] ?>">
                    </div>

                    <div class="mb-4">
                        <label for="">Level of Study</label>
                        <select name="study_level" id="">
                            <option value="">Level of Study</option>
                            <option <?= ($resident['Level of Study']) == 'Graduate' ? 'selected' : '' ?> value="Graduate">
                                Graduate</option>
                            <option <?= ($resident['Level of Study']) == 'Undergraduate' ? 'selected' : '' ?>
                                value="Undergraduate">
                                Undergraduate
                            </option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="">Year of Study</label>
                        <input type="text" name="year_of_study" placeholder="Year of Study"
                            value="<?= $resident['Year of Study'] ?>">
                    </div>


                    <div class="mb-4">
                        <label for="">Programme Name</label>
                        <input type="text" name="programme_name" placeholder="Programme Name"
                            value="<?= $resident['Programme Name'] ?>">
                    </div>

                    <div class="mb-4">
                        <label for="">Faculty Name</label>
                        <input type="text" name="faci" placeholder="Faculty Name"
                            value="<?= $resident['Faculty Name'] ?>">
                    </div>
                    <div class="mb-4">
                        <label for="">Name of School</label>
                        <input type="text" name="school_nam" placeholder="Name of School"
                            value="<?= $resident['Name of School'] ?>">
                    </div>

                    <hr>
                    <hr>
                    <div class="mb-4">
                        <label for="">Contact Name</label>
                        <input type="text" name="contact_name" placeholder="Contact Name"
                            value="<?= $resident['Contact Name'] ?>">
                    </div>

                    <div class="mb-4">
                        <label for="">Contact Relationship</label>
                        <input type="text" name="contact_relation" placeholder="Contact Relationship"
                            value="<?= $resident['Contact Relationship'] ?>">
                    </div>

                    <div class="mb-4">
                        <label for="">Contact Telephone</label>
                        <input type="text" name="contact_telephone" placeholder="Contact Telephone"
                            value="<?= $resident['Contact Telephone'] ?>">
                    </div>

                    <div class="mb-4">
                        <label for="">Contact Address</label>
                        <textarea name="contact_address" id="" cols="30"
                            rows="10"><?= $resident['Contact Address'] ?></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="">Contact Email</label>
                        <input type="text" name="contact_email" placeholder="Contact Email"
                            value="<?= $resident['Contact Email'] ?>">
                    </div>



                    <div class="mb-4">
                        <button type="submit">Update Record</button>
                    </div>
                </form>

            </section>

        </main>
    </div>

    <?php include '_footer.php' ?>
</body>

</html>