<?php
include 'mysqli.config.php';
$name = $_POST['Name'];
$vilage = $_POST['Village'];
$email = $_POST['Email'];

$query = "INSERT into users(Name,Village,Email) values('$name','$vilage','$email')";
if ($con->query($query)) {
    echo 1;
} else {
    echo 0;
}
