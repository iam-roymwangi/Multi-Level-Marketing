<?php


include('../connect.php');



if(isset($_POST['updateCmsRules'])){
    $updateId = mysqli_real_escape_string($con,$_POST['update_id']);
    $star_rating = mysqli_real_escape_string($con,$_POST['star_rating']);
    $commission = mysqli_real_escape_string($con,$_POST['commission']);
    

    $query = mysqli_query($con, "UPDATE `cms_rules` SET  `percentage_commission` = '$commission'  WHERE `bronze_rating` = '$updateId'");

    echo '<script>alert("Successfully Updated!");window.location.assign("../../cms_rules.php");</script>';


}

if(isset($_POST['updateRules'])){
    $updateId = mysqli_real_escape_string($con,$_POST['update_id']);
    $min_wto = mysqli_real_escape_string($con,$_POST['min_wto']);
    

    $query = mysqli_query($con, "UPDATE `wto_rules` SET `min_wto` = '$min_wto' WHERE `star_rating` = $updateId");

    echo '<script>alert("Successfully Updated!");window.location.assign("../../wto_rules.php");</script>';


}


if(isset($_POST['updateCashSales'])){
    $updateSales_id = mysqli_real_escape_string($con,$_POST['updateSales_id']);
    $receipt_no = mysqli_real_escape_string($con,$_POST['receipt_no']);
    $id_no = mysqli_real_escape_string($con,$_POST['id_no']);
    $dist = mysqli_real_escape_string($con,$_POST['dist']);
    $rating = mysqli_real_escape_string($con,$_POST['rating']);
    $date = mysqli_real_escape_string($con,$_POST['date']);
    $p_code = mysqli_real_escape_string($con,$_POST['p_code']);
    $quantity = mysqli_real_escape_string($con,$_POST['quantity']);
    $star_price = mysqli_real_escape_string($con,$_POST['star_price']);
    $star_price = floatval(preg_replace('/[^\d.]/', '', $star_price));

    $total = mysqli_real_escape_string($con,$_POST['total']);
    $total = floatval(preg_replace('/[^\d.]/', '', $total));
    

    $query = mysqli_query($con, "UPDATE `cash_sales` 
    SET `receipt_no` = '$receipt_no', `id_no` = '$id_no', `distributor` = '$dist', `rating` = '$rating', `date` = '$date',
     `p_code` = '$p_code', `quantity_sold` = '$quantity', `star_price` = '$star_price', `total` = '$total'
     WHERE `receipt_no` = '$updateSales_id'");

    echo '<script>alert("Successfully Updated!");window.location.assign("../../sales.php");</script>';


}

if(isset($_POST['updateDistributors'])){
    $updateDist_id = mysqli_real_escape_string($con,$_POST['updateDist_id']);
    $idNo = mysqli_real_escape_string($con,$_POST['idNo']);
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $status = mysqli_real_escape_string($con,$_POST['status']);
    $address = mysqli_real_escape_string($con,$_POST['address']);
    $mobile = mysqli_real_escape_string($con,$_POST['mobile']);
    $sponsor_id = mysqli_real_escape_string($con,$_POST['sponsor_id']);

    $wto = mysqli_real_escape_string($con,$_POST['wto']);
    $wto = floatval(preg_replace('/[^\d.]/', '', $wto));
    
    

    $query = mysqli_query($con, "UPDATE `distributors` SET `id_no` = '$idNo', `name` = '$name', `status` = '$status', `address` = '$address',
     `mobile` = '$mobile', `sponsor_id` = '$sponsor_id', `total_wto` = '$wto'
      WHERE `id_no` = '$updateDist_id'");

    echo '<script>alert("Successfully Updated!");window.location.assign("../../distributors.php");</script>';


}

if(isset($_POST['updateProducts'])){
    $updateProducts_id = mysqli_real_escape_string($con,$_POST['updateProducts_id']);
    $p_code = mysqli_real_escape_string($con,$_POST['p_code']);
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $description = mysqli_real_escape_string($con,$_POST['description']);
    $size = mysqli_real_escape_string($con,$_POST['size']);
    $quantity = mysqli_real_escape_string($con,$_POST['quantity']);
    $retail = mysqli_real_escape_string($con,$_POST['retail']);
    $retail = floatval(preg_replace('/[^\d.]/', '', $retail));

    $one = mysqli_real_escape_string($con,$_POST['one']);
    $one = floatval(preg_replace('/[^\d.]/', '', $one));

    $two = mysqli_real_escape_string($con,$_POST['two']);
    $two = floatval(preg_replace('/[^\d.]/', '', $two));

    $three = mysqli_real_escape_string($con,$_POST['three']);
    $three = floatval(preg_replace('/[^\d.]/', '', $three));

    $four = mysqli_real_escape_string($con,$_POST['four']);
    $four = floatval(preg_replace('/[^\d.]/', '', $four));

    $five = mysqli_real_escape_string($con,$_POST['five']);
    $five = floatval(preg_replace('/[^\d.]/', '', $five));

    

    $query = mysqli_query($con, "UPDATE `products` SET `p_code` = '$p_code', `name` = '$name', `description` = '$description',
     `size` = '$size', `quantity` = '$quantity', `retail` = '$retail', `one` = '$one', `two` = '$two', `three` = '$three', `four` = '$four',
      `five` = '$five' WHERE `index` = $updateProducts_id AND `p_code` = '$p_code'");

    echo '<script>alert("Successfully Updated!");window.location.assign("../../products.php");</script>';


}

if(isset($_POST['update_status'])){
   
    $idNo = $_POST['idNo'];
    $rating = $_POST['proposed_rating'];


    $updateQuery = mysqli_query($con, "UPDATE `distributors` SET `status` = '$rating' WHERE `id_no` = '$idNo'");

    echo '<script>alert("Successfully Updated Status!");window.location.assign("../../update_status.php");</script>';


}









?>