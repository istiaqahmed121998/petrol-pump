<?php
require_once '../config.php';
if(logged_in()){
    $sql= "SELECT id, email, password, name, phone, profile_pic, address FROM user_info where id='".$_SESSION['id']."'";
    $result= query($sql);
    if(row_count($result)>=1){
        $row=fetch_array($result);
        $manager = array("id"=>$row['id'], "name"=>$row['name'], "phone"=>$row['phone'],"email"=>$row['email'],"profile_pic"=>$row['profile_pic'],"address"=>$row['address']);
        echo json_encode(array("data"=>$manager));
    }

}
else {
    die(header("HTTP/1.0 404 Not Found")); //Throw an error on failure
}

?>