<?php
include 'mysqli.config.php';
$user_id = $_POST["id"];

$query = "DELETE from users where id = $user_id";
if ($con->query($query)) {
    echo 1;
} else {
    echo 0;
}
