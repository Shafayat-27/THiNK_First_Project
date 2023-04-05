<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "tempsensor02";

$conn = mysqli_connect($host,$username,$password,$dbname);

if(!$conn)
{
    die("Connection Failed: " . mysqli_connect_error());
}


?>