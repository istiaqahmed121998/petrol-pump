<?php
require_once '../config.php';
if(logged_in()) {
    if($_POST['password']===''){
        $sql = "UPDATE user_info SET email = '" . clean($_POST["email"]) . "',name = '" . clean($_POST["name"]) . "',phone='" . clean($_POST["phone"]) . "',address='" . clean($_POST["address"]) . "' where id='" . clean($_SESSION["id"]) . "'";
    }
    else{
        $sql = "UPDATE user_info SET email = '" . clean($_POST["email"]) . "',name = '" . clean($_POST["name"]) . "',phone='" . clean($_POST["phone"]) . "',address='" . clean($_POST["address"]) . "',password='" . md5(clean($_POST["password"])) . "' where id='" . clean($_SESSION["id"]) . "'";
    }

    $result = query($sql);
    confirm($result);
}
else {
    die(header("HTTP/1.0 404 Not Found")); //Throw an error on failure
}
?>