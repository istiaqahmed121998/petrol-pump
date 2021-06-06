<?php
require_once '../config.php';
if(logged_in()) {
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['name']) && isset($_POST['shift']) && isset($_POST['phone'])){
            $sql="INSERT into managerinfo (manager_name, phone_number, shift) VALUES ('".clean($_POST['name'])."','".clean($_POST['shift'])."','".clean($_POST['phone'])."')";
            $result=query($sql);
            confirm($result);
        }
    }
}
?>
