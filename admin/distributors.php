<?php
include('php-includes/check-login.php');
include('php-includes/connect.php');

?>
<?php
//Clicked on send buton


//WTO Calculation

$query = mysqli_query($con, "SELECT * from `distributors`");
$query3 = mysqli_query($con, "SELECT * from `distributors`");





while ($row = mysqli_fetch_array($query)) {
    $id_no = $row['id_no'];



    $query1 = "SELECT SUM(`total`) as `sum_sales` from `cash_sales` where `id_no` = '$id_no'";
    $result = mysqli_query($con, $query1);

    while ($row1 = mysqli_fetch_assoc($result)) {
        $update_query = mysqli_query($con, "UPDATE `total_sales` set `total_sales` = '$row1[sum_sales]' where `id_no` = '$id_no'");
    }
}
while ($row = mysqli_fetch_array($query3)) {
    $id_no2 = $row['id_no'];

    //Referred Users
    $under_query = mysqli_query($con, "SELECT `id_no` from `distributors` where `sponsor_id` = '$id_no2'");
    while ($row2 = mysqli_fetch_assoc($under_query)) {
        $under_id = $row2['id_no'];
        // echo $under_id;

        $sum_under_query = mysqli_query($con, "SELECT SUM(`total`) as `sum_under_sales` from `cash_sales` where `id_no` = '$under_id'");

        // $update_under_query = mysqli_query($con, "UPDATE `total_sales` set `total_sales` = '$row1[sum_sales]' where `id_no` = '$id_no'");
        if (mysqli_num_rows($query) > 0) {
            while ($row3 = mysqli_fetch_assoc($sum_under_query)) {



                $sumArr = array($row3['sum_under_sales']);
                foreach ($sumArr as $val) {
                    //  echo $val . '<br/>';
                    global $totalSum;
                    $totalSum += $val;
                }

                //echo $under_id . '</br>';
                // echo $id_no2 . '</br>';


            }
        }
    }
    // $finRes = array($totalSum);


    //$update_under_query = mysqli_query($con, "UPDATE `total_sales` set `sales_under` = '$totalSum' where `id_no` = '$id_no2'");

}












function twoCalculation()
{
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mlml Website - View Users</title>

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
                        <h1 class="page-header">Admin - View Distributors</h1>


                        <div class="modal" id="editDistributorsModal" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Update Products</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <form action="php-includes/updates/updates.php" method="POST">
                                        <input type="hidden" name="updateDist_id" id="update_id">
                                        <div class="modal-body">




                                            <div class="form-group">
                                                <label>Id Number</label>
                                                <input type="text" name="idNo" id="idNo" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" id="name" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Status</label>
                                                <input type="text" name="status" id="status" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" name="address" id="address" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Mobile</label>
                                                <input type="text" name="mobile" id="mobile" class="form-control" required>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Referred By</label>
                                                <input type="text" name="sponsor_id" id="sponsor_id" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Total WTO</label>
                                                <input type="text" name="wto" id="wto" class="form-control" required>
                                            </div>


                                           

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" name="updateDistributors" class="btn btn-primary">Save changes</button>
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
                                        <th>ID No</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Address</th>
                                        <th>Mobile</th>


                                        <th>Referred By</th>

                                        <th>Total WTO</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $query = mysqli_query($con, "select * from distributors ");
                                    if (mysqli_num_rows($query) > 0) {

                                        while ($row = mysqli_fetch_array($query)) {
                                            $id = $row['id_no'];
                                            $name = $row['name'];
                                            $status = $row['status'];
                                            $address = $row['address'];
                                            $mobile = $row['mobile'];
                                            $sponsorid = $row['sponsor_id'];
                                            $total_wto = $row['total_wto'];
                                    ?>

                                            <tr>
                                                <td><?php echo $id; ?></td>
                                                <td><?php echo $name; ?></td>
                                                <td><?php echo $status; ?></td>
                                                <td><?php echo $address; ?></td>
                                                <td><?php echo $mobile; ?></td>
                                                <td><?php echo $sponsorid; ?></td>
                                                <td><?php echo $total_wto; ?></td>

                                                <td>
                                                    <button type="button" name="editDistributorsBtn" class="btn btn-primary editDistributors">EDIT</button>
                                                </td>


                                            </tr>

                                    <?php


                                        }
                                    }
                                    ?>



                                </tbody>
                        </div><!--/.table-responsive-->
                    </div>
                </div><!--/.row-->




















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
            $('.editDistributors').on('click', function() {
                $('#editDistributorsModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();

                }).get();

                console.log(data);

                $('#update_id').val(data[0]);
                $('#idNo').val(data[0]);
                $('#name').val(data[1]);
                $('#status').val(data[2]);
                $('#address').val(data[3]);
                $('#mobile').val(data[4]);
                $('#sponsor_id').val(data[5]);
                $('#wto').val(data[6]);
               

            });
        });
    </script>

</body>

</html>