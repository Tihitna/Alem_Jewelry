<?php
$hostName = "localhost";
$userName="root";
$password="";
$db="alem_jewlery";
$conn = mysqli_connect($hostName, $userName, $password, $db);

if($conn->connect_error){
    die("Connection failed:".$conn->connect_error);
}
?>