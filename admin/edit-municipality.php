<?php 

include('../middleware/adminMiddleware.php');
include('includes/header.php');


?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
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
                <h4>Edit Municipality
                    <a href="municipality.php" class="btn btn-primary float-end">Back</a>
                </h4>
                    
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <!--Needed-->
                                <input type="hidden" name="municipalityid" value="<?= $data['municipalityid'] ?>">
                                <label for="">Municipality Name</label>
                                <input type="text" name="municipality_name" value="<?= $data['municipality_name'] ?>" placeholder="Enter Municipality Name" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="">Upload Image</label>
                                <input type="file" name="image" class="form-control">
                                <label for="">Current Image</label>
                                <img src="../uploads/<?= $data['image'] ?>" height="50px" width="50px">
                                <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="update_municipality_btn">Update</button>
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