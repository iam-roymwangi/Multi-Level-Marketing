<?php
include('php-includes/check-login.php');
include('php-includes/connect.php');




//Add new product



?>
<?php
//Clicked on send buton


//Pin generate

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Mlml Website - Update Status</title>

    <link rel="stylesheet" href="/admin/css/style.css">
    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">



</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include('php-includes/menu.php'); ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Admin - Update Status</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->




                <div class="row">
                    <div class="col-lg-8" id="searchResult">

                        <form method="POST">
                            <div class="form-col">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Distributor ID</label>
                                    <input type="text" class="form-control" id="id_search" placeholder="Distributor ID">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Name</label>
                                    <input type="text" class="form-control" placeholder="Name">
                                </div>
                            </div>
                            <br> <br> <br>
                            <h2 style="text-decoration: underline;">Current Status</h2>
                            <div class="form-col">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Current Rating</label>
                                    <input type="text" class="form-control" placeholder="Current Status">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Current WTO</label>
                                    <input type="text" class="form-control" placeholder="Current WTO">
                                </div>
                            </div>

                            <br> <br> <br>
                            <h2 style="text-decoration: underline;">Proposed Status</h2>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Proposed Rating</label>
                                    <input type="text" class="form-control" placeholder="Proposed Status">
                                </div>

                            </div>

                            <div class="form-group col-md-3">
                                <button  type="submit" name="update_status" class="btn btn-primary form-control">Update Status</button>
                            </div>
                        </form>

                    </div>

                    <!-- /#page-wrapper -->

                </div>
                <!-- /#wrapper -->

                <!-- jQuery -->
                <script src="vendor/jquery/jquery.min.js"></script>

                <!-- Bootstrap Core JavaScript -->
                <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

                <!-- Metis Menu Plugin JavaScript -->
                <script src="vendor/metisMenu/metisMenu.min.js"></script>

                <!-- Custom Theme JavaScript -->
                <script src="dist/js/sb-admin-2.js"></script>


                <script>
                    $(document).ready(function() {

                        $("#id_search").keyup(function() {
                            var input = $(this).val();
                            //  alert(input);

                            if (input != "000" && input != "00" && input != "0") {
                                $.ajax({

                                    url: "php-includes/updates/livesearch.php",
                                    method: "POST",
                                    data: {
                                        input: input
                                    },

                                    success: function(data) {
                                        $("#searchResult").html(data);
                                    }

                                });
                            }

                        });
                    });
                </script>

</body>

</html>