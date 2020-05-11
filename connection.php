<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clcms";



$con = mysqli_connect($servername, $username, $password, $dbname);

if(!$con)
{
    die("connection failed because ".mysqli_connect_error());
}

?>