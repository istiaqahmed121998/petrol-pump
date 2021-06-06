<?php
require_once '../config.php';
if(logged_in()) {
    $sql = "UPDATE managerinfo SET manager_name = '" . clean($_POST["manager_name"]) . "', phone_number= '" . clean($_POST["manager_phone"]) . "',shift='" . clean($_POST["shift"]) . "' where manager_id='" . clean($_POST["id"]) . "'";
    $result = query($sql);
    confirm($result);
}
else {
    die(header("HTTP/1.0 404 Not Found")); //Throw an error on failure
}
?>