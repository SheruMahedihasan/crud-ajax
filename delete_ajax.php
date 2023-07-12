<?php

$user_id = $_POST["id"];

$con = new mysqli("localhost", "root", "", "nodedemo") or die("Connection failed");

$query = "DELETE from users where id = $user_id";
if ($con->query($query)) {
    echo 1;
} else {
    echo 0;
}
