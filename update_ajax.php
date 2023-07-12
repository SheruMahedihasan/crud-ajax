<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>

</body>

</html>
<?php

$e_id = $_POST["id"];
$con = new mysqli("localhost", "root", "", "nodedemo") or die("Connection failed");

$query = "SELECT * from users where id=$e_id";
$result = $con->query($query) or die('Connection failed');
// $row = mysqli_fetch_assoc($result);
$output = "";
if (mysqli_num_rows($result) > 0) {
    // $output = '';



    while ($row = mysqli_fetch_assoc($result)) {

        $output .= "
        <div class='col-md-12  text-center ms-5'>
            <div class='col-md-12 text-center input-group'>
                <tr>
                    
                    <span class='input-group-text'>id</span>
                    <span class='input-group-text'>{$row["id"]}</span>
                    <td><input type='text'  hidden id='edit_id' value='{$row["id"]}'></td>
                </tr>
            </div><br>
            <div class='col-mb-3 text-center input-group'>
                <tr>
                    <span class='input-group-text'>Name</span>
                    <td><input type='text' class='form-control' aria-describedby='inputGroup-sizing-default' id='edit_name' value='{$row["Name"]}'></td>
                </tr>
            </div><br>
            <div class='col-md-12 text-center input-group'>
                <tr>
                    <span class='input-group-text'>Village</span>
                    <td><input type='text' id='edit_village' class='form-control' value='{$row["Village"]}'></td>
                </tr>
            </div><br>
            <div class='col-md-12 text-center input-group'>
                <tr>
                    <span class='input-group-text'>Email</span>
                    <td><input type='email' id='edit_email' class='form-control' value='{$row["Email"]}'></td>
                </tr>
            </div>
        </div><br>
        <div class='d-grid gap-2 d-md-flex justify-content-md-end'>    
            <tr>
                <td></td>
                <td><input type='submit' id='edit_submit' value='save'></td>
            </tr>
        </div>";
    }
    mysqli_close($con);
    echo $output;
}
