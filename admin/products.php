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

    <title>Mlml Website - View Products</title>

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
                        <h1 class="page-header">Admin - View Products</h1>


                        <div class="modal" id="editProductsModal" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Update Products</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <form action="php-includes/updates/updates.php" method="POST">
                                        <input type="hidden" name="updateProducts_id" id="update_id">
                                        <div class="modal-body">


                                           
                                            <div class="form-group col-md-6">
                                                <label>Product Code</label>
                                                <input type="text" name="p_code" id="p_code" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Name</label>
                                                <input type="text" name="name" id="name" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Description</label>
                                                <input type="text" name="description" id="description" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Size</label>
                                                <input type="text" name="size" id="size" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Quantity</label>
                                                <input type="text" name="quantity" id="quantity" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Retail</label>
                                                <input type="text" name="retail" id="retail" class="form-control" required>
                                            </div>


                                            <div class="form-group col-md-2">
                                                <label>One</label>
                                                <input type="text" name="one" id="one" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Two</label>
                                                <input type="text" name="two" id="two" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Three</label>
                                                <input type="text" name="three" id="three" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Four</label>
                                                <input type="text" name="four" id="four" class="form-control" required>
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label>Five</label>
                                                <input type="text" name="five" id="five" class="form-control" required>
                                            </div>
                                           
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" name="updateProducts" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->


                <div class="row">
                    <div class="col-lg-12">
                        <div style="overflow-y: scroll; height: 75vh" class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Index</th>
                                        <th>Product Code</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Size</th>
                                        <th>Stock</th>
                                        <th>Retail(Ksh)</th>
                                        <th>One(Ksh)</th>
                                        <th>Two(Ksh)</th>
                                        <th>Three(Ksh)</th>
                                        <th>Four(Ksh)</th>
                                        <th>Five(Ksh)</th>
                                        <th>Actions</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $query = mysqli_query($con, "select * from products ");
                                    if (mysqli_num_rows($query) > 0) {

                                        while ($row = mysqli_fetch_array($query)) {
                                            $index = $row['index'];
                                            $p_code = $row['p_code'];
                                            $name = $row['name'];
                                            $description = $row['description'];
                                            $size = $row['size'];
                                            $quantity = $row['quantity'];
                                            $retail = $row['retail'];
                                            $one = $row['one'];
                                            $two = $row['two'];
                                            $three = $row['three'];
                                            $four = $row['four'];
                                            $five = $row['five'];


                                    ?>

                                            <tr>
                                                <td><?php echo $index; ?></td>
                                                <td><?php echo $p_code; ?></td>
                                                <td><?php echo $name; ?></td>
                                                <td><?php echo $description; ?></td>
                                                <td><?php echo $size; ?></td>
                                                <td><?php echo $quantity; ?></td>
                                                <td><?php echo $retail; ?></td>
                                                <td><?php echo $one; ?></td>
                                                <td><?php echo $two; ?></td>
                                                <td><?php echo $three; ?></td>
                                                <td><?php echo $four; ?></td>
                                                <td><?php echo $five; ?></td>
                                                <td>
                                                    <button type="button" name="editProductsBtn" class="btn btn-primary editProducts">EDIT</button>
                                                </td>


                                            </tr>

                                    <?php


                                        }
                                    }
                                    ?>


                                </tbody>



















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
                        $('.editProducts').on('click', function() {
                            $('#editProductsModal').modal('show');

                            $tr = $(this).closest('tr');

                            var data = $tr.children("td").map(function() {
                                return $(this).text();

                            }).get();

                            console.log(data);

                            $('#update_id').val(data[0]);
                            $('#p_code').val(data[1]);
                            $('#name').val(data[2]);
                            $('#description').val(data[3]);
                            $('#size').val(data[4]);
                            $('#quantity').val(data[5]);
                            $('#retail').val(data[6]);
                            $('#one').val(data[7]);
                            $('#two').val(data[8]);
                            $('#three').val(data[9]);
                            $('#four').val(data[10]);
                            $('#five').val(data[11]);

                        });
                    });
                </script>

</body>

</html>