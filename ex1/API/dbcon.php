<?php
    $hostname="localhost:3306";
    $dbuserid="testaccount";
    $dbpasswd="password";
    $dbname="testdb";

    $mysqli = new mysqli($hostname, $dbuserid, $dbpasswd, $dbname);
    if ($mysqli->connect_errno) {
        die('Connect Error: '.$mysqli->connect_error);
    }
?>