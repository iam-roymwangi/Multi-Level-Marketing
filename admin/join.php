<?php
include('php-includes/connect.php');
include('php-includes/check-login.php');
$userid = $_SESSION['userid'];

?>
<?php

//User cliced on join
if(isset($_GET['join_dist'])){
	$idNo = mysqli_real_escape_string($con,$_GET['idNo']);
	$name = mysqli_real_escape_string($con,$_GET['name']);
	$status = mysqli_real_escape_string($con,$_GET['status']);
	$mobile = mysqli_real_escape_string($con,$_GET['mobile']);
	$address = mysqli_real_escape_string($con,$_GET['address']);
	$sponsor_id = mysqli_real_escape_string($con,$_GET['sponsor_id']);
	
	
	 
	$password = "123456";
	
	$flag = 0;
	
	if($idNo!='' && $mobile!='' && $name!='' && $address!='' && $sponsor_id!=''){
		//User filled all the fields.
		
			
			if(id_check($idNo)){
				//ID is ok
				$flag = 1;
			}
			else{
				//check email
				echo '<script>alert("This user id already availble.");</script>';
			}
		
		
	}
	else{
		//check all fields are fill
		echo '<script>alert("Please fill all the fields.");</script>';
	}



	
	//Now we are heree
	//It means all the information is correct
	//Now we will save all the information
	if($flag==1){
		
		//Insert into User profile
		$query = mysqli_query($con,"insert into distributors(`id_no`,`name`,`status`,`address`,`mobile`,`sponsor_id`) values('$idNo','$name','$status','$address','$mobile','$sponsor_id')");
		
		
		echo mysqli_error($con);
		//This is the main part to join a user\
		//If you will do any mistake here. Then the site will not work.
		
		
		
		
		echo mysqli_error($con);
		
		echo '<script>alert("Successfully Added Distributor!");window.location.assign("join.php");</script>';
	}
	
}


?><!--/join user-->
<?php 
//functions




function id_check($idNo){
	global $con;
	
	$query =mysqli_query($con,"select * from `distributors` where `id_no`='$idNo'");
	if(mysqli_num_rows($query)>0){
		return false;
	}
	else{
		return true;
	}
}


function tree($userid){
	global $con;
	$data = array();
	$query = mysqli_query($con,"select * from tree where userid='$userid'");
	$result = mysqli_fetch_array($query);
	$data['left'] = $result['left'];
	$data['right'] = $result['right'];
	$data['leftcount'] = $result['leftcount'];
	$data['rightcount'] = $result['rightcount'];
	
	return $data;
}
function getUnderId($userid){
	global $con;
	$query = mysqli_query($con,"select * from user where email='$userid'");
	$result = mysqli_fetch_array($query);
	return $result['under_userid'];
}
function getUnderIdPlace($userid){
	global $con;
	$query = mysqli_query($con,"select * from user where email='$userid'");
	$result = mysqli_fetch_array($query);
	return $result['side'];
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

    <title>Mlml Website  - Join</title>

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
                        <h1 class="page-header">Add New Distributor</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                	<div class="col-lg-4">
                        <?php
                        $checkQuery = mysqli_query($con, "SELECT id_no FROM `distributors` ORDER BY id_no DESC LIMIT 1");
                        if($row = mysqli_fetch_assoc($checkQuery)){
                            $idNumber = $row['id_no'];
                        }
                        
                        $newId = $idNumber + 0001;
                        
                        
                        
                        
                        ?>
                    	<form method="get">
						<div class="form-group">
                                <label>Id Number</label>
                                <input style="width: 150px;" type="text" name="idNo" class="form-control" value="<?php echo "000".$newId;?>" readonly required>
                            </div>
						<div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <input type="text" name="status" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Mobile</label>
                                <input type="text" name="mobile" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control" required>
                            </div>
                            <div style="display: flex; flex-direction: column;" class="form-group">
                                <label>Referred By</label>
                                <select style="height: 32px; border-radius: 5px; background-color: #D5D3D2; font-weight: 600;" name="sponsor_id" class="form-select" aria-label="Default select example">
                                
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
                        	<input type="submit" name="join_dist" class="btn btn-primary" value="Join">
                        </div>
                        </form>
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

</body>

</html>
