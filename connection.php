<?php

// connecting to the database

$server = "localhost";
$username = "root";
$password = "";
$database = "vertexhacks";

// query for making connection to the database

$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn){

    die("Error". mysqli_connect_error());
}

?>