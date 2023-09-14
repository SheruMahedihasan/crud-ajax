<?php
include 'mysqli.config.php';

$query = "SELECT * FROM `users` ORDER BY `id` DESC";
$result = $con->query($query) or die('Connection failed');
$output = "";
if (mysqli_num_rows($result) > 0) {

    $id = mysqli_num_rows($result);

    while ($row = mysqli_fetch_assoc($result)) {
        $output .= " 
       <tr>
            <td> {$id} </td>
            <td>{$row["Name"]}</td>
            <td>{$row["Village"]}</td>
            <td>{$row["Email"]}</td>
            <td><button class='edit_btn' data-eid='{$row["id"]}' style='background-color:green;color:white'>Edit</button></td>
            <td><button class='delete_btn' data-id='{$row["id"]}' style='background-color:red;color:white'>Delete</button></td>
        </tr>";
        $id -= 1;
    }
    mysqli_close($con);
    echo $output;
}
