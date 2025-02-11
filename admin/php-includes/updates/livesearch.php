<?php
include('../connect.php');




if (isset($_POST['input'])) {

    $input = $_POST['input'];

    $query = "SELECT * from `distributors` WHERE `id_no` = '$input' ";

    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) === 1) { 

    while($row = mysqli_fetch_assoc($result)){?>

  



        <div class="row">
            <div class="col-lg-8" id="searchResult">

                <form action="php-includes/updates/updates.php" method="POST">
                    <div class="form-col">
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Distributor ID</label>
                            <input type="text" name="idNo" class="form-control"  value="<?php echo $row['id_no']; ?>" placeholder="Distributor ID">
                        </div>
                        <div class="form-group col-md-4">
                            <label >Name</label>
                            <input type="text" class="form-control" value="<?php echo $row['name']; ?>" placeholder="Name">
                        </div>
                    </div>
                    <br> <br> <br>
                    <h2 style="text-decoration: underline;">Current Status</h2>
                    <div class="form-col">
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Current Rating</label>
                            <input type="text" name="rating" class="form-control" value="<?php echo $row['status']; ?>" placeholder="Current Status">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Current WTO</label>
                            <input type="text" class="form-control" value="<?php echo $row['total_wto']; ?>" placeholder="Proposed Status">
                        </div>
                    </div>

                    <br> <br> <br>
                    <h2 style="text-decoration: underline;">Proposed Status</h2>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Proposed Rating</label>
                            <input type="text" name="proposed_rating" class="form-control" placeholder="Proposed Rating">
                        </div>
                        
                    </div>


                    <button type="submit" name="update_status" class="btn btn-primary">Update Status</button>
                </form>

            </div>

            <!-- /#page-wrapper -->

        </div>



<?php
    }

    }
}

?>