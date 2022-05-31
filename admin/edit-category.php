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
            $mealcategory = getByID("mealcategory",$id,"categoryid");

            if(mysqli_num_rows($mealcategory) > 0)
            {
                $data = mysqli_fetch_array($mealcategory)
                
            
            ?>
            <div class="card">
                <div class="card-header">
                <h4>Edit Cuisine
                    <a href="category.php" class="btn btn-primary float-end">Back</a>
                </h4>
                    
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <!--Needed-->
                                <input type="hidden" name="categoryid" value="<?= $data['categoryid'] ?>">
                                <label for="">Cuisine Name</label>
                                <input type="text" name="categoryname" value="<?= $data['categoryname'] ?>" placeholder="Enter Cuisine Type" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="">Status</label>
                                <input type="checkbox" <?= $data['status'] ? "":"checked"?> name="status" >
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="update_category_btn">Update</button>
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