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

    <title>Mlml Website - Comission Rules</title>

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

                <div style="margin-top: -25px;" class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Admin - Comission Rules</h1>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="modal" id="editRulesmodal" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Comission RULES</h5>
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
                                                        <label>Commission</label>
                                                        <input type="text" name="commission" id="commission" class="form-control" required>
                                                    </div>

                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" name="updateCmsRules" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th>Star Rating</th>
                                        <th>Commission</th>
                                        <th>Actions</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $query = mysqli_query($con, "select * from cms_rules ");
                                    if (mysqli_num_rows($query) > 0) {

                                        while ($row = mysqli_fetch_array($query)) {


                                    ?>

                                            <tr>

                                                <td><?php echo $row['bronze_rating']; ?></td>
                                                <td><?php echo $row['percentage_commission']; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-success editCmsBtn"> EDIT </button>
                                                </td>



                                            </tr>

                                    <?php


                                        }
                                    }
                                    ?>


                                </tbody>
                            </table>



                        </div>

                        <h3 style="text-align: left; margin-top:-10px;">Commission Payments</h3>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th>Distributor</th>
                                        <th>Rating</th>
                                        <th>Month</th>
                                        <th>Commission (ksh)</th>


                                    </tr>

                                </thead>
                                <tbody>

                                    <?php
                                    $distQuery = mysqli_query($con, "select `id_no` from distributors ");
                                    $array = array();
                                    while ($row = mysqli_fetch_assoc($distQuery)) {
                                        array_push($array, $row['id_no']);
                                    }
                                    // print_r($array);
                                    $cashArr = array();
                                    foreach ($array as $idNo) {
                                        $fetchQuery = mysqli_query($con, "select name, SUM(total_wto) AS `sumWto` from distributors WHERE sponsor_id = '$idNo'  ");

                                        while ($row = mysqli_fetch_assoc($fetchQuery)) {
                                            if ($row['sumWto'] == '') {
                                                $row['sumWto'] = 0;
                                            }
                                            array_push($cashArr, $row['sumWto']);
                                        }
                                    }
                                    
                                    $newCashArr = array();
                                    foreach ($cashArr as $totalWto) {
                                        $comQuery = mysqli_query($con, "SELECT `status`, `id_no` from distributors ORDER BY `id_no`");

                                        if ($row = mysqli_fetch_assoc($comQuery)) {
                                            if ($row['status'] == '1') {
                                                $rateQuery = mysqli_query($con, "select `percentage_commission` from cms_rules WHERE `bronze_rating` = '1'  ");
                                                if ($row = mysqli_fetch_assoc($rateQuery)) {
                                                    $totalWto = $row['percentage_commission'] * $totalWto;
                                                }
                                            } else if ($row['status'] == '2') {
                                                $rateQuery = mysqli_query($con, "select `percentage_commission` from cms_rules WHERE `bronze_rating` = '2'  ");
                                                if ($row = mysqli_fetch_assoc($rateQuery)) {
                                                    $totalWto = $row['percentage_commission'] * $totalWto;
                                                }
                                            } else if ($row['status'] == '3') {
                                                $rateQuery = mysqli_query($con, "select `percentage_commission` from cms_rules WHERE `bronze_rating` = '3'  ");
                                                if ($row = mysqli_fetch_assoc($rateQuery)) {
                                                    $totalWto = $row['percentage_commission'] * $totalWto;
                                                }
                                            } else if ($row['status'] == '4') {
                                                $rateQuery = mysqli_query($con, "select `percentage_commission` from cms_rules WHERE `bronze_rating` = '4'  ");
                                                if ($row = mysqli_fetch_assoc($rateQuery)) {
                                                    $totalWto = $row['percentage_commission'] * $totalWto;
                                                }
                                            } else if ($row['status'] == '5') {
                                                $rateQuery = mysqli_query($con, "select `percentage_commission` from cms_rules WHERE `bronze_rating` = '5'  ");
                                                if ($row = mysqli_fetch_assoc($rateQuery)) {
                                                    $totalWto = $row['percentage_commission'] * $totalWto;
                                                }
                                            }
                                            //echo $totalWto ."<br>";
                                            array_push($newCashArr, $totalWto);
                                        }
                                    }


                                    

                                    
                                    $arrObject = new ArrayObject($newCashArr);
                                    $arrayIterator = $arrObject->getIterator();

                                        
                                    


                                    // SELF SALES..........

                                    $selfSales = mysqli_query($con, "SELECT id_no, distributor, SUM(total) 
                                   from cash_sales 
                                   GROUP BY id_no");




                                    $query = mysqli_query($con, "select `name`, `status`,`total_wto` from distributors ");
                                    

                                        while ($row = mysqli_fetch_array($query) OR $arrayIterator->valid()) {
                                            $date = date("M");


                                    ?>

                                            <tr>

                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['status']; ?></td>
                                                <td><?php echo $date; ?></td>
                                                <td><?php
                                                    echo $arrayIterator->current();
                                                    $arrayIterator->next();
                                                   
                                                    ?></td>




                                            </tr>
                                            <tr>

                                            </tr>

                                    <?php


                                        }
                                    
                                    ?>


                                </tbody>
                            </table>


                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->


                <div class="row">

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
                        $('.editCmsBtn').on('click', function() {
                            $('#editRulesmodal').modal('show');

                            $tr = $(this).closest('tr');

                            var data = $tr.children("td").map(function() {
                                return $(this).text();

                            }).get();

                            console.log(data);

                            $('#update_id').val(data[0]);
                            $('#star_rating').val(data[0]);

                            $('#commission').val(data[1]);

                        });
                    });
                </script>

</body>

</html>