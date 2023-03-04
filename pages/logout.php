<?php

include 'classAutoloader.php';

$loginManagement = new LoginManagement();
$loginManagement->startSession();

$loginManagement->logout();

exit();

?>