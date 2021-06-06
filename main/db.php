<?php
$databaseHost="localhost";
$databaseUser="sadegfhp_fahimkhan";
$databaseName="sadegfhp_filling_station";
$databasePassword="Zj@01712274429";

$connection=mysqli_connect($databaseHost, $databaseUser, $databasePassword, $databaseName);

function escape($string){
    global $connection;
    return mysqli_real_escape_string($connection,$string);
}
function row_count($result){
    return mysqli_num_rows($result);
}
function query($query){
    global $connection;
    return mysqli_query($connection,$query);
}
function confirm($result){
    global $connection;
    if(!$result){
        die(mysqli_error());
    }
}
function fetch_array($result){
    global $connection;
    return mysqli_fetch_array($result);
}

?>