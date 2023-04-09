<?php

include 'classAutoloader.php';

$requestManager= new requestManager();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['ID'];
    $dataToDisplay = $requestManager->displayRequestsBySearch($id);
    echo $dataToDisplay;
    exit();
}


?>