<?php
require_once '../config.php';
if(logged_in()){
    $sql= "SELECT * FROM managerinfo";
    $result= query($sql);
    if(row_count($result)>=1){
        $array=array();
        while($row = fetch_array($result)){
            $manager = array("id"=>$row['manager_id'], "name"=>$row['manager_name'], "phone"=>$row['phone_number'],"shift"=>$row['shift']);
            array_push($array,$manager);
        }

        echo json_encode(array("data"=>$array));
    }

}
else {
    die(header("HTTP/1.0 404 Not Found")); //Throw an error on failure
}

?>