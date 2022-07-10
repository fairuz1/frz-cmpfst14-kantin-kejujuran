<?php
    $host = "db4free.net";
    $database = "compfest";
    $username = "fairuz1";
    $password = "compfestsea";

    $mysqli = new mysqli($host, $username, $password, $database);
    if ($mysqli->connect_errno){
        die("Connection error: " . $mysqli->connect_err);
    }

    return $mysqli;
?>