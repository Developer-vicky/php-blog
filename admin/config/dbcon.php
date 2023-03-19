<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "server_blog";

$conn = mysqli_connect("$host","$username","$password","$database");

if(!$conn)
{
    header("Location: ../errors/dberror.php");
    die();
}

?>