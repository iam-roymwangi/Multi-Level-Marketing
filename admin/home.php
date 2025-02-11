<?php
include('php-includes/check-login.php');
require('php-includes/connect.php');



$dataPoints = array(
    array("y" => 3373.64, "label" => "Germany"),
    array("y" => 2435.94, "label" => "France"),
    array("y" => 1842.55, "label" => "China"),
    array("y" => 1828.55, "label" => "Russia"),
    array("y" => 1039.99, "label" => "Switzerland"),
    array("y" => 765.215, "label" => "Japan"),
    array("y" => 612.453, "label" => "Netherlands")
);

$values = array();

$BarQuery = mysqli_query($con, "SELECT 
DATE_FORMAT(date, '%M') as month_wise,
COUNT(DATE_FORMAT(date, '%M')) salesCount,
SUM(total) salesValue
FROM cash_sales
GROUP BY DATE_FORMAT(date, '%M')");

$count = 0;
if (mysqli_num_rows($BarQuery) > 0) {
    while ($row = mysqli_fetch_assoc($BarQuery)) {

        $values[$count]["label"] = $row["month_wise"];
        $values[$count]["y"] = $row["salesCount"];
        $count = $count + 1;
    }
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

    <title>Mlml Website - Home</title>

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
                        <h1 style="margin-top: 2px;" class="page-header">Admin Dashboard</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">Total Distributors</h4>
                            </div>
                            <div class="panel-body">
                                <?php
                                echo  mysqli_num_rows(mysqli_query($con, "select * from distributors"));
                                ?>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <h4 class="panel-title">Total Products </h4>
                            </div>
                            <div class="panel-body">
                                <?php
                                echo  mysqli_num_rows(mysqli_query($con, "select * from products"));
                                ?>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h4 class="panel-title">Total Sales </h4>
                            </div>
                            <div class="panel-body">
                                <?php
                                echo  mysqli_num_rows(mysqli_query($con, "select * from cash_sales"));
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="display: flex; " class="row">
                    <figure class="highcharts-figure ">
                        <div style="width: 560px;" id="container"></div>
                        <p class="highcharts-description">
                            Pie chart
                        </p>
                    </figure>

                    <div id="chartContainer" style="height: 395px; margin-right: 10px; margin-top: 20px; width: 660px;">
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

    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>


    <script>
        // Create the chart
        Highcharts.chart('container', {
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Most Sold Products, 2024',
                align: 'left'

            },
            subtitle: {
                text: 'Hover to view more details. ',
                align: 'left'
            },

            accessibility: {
                announceNewData: {
                    enabled: true
                },
                point: {
                    valueSuffix: '%'
                }
            },

            plotOptions: {
                series: {
                    borderRadius: 5,
                    dataLabels: [{
                        enabled: true,
                        distance: 15,
                        format: '{point.name}',
                        style: {
                            fontSize: '1.3em'

                        }
                    }, {
                        enabled: true,
                        distance: '-30%',
                        filter: {
                            property: 'percentage',
                            operator: '>',
                            value: 5
                        },
                        format: '{point.y:.1f}%',
                        style: {
                            fontSize: '0.9em',
                            textOutline: 'none'
                        }
                    }]
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
            },



            series: [{
                name: 'Products',
                colorByPoint: true,


                data: [
                    <?php
                    $data = '';
                    $sel_query = mysqli_query($con, "SELECT name, count(total) * 10 as sum_sales
            FROM products, cash_sales 
            WHERE products.p_code = cash_sales.p_code
            GROUP BY products.name");
                    if (mysqli_num_rows($sel_query) > 0) {
                        while ($row = mysqli_fetch_assoc($sel_query)) {
                            $data = ' { name: "' . $row['name'] . '", y: ' . $row['sum_sales'] . '},';
                            echo $data;
                        }
                    }




                    ?>

                ]

            }],

        });
    </script>


    <script>
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "Sales"
                },
                axisY: {
                    title: "No of Sales"
                },
                data: [{
                    type: "column",
                    yValueFormatString: "#,##0.## sales",
                    dataPoints: <?php echo json_encode($values, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>

</body>

</html>