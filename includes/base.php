<?php
    session_start();
    $servername = "107.180.50.164";
    $username = "brianf";
    $password = "alpine";
    $dbname = "projTest";

    $connection = new mysqli($servername, $username, $password, $dbname);
    if($connection->connect_error){
        die("Connection failed: " . $connection->connect_error);
    }
?>