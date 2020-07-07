<?php  
session_start();
$host = "localhost";
$user = "root";
$pass = "";
$db = "information_system";

$con = new mysqli($host,$user,$pass,$db) or die("Could not connect");

?>