<?php
include('php-includes/check-login.php');
include('php-includes/connect.php');




//Add new product

if (isset($_POST['addProduct'])) {
    $product_id = $_POST['p_code'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $size = $_POST['size'];
    $quantity = $_POST['quantity'];
    $retail = $_POST['retail'];
    $retail = floatval(preg_replace('/[^\d.]/', '', $retail));

    $one = $_POST['one'];
    $one = floatval(preg_replace('/[^\d.]/', '', $one));

    $two = $_POST['two'];
    $two = floatval(preg_replace('/[^\d.]/', '', $two));

    $three = $_POST['three'];
    $three = floatval(preg_replace('/[^\d.]/', '', $three));

    $four = $_POST['four'];
    $four = floatval(preg_replace('/[^\d.]/', '', $four));

    $five = $_POST['five'];
    $five = floatval(preg_replace('/[^\d.]/', '', $five));



    $insert_query = mysqli_query($con, "INSERT INTO `products` ( `p_code`, `name`, `description`, `size`, `quantity`, `retail`, `one`, `two`, `three`, `four`, `five`)
     VALUES ('$product_id', '$name', '$description', '$size', '$quantity', '$retail', '$one', '$two', '$three', '$four', '$five')");


         echo '<script>alert("Successfully Updated!");window.location.assign("new_products.php");</script>';
}
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

    <title>Mlml Website - New Product</title>

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
                        <h1 class="page-header">Add New Product</h1>
                    </div>
                    <div class="col-lg-4">
                        <form method="POST">





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
                                <label>Quantity (Stock)</label>
                                <input type="text" name="quantity" id="quantity" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Retail Price(Ksh)</label>
                                <input type="text" name="retail" id="retail" class="form-control" required>
                            </div>

                            <br> <br>
                            <h4 style="font-weight: 600; color: blue ">Star Prices:</h4>

                            <div class="form-group col-md-4">
                                <label>One(Ksh)</label>
                                <input type="text" name="one" id="one" class="form-control" >
                            </div>
                            <div class="form-group col-md-4">
                                <label>Two(Ksh)</label>
                                <input type="text" name="two" id="two" class="form-control" >
                            </div>
                            <div class="form-group col-md-4">
                                <label>Three(Ksh)</label>
                                <input type="text" name="three" id="three" class="form-control" >
                            </div>
                            <div class="form-group col-md-4">
                                <label>Four(Ksh)</label>
                                <input type="text" name="four" id="four" class="form-control" >
                            </div>

                            <div class="form-group col-md-4">
                                <label>Five(Ksh)</label>
                                <input type="text" name="five" id="five" class="form-control" >
                            </div>


                            <div style="margin-top: 40px; margin-right: 90px; " class="form-group col-md-4">

                                <button type="submit" name="addProduct" class="btn btn-primary">Add Product</button>
                            </div>
                        </form>
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