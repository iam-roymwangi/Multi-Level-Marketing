<?php
include('php-includes/check-login.php');
require('php-includes/connect.php');
?>
<?php

if (isset($_GET['add_sale'])) {
    $product_id = $_GET['p_code'];
    $id_no = $_GET['id_no'];
    $dist = $_GET['dist'];
    $quantity = $_GET['quantity'];
    $rating = $_GET['rating'];
   // $rating = intval(preg_replace('/[^\d.]/', '', $total));

    $query = mysqli_query($con, "SELECT `status` from `distributors` where `id_no` = '$id_no'");
    while($row = mysqli_fetch_assoc($query)){
        $status = $row['status'];
        
    }
    if($rating === "1"){
        $starPrice = "one";
        $Pquery = mysqli_query($con, "SELECT `$starPrice` from `products` where `p_code` = '$product_id'");
        while($row = mysqli_fetch_assoc($Pquery)){
            $star_price = $row[$starPrice];
            
            
        }
        
    }
    if($rating === "2"){
        $starPrice = "two";
        $Pquery = mysqli_query($con, "SELECT `$starPrice` from `products` where `p_code` = '$product_id'");
        while($row = mysqli_fetch_assoc($Pquery)){
            $star_price = $row[$starPrice];
            
            
        }
        
    }
    if($rating === "3"){
        $starPrice = "three";
        $Pquery = mysqli_query($con, "SELECT `$starPrice` from `products` where `p_code` = '$product_id'");
        while($row = mysqli_fetch_assoc($Pquery)){
            $star_price = $row[$starPrice];
            
            
        }
        
    }
    if($rating === "4"){
        $starPrice = "four";
        $Pquery = mysqli_query($con, "SELECT `$starPrice` from `products` where `p_code` = '$product_id'");
        while($row = mysqli_fetch_assoc($Pquery)){
            $star_price = $row[$starPrice];
            
            
        }
        
    }
    if($rating === "5"){
        $starPrice = "five";
        $Pquery = mysqli_query($con, "SELECT `$starPrice` from `products` where `p_code` = '$product_id'");
        while($row = mysqli_fetch_assoc($Pquery)){
            $star_price = $row[$starPrice];
            
            
        }
        
    }


   // $star_price = $_GET['star_price'];
    $star_price = intval(preg_replace('/[^\d.]/', '', $star_price));

    $total = $quantity * $star_price;
    $total = floatval(preg_replace('/[^\d.]/', '', $total));

    $receipt_no = rand(1,999999);
    
    //$receipt_no = $_GET['receipt_no'];
    
    $date = date("Y-m-d");
   

    function checkReceipt ($receipt_no){
        global $receipt_no;
        global $con;

        $check_query = mysqli_query($con, "SELECT `receipt_no` from `cash_sales` where `receipt_no` = '$receipt_no'");
        if(mysqli_num_rows($check_query)>0){
            $rand2 = rand(1,999999);
            $receipt_no = $rand2;
            
        }
        
    }
    checkReceipt($receipt_no);

    $query = mysqli_query($con, "INSERT INTO `cash_sales` (`receipt_no`, `id_no`, `distributor`, `rating`, `date`, `p_code`, `quantity_sold`, `star_price`, `total`)
     VALUES ('$receipt_no', '$id_no', '$dist', '$rating', '$date', '$product_id', '$quantity', '$star_price', '$total')");

    $updateQuery = mysqli_query($con, "UPDATE `distributors` set `total_wto` = `total_wto`+ '$total' where `id_no` = '$id_no'");

    $updateStock = mysqli_query($con, "UPDATE `products` set `quantity` = `quantity`- '$quantity' where `P_code` = '$product_id'");

    $selectQuery = mysqli_query($con, "SELECT `sponsor_id` as `spId` from `distributors` WHERE  `id_no` = '$id_no'");

    while ($row = mysqli_fetch_assoc($selectQuery)) {
        $spId = $row['spId'];
    }

    $updateUnderQuery = mysqli_query($con, "UPDATE `distributors` set `total_wto` = `total_wto`+ '$total' where `id_no` = '$spId'");

    echo '<script>alert("Successfully Updated!");window.location.assign("addsales.php");</script>';
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

    <title>Mlml Website - New Sale</title>

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
                        <h1 class="page-header">Add New Sale</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="form-row">
                    <div class="form-group col-lg-4">
                        <form method="GET">


                            <div class="form-group col-md-6">
                                
                                <input type="hidden" name="receipt_no" class="form-control" >
                            </div>
                            <div style="margin-left: 0; padding-right: 120px;">
                                <label style="padding-right: 30px;">MLM ID Number</label>
                                <select style="height: 32px; border-radius: 5px; background-color: #D5D3D2; font-weight: 600;" name="id_no" class="form-select" aria-label="Default select example">
                                
                                <?php
                                  global $con;
                                    $selectId = mysqli_query($con, "SELECT `id_no`, `name` from `distributors` "); 
                                  
                                 while($row = mysqli_fetch_assoc($selectId)){?>
                                     <option value="<?php echo $row['id_no'];?>"><?php echo $row['name'];?> - <?php echo $row['id_no'];?></option>


                        <?php
                                 }
                            
                             
                                ?>
                                
                                   
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Distributor</label>
                                <input type="text" name="dist" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Product ID</label>
                                <select style="height: 32px; border-radius: 5px; background-color: #D5D3D2; font-weight: 600;" name="p_code" class="form-select" aria-label="Default select example">
                                
                                <?php
                                  global $con;
                                    $selectId = mysqli_query($con, "SELECT `p_code`, `name` from `products` "); 
                                  
                                 while($row = mysqli_fetch_assoc($selectId)){?>
                                     <option value="<?php echo $row['p_code'];?>"><?php echo $row['name'];?> - <?php echo $row['p_code'];?></option>


                        <?php
                                 }
                            
                             
                                ?>
                                
                                   
                                    
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Rating</label>
                                <input type="text" name="rating" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Date</label>
                                <input type="date" name="date" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Quantity</label>
                                <input type="text" name="quantity" class="form-control" required>
                            </div>

                            




                            <div class="form-group">
                                <input type="submit" name="add_sale" class="btn btn-primary" value="Add New Sale">
                            </div>
                        </form>
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

</body>

</html>