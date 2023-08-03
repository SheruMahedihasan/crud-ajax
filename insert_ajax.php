<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Ajax Crud</title>
    <script>
        // $(document).ready(function() {
        //     $("#load_btn").on("click", function(e) {
        //         $.ajax({
        //             type: "POST",
        //             url: "demo.php",
        //             success: function(data) {
        //                 $("#tbl_load").html(data);
        //             }
        //         });
        //     });
        // });

        $(document).ready(function() {

            // load table on page
            function loadtable() {
                $.ajax({
                    type: "POST",
                    url: "demo.php",
                    success: function(data) {
                        $("#tbl_load").html(data);
                    }
                });
            }
            loadtable(); // load table on page


            // Insert new record
            $("#save_btn").on("click", function(e) {
                e.preventDefault();
                var name_var = $("#name").val();
                var village_var = $("#village").val();
                var email_var = $("#email").val();
                if (name_var == "" || village_var == "" || email_var == "") {
                    $("#error_msg").fadeIn();
                    $("#error_msg").html("All field are required.");
                    setTimeout(function() {
                        $("#error_msg").fadeOut();
                    }, 2000);

                } else {
                    $.ajax({
                        url: "insert_query.php",
                        type: "POST",

                        data: {
                            Name: name_var,
                            Village: village_var,
                            Email: email_var
                        },
                        success: function(data) {
                            if (data == 1) {
                                loadtable();
                                $("#addform").trigger("reset");
                                $("#success_msg").fadeIn();
                                $("#success_msg").html("Successfully data inserted.");
                                setTimeout(function() {
                                    $("#success_msg").fadeOut();
                                }, 2000);

                            } else {
                                x
                                $("#success_msg").slideUp();
                            }
                        }
                    });
                }
            });



            //  Delete record
            $(document).on("click", ".delete_btn", function() {
                if (confirm("Do you want to delete this record ?")) {


                    var d_id = $(this).data("id");
                    var element = this;

                    $.ajax({
                        url: "delete_ajax.php",
                        type: "POST",
                        data: {
                            id: d_id
                        },
                        success: function(data) {
                            if (data == 1) {
                                $(element).closest("tr").fadeOut();
                            } else {
                                $("#error_msg").fadeIn();
                                $("#error_msg").html("Can't Delete Record.");
                                setTimeout(function() {
                                    $("#error_msg").fadeOut();
                                }, 2000);

                            }
                        }
                    });
                }
            });



            // Edit record
            $(document).on("click", ".edit_btn", function() {
                $("#modal").show();
                var e_id = $(this).data("eid");

                $.ajax({
                    url: "update_ajax.php",
                    type: "POST",
                    data: {
                        id: e_id
                    },
                    success: function(data) {
                        $("#modal-form table").html(data);
                    }
                });
            });



            //hide modal

            $("#close_btn").on("click", function() {
                $("#modal").hide();
            });
            // $("#save_btn").on("click", function() {
            // $("#exampleModal").hide();
            // $("#tbl_load").fadeIn();
            // });
            $(document).on("click", "#save_btn", function() {
                location.href = "insert_ajax.php";
            });


            // save update form
            $(document).on("click", "#edit_submit", function() {
                var u_id = $("#edit_id").val();
                var u_name = $("#edit_name").val();
                var u_vilage = $("#edit_village").val();
                var u_email = $("#edit_email").val();

                $.ajax({
                    url: "edit_ajax.php",
                    type: "POST",
                    data: {
                        id: u_id,
                        name: u_name,
                        village: u_vilage,
                        email: u_email
                    },
                    success: function(data) {
                        if (data == 1) {
                            $("#modal").hide();
                            loadtable(); // load table on page
                        }
                    }
                });
            });


            // Live search 
            $("#search").on("keyup", function() {
                var search_term = $(this).val();
                $.ajax({
                    url: "live_search_ajax.php",
                    type: "POST",
                    data: {
                        search: search_term
                    },
                    success: function(data) {
                        $("#tbl_load").html(data);
                    }
                });
            });





        });
    </script>
</head>

<body>


    <div class="container table-responsive d-grid justify-content-center">

        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-white">
                        <h5 class="modal-title" id="exampleModalLabel">Insert User</h5>
                        <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body ">
                        <div class="container">
                            <td id="tbl_form">
                                <form id="addform">
                                    <div class="col-md-12 ">
                                        <div class="col-md-12 text-center input-group">
                                            <!-- <label for="">Name</label> -->
                                            <span class='input-group-text'>Name</span>
                                            <input type="text" class="form-control" name="name" id="name">
                                        </div><br>
                                        <div class="col-md-12 text-center input-group">
                                            <!-- <label for="">Village</label> -->
                                            <span class='input-group-text'>Village</span>
                                            <input type="text" class="form-control" name="village" id="village">
                                        </div><br>
                                        <div class="col-md-12 text-center input-group">
                                            <!-- <label for="">Email</label> -->
                                            <span class='input-group-text'>Email</span>
                                            <input type="email" class="form-control" name="email" id="email"><br>
                                        </div>
                                    </div><br>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <input type="button" value="Save" id="save_btn" class="bg-success">
                                    </div>
                                </form>
                            </td>
                        </div>



                    </div>

                </div>
            </div>
        </div>






        <!-- <div class="col-md-12"> -->

        <!-- <form action="demo.php" method="post"> -->
        <div id="search_bar" class="col-md-12 bg-secondary-subtle">

            <div class="col-md-auto text-end">
                <label for="">Search :</label>
                <input type="text" name="" id="search" autocomplete="off">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Insert
                </button>
            </div>
        </div>
        <table>
            <tr>
                <!-- <td id="tbl_form">
                    <form id="addform">
                        Name<input type="text" name="name" id="name">
                        Village<input type="text" name="village" id="village">
                        Email<input type="email" name="email" id="email"><br>
                        <input type="button" value="Save" id="save_btn">
                    </form>
                </td> -->
            </tr>
            <thead>
                <tr>
                    <td id="tbl_load"></td>
                </tr>

            </thead>
        </table>
        <div id="error_msg"></div>
        <div id="success_msg"></div>





        <div id="modal" class="modal " tabindex="-1" aria-hidden="true" style='display: none;'>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div id="modal-form" class="text-center">
                        <div class="modal-header bg-dark text-light">
                            <h2>Edit Form</h2>
                            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                            <div id="close_btn" style=' margin-left: 200px; cursor: pointer; border-radius: 10px; width: 13px;'><button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button></div>
                        </div>
                        <div class="modal-body">
                            <table>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <!-- </div> -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Insert
        </button>
    </div>
    <!-- <input type="button" value="Load" name="load_btn" id="load_btn"> -->
    <!-- </form> -->









</body>

</html>