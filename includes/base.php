<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "test";

    $connection = new mysqli($servername, $username, $password, $dbname);
    if($connection->connect_error){
        die("Connection failed: " . $connection->connect_error);
    }
?>