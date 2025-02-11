<?php
include('php-includes/connect.php');
include('php-includes/check-login.php');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Mlml Website - Tree</title>
    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="dist/themes/default/style.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">


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
                        <h1 class="page-header">Tree</h1>

                        <div id="tree-container" class="tree-container"></div>

                    </div>
                    <!-- /.col-lg-12 -->

                </div>






                


            </div>
            <!-- /#page-wrapper -->
        </div>


        <!-- /#wrapper -->
        <!-- jQuery -->
       
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <!-- Metis Menu Plugin JavaScript -->
        <script src="vendor/metisMenu/metisMenu.min.js"></script>
        <!-- Custom Theme JavaScript -->
        <script src="dist/js/sb-admin-2.js"></script>

        <script src="dist/jstree.min.js"></script>

        

        <script type="text/javascript">
            $(document).ready(function() {
                $('#tree-container').jstree({
                    'plugins': ["wholerow", "checkbox"],
                    'core': {
                        'data': {
                            "url": "response.php",
                            "dataType": "json"
                        }
                    }



                })




            });
        </script>
</body>

</html>