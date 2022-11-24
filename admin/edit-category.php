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
            $mealcategory = getByID("mealcategory",$id,"categoryid");

            if(mysqli_num_rows($mealcategory) > 0)
            {
                $data = mysqli_fetch_array($mealcategory)
                
            
            ?>
            <div class="card">
                <div class="card-header">
                    <a href="category.php" class="back btn-sm btn-close float-end"></a>
                    <h4>Edit Cuisine</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <!--Needed-->
                                <input type="hidden" name="categoryid" value="<?= $data['categoryid'] ?>">
                                <label for="">Cuisine Name:</label>
                                <input type="text" name="categoryname" required value="<?= $data['categoryname'] ?>" placeholder="Enter Cuisine Type" class="form-control">
                            </div>
                            <div class="row">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="formCheck-1" name="status" <?= $data['status'] ? "checked":""?>> 
                                    <label class="form-check-label m-0" for="formCheck-1"><strong>Status</strong></label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn update-btn" name="update_category_btn">Update</button>
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