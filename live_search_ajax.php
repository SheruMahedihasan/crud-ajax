<?php
include 'mysqli.config.php';
$search_val = $_POST["search"];
$query = "SELECT * from users where Name like '%$search_val%' or Village like '%$search_val%'";
$result = $con->query($query) or die('Connection failed');
$output = "";
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        $output .= " 
         <tr>
            <td> {$row["id"]} </td>
            <td>{$row["Name"]}</td>
            <td>{$row["Village"]}</td>
            <td>{$row["Email"]}</td>
            <td><button class='edit_btn' data-eid='{$row["id"]}' style='background-color:green;'>Edit</button></td>
            <td><button class='delete_btn' data-id='{$row["id"]}' style='background-color:red;'>Delete</button></td>
        </tr>";
    }
} else {
    $output = "<tr><td colspan='6' class='text-center'>No record are here.</td></tr>";
}

mysqli_close($con);
echo $output;
