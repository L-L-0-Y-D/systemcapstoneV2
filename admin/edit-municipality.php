<?php 

include('../middleware/adminMiddleware.php');
include('includes/header.php');


?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
        <?php 
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $municipality = getByID("municipality",$id,"municipalityid");

            if(mysqli_num_rows($municipality) > 0)
            {
                $data = mysqli_fetch_array($municipality)
                
            
            ?>
            <div class="card">
                <div class="card-header">
                    <a href="municipality.php" class="back btn-sm btn-close float-end"></a>
                    <h4>Edit Municipality</h4>     
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Current Municipality Image</label>
                                <img class="rounded img-fluid" src="../uploads/<?= $data['image'] ?>" height="100" width="100">
                                <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                            </div>
                            <div class="col-md-12">
                                <label for="">Update Image</label>
                                <input type="file" name="image" class="form-control">    
                            </div>
                            <div class="col-md-12">
                                <!--Needed-->
                                <input type="hidden" name="municipalityid" value="<?= $data['municipalityid'] ?>">
                                <label for="">Municipality Name:</label>
                                <input type="text" name="municipality_name" required value="<?= $data['municipality_name'] ?>" placeholder="Enter Municipality Name" class="form-control">
                            </div>
                            <div class="row">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="formCheck-1" name="status" <?= $data['status'] ? "checked":""?>> 
                                    <label class="form-check-label m-0" for="formCheck-1"><strong>Status</strong></label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn update-btn" name="update_municipality_btn">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php
            }
            else
            {
                echo "Municipality not Found";
            }
        }
        else
        {
           echo"ID missing from url";
        }
            ?>
    </div>
  </div>  
</div>



<?php include('includes/footer.php');?>