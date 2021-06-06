<?php
require_once '../config.php';
if(logged_in()) {
    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        $sql="SELECT * from expense_details";
        $result=query($sql);
        confirm($result);
        if(row_count($result)>=1){
            $array=array();

            while($row = fetch_array($result)){
                $expense = array("Date"=>$row['date'], "Time"=>$row['time'], "Reasons"=>$row['reason'],"Amount"=>$row['amount'],"Option"=>$row['id']);
                $array[]=$expense;
            }

            $json_data = array(
                "draw"            => intval( count($array)),
                "recordsTotal"    => intval( count($array) ),
                "recordsFiltered" => intval(count($array)),
                "data"            => $array
            );

            echo json_encode($json_data);
        }
    }
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['id'])){
            $sql="SELECT * from expense_details where id='".clean($_POST['id'])."'";
            $result=query($sql);
            confirm($result);
            if(row_count($result)>=1){
                $row = fetch_array($result);

                $json_data = array(
                    "data"=> $expense = array("Date"=>$row['date'], "Time"=>$row['time'], "Reasons"=>$row['reason'],"Amount"=>$row['amount'],"Option"=>$row['id'])
                );

                echo json_encode($json_data);
            }
        }
        if(isset($_POST['date']) && isset($_POST['time']) && isset($_POST['reasons']) && isset($_POST['amount'])){
            $sql="INSERT into expense_details (reason, amount, date, time) VALUES ('".clean($_POST['reasons'])."','".clean($_POST['amount'])."','".clean($_POST['date'])."','".clean($_POST['time'])."')";
            $result=query($sql);
            confirm($result);
        }
        if(isset($_POST['id']) && isset($_POST['delete'])){
            $sql="DELETE FROM expense_details where id='".clean($_POST["id"])."'";
            $result= query($sql);
            confirm($result);
        }
        if(isset($_POST['id']) && isset($_POST['reason_edit']) &&  isset($_POST['amount_edit'])){
            $sql = "UPDATE expense_details SET reason = '" . clean($_POST["reason_edit"]) . "',amount = '" . clean($_POST["amount_edit"]) . "' where id='" . clean($_POST["id"]) . "'";
            $result= query($sql);
            confirm($result);
        }
    }
}
else {
    die(header("HTTP/1.0 404 Not Found")); //Throw an error on failure
}
?>