<?php

include 'classAutoloader.php';

$requestManager= new requestManager();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['ID'];
    $newStatus = $_POST['status'];
    $requestManager->updateRequestStatus($id, $newStatus);
    echo "Updated";
    exit();
}

?>