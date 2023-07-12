<?php
// echo "hehje";
// exit;
$con = new mysqli("localhost", "root", "", "nodedemo") or die("Connection failed");

$query = "SELECT * from users";
$result = $con->query($query) or die('Connection failed');
// $row = mysqli_fetch_assoc($result);
$output = "";
if (mysqli_num_rows($result) > 0) {
    $output = '
    <div class="table-responsive d-flex justify-content-center">
<table border="1" class="table table-hover table-bordered">
<thead>
    <tr class="table-dark">
        <td scope="col">Id</td>
        <td scope="col">Name</td>
        <td scope="col">Village</td>
        <td scope="col">Email</td>
        <td scope="col">Edit</td>
        <td scope="col">Delete</td>
    </tr>
    </thead>';



    while ($row = mysqli_fetch_assoc($result)) {

        $output .= " 
        <tbody class='table-secondary'>  <tr>
            <td> {$row["id"]} </td>
            <td>{$row["Name"]}</td>
            <td>{$row["Village"]}</td>
            <td>{$row["Email"]}</td>
            <td><button class='edit_btn' data-eid='{$row["id"]}' style='background-color:green;'>Edit</button></td>
            <td><button class='delete_btn' data-id='{$row["id"]}' style='background-color:red;'>Delete</button></td>
        </tr>";
    }
    $output .= "</tbody></table>
    </div>";
    mysqli_close($con);
    echo $output;
}
