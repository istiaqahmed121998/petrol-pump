<?php
require_once '../config.php';
if(logged_in()) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $sql = "UPDATE today_stock SET diesel_stock = '".clean($_POST["diesel_stock"]) ."', octane_stock = '".clean($_POST["octane_stock"]) ."',mobil_stock='".clean($_POST["mobil_stock"]) ."' WHERE id=1";
        $result=query($sql);
        confirm($result);
    }
}