<?php

include 'classAutoloader.php';

$applicationManagement = new ApplicationManagement();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['ID'];
    $newStatus = $_POST['status'];
    $applicationManagement->updateApplicationStatus($id, $newStatus);
    echo "Updated";
    exit();
}

?>