<?php

$name = $_POST['Name'];
$vilage = $_POST['Village'];
$email = $_POST['Email'];
$con = new mysqli("localhost", "root", "", "nodedemo") or die("Connection failed");

$query = "INSERT into users(Name,Village,Email) values('$name','$vilage','$email')";
// $result = $con->query($query) or die('Connection failed');
if ($con->query($query)) {
    echo 1;
} else {
    echo 0;
}
