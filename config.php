<?php

$server = "localhost";
$user = "root";
$password = "";
$nama_database = "student_registration";

$db = mysqli_connect($server, $user, $password, $nama_database);

if( !$db ){
    die("Failed to connect with database: " . mysqli_connect_error());
}

?>