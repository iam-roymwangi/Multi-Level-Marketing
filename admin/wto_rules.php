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

    <title>Mlml Website - WTO Rules</title>

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
                        <h1 class="page-header">Admin - WTO Rules</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

                <!-- EDIT FORM -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="modal" id="editmodal" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">WTO RULES</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="php-includes/updates/updates.php" method="POST">
                                        <div class="modal-body">


                                            <input type="hidden" name="update_id" id="update_id">

                                            <div class="form-group">
                                                <label>Star Rating</label>
                                                <input type="text" name="star_rating" id="star_rating" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Minimum WTO</label>
                                                <input type="text" name="min_wto" id="min_wto" class="form-control" required>
                                            </div>

                                        </div>
                                   
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" name="updateRules" class="btn btn-primary">Save changes</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-8">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Star Rating</th>
                                        <th>Minimum WTO (Ksh)</th>
                                        <th>Actions</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $query = mysqli_query($con, "select * from wto_rules ");
                                    if (mysqli_num_rows($query) > 0) {

                                        while ($row = mysqli_fetch_array($query)) {


                                    ?>

                                            <tr>
                                                <td><?php echo $row['star_rating']; ?></td>
                                                <td><?php echo $row['min_wto']; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-success editBtn"> EDIT </button>
                                                </td>



                                            </tr>

                                    <?php


                                        }
                                    }
                                    ?>


                                </tbody>
                            </table>


















                        </div>
                        <!-- /.container-fluid -->
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
                        $('.editBtn').on('click', function() {
                            $('#editmodal').modal('show');

                            $tr = $(this).closest('tr');

                            var data = $tr.children("td").map(function() {
                                return $(this).text();

                            }).get();

                            console.log(data);

                            $('#update_id').val(data[0]);
                            $('#star_rating').val(data[0]);
                            $('#min_wto').val(data[1]);

                        });
                    });
                </script>

</body>

</html>