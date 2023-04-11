<?php

include 'classAutoloader.php';

$requestManager = new requestManager();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['ID'];
    $search_type = $_POST['search_type'];

    if ($search_type == 'residentID') {
        $dataToDisplay = $requestManager->displayRequestsBySearch($id, 'residentID');
    } elseif ($search_type == 'requestID') {
        $dataToDisplay = $requestManager->displayRequestsBySearch($id, 'requestID');
    } 
    echo $dataToDisplay;
    exit();
}

?>
