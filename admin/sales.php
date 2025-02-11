<?php
include('php-includes/check-login.php');
require('php-includes/connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mlml Website - Sales Records</title>

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
                        <h1 class="page-header">Sales Records</h1>

                        <div class="modal" id="editSalesModal" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Update Sales</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <form action="php-includes/updates/updates.php" method="POST">
                                        <input type="hidden" name="updateSales_id" id="update_id">
                                        <div class="modal-body">
                                           

                                            <div class="form-group col-md-6">
                                                <label>Receipt No</label>
                                                <input type="text" name="receipt_no" id="receipt_no" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>ID No</label>
                                                <input type="text" name="id_no" id="id_no" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Distributor</label>
                                                <input type="text" name="dist" id="dist" class="form-control" required>
                                            </div>
                                           

                                            <div class="form-group col-md-4">
                                                <label>Rating</label>
                                                <input type="text" name="rating" id="rating" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Date</label>
                                                <input type="text" name="date" id="date" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Product ID</label>
                                                <input type="text" name="p_code" id="p_code" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Quantity</label>
                                                <input type="text" name="quantity" id="quantity" class="form-control" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Star Price(Ksh)</label>
                                                <input type="text" name="star_price" id="star_price" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Total(Ksh)</label>
                                                <input type="text" name="total" id="total" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" name="updateCashSales" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div style="height: 75vh; " class="row">
                    <div  class="col-lg-12">
                        <div style="overflow-y: scroll; height: 75vh" class="table-responsive">
                            <table  class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Receipt No</th>
                                        <th>ID No</th>
                                        <th>Distributor</th>
                                        <th>Rating</th>
                                        <th>Date</th>
                                        <th>Product Code</th>
                                        <th>Quantity</th>
                                        <th>star_price(Ksh)</th>
                                        <th>Total(Ksh)</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($con, "select * from cash_sales");
                                    if (mysqli_num_rows($query) > 0) {
                                        $i = 1;
                                        while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                            <tr>
                                                <td><?php echo $row['receipt_no']; ?></td>
                                                <td><?php echo $row['id_no']; ?></td>
                                                <td><?php echo $row['distributor']; ?></td>
                                                <td><?php echo $row['rating']; ?></td>
                                                <td><?php echo $row['date']; ?></td>
                                                <td><?php echo $row['p_code']; ?></td>
                                                <td><?php echo $row['quantity_sold']; ?></td>
                                                <td><?php echo $row['star_price']; ?></td>
                                                <td><?php echo $row['total']; ?></td>

                                                <td>
                                                    <button class="btn btn-success editSales" type="button" name="editSales">EDIT</button>
                                                </td>
                                            </tr>
                                        <?php

                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="9">No Sales To Display</td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
            $('.editSales').on('click', function() {
                $('#editSalesModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();

                }).get();

                console.log(data);

                $('#update_id').val(data[0]);
                $('#receipt_no').val(data[0]);
                $('#id_no').val(data[1]);
                $('#dist').val(data[2]);
                $('#rating').val(data[3]);
                $('#date').val(data[4]);
                $('#p_code').val(data[5]);
                $('#quantity').val(data[6]);
                $('#star_price').val(data[7]);
                $('#total').val(data[8]);

            });
        });
    </script>

</body>

</html>