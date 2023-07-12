<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Document</title>
    <script>
        $(document).ready(function() {
            $("#load_btn").on("click", function(e) {
                $.ajax({
                    type: "POST",
                    url: "demo.php",
                    success: function(data) {
                        $("#tbl_load").html(data);
                    }
                });
            });
        });
    </script>
</head>

<body>
    <!-- <form action="demo.php" method="post"> -->

    <table>
        <thead>
            <tr>
                <td id="tbl_load"></td>
            </tr>

        </thead>
    </table>
    <input type="button" value="Load" name="load_btn" id="load_btn">
    <!-- </form> -->
</body>

</html>