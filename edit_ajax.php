<?php
include 'mysqli.config.php';
$user_id = $_POST["id"];
$user_name = $_POST["name"];
$user_village = $_POST["village"];
$user_email = $_POST["email"];

// $con = new mysqli("localhost", "root", "", "nodedemo") or die("Connection failed");

$query = "UPDATE users set Name='$user_name',Village='$user_village',Email='$user_email' where id=$user_id";
if ($con->query($query)) {
    echo 1;
} else {
    echo 0;
}
