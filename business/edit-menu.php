
<?php 

include('../config/dbcon.php');
include('../middleware/businessMiddleware.php');
include('includes/header.php');


?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-9">
        <?php 
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];

                $product = getByID("products", $id,"productid");

                if(mysqli_num_rows($product) > 0)
                {
                    $data = mysqli_fetch_array($product);
                    ?>
                    <div class="card">
                        <div class="card-header">
                        <h4>Edit Products
                        <a href="menu.php?id=<?= $_SESSION['auth_user']['businessid'];?>" class="back btn-sm btn-close float-end"></a>
                        </h4>
                            
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php 
                                        ?>
                                        <input type="hidden" name="businessid" value="<?= $_SESSION['auth_user']['businessid'];?>">
                                        <?php
                                        ?>
                                    </div>                                  
                                    <div class="col-md-6">
                                        <label class="mb-0">Current Image</label>
                                        <img class="rounded img-fluid" src="../uploads/<?= $data['image'] ?>" height="100" width="100">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0">Update Product Image</label>
                                        <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                                        <input type="file" name="image" class="form-control mb-2">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="hidden" name="productid" value="<?= $data['productid']?>">
                                        <label class="mb-0">Product Name</label>
                                        <input type="text" name="name" value="<?= $data['name']?>" required class="form-control mb-2">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0">Price</label>
                                        <input type="text" name="price" value="<?= $data['price']?>" required class="form-control mb-2">
                                    </div>                                   
                                    <div class="col-md-6">
                                        <label class="control-label">Course Menu</label>
                                        <select  name="food_type" value="<?= $data['food_type'] ?>" required class="form-control mb-2">
                                            <option selected hidden value="<?= $data['food_type'] ?>"> <?= $data['food_type'] ?> </option>
                                            <option value="Appetizer">Appetizer</option>
                                            <option value="Soup">Soup</option>
                                            <option value="FishDish">Fish Dish</option>
                                            <option value="MeatDish">Meat Dish</option>
                                            <option value="Main">Main Course</option>
                                            <option value="Salad">Salad</option>
                                            <option value="Dessert">Dessert</option>
                                            <option value="Drinks">Drinks</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Cuisine Type</label>
                                        <select class= "border rounded form-select mb-3" name="cuisinename" value="<?= $data['cuisinename'] ?>" style="height:40px; border-style:none;"  required>
                                        <option selected hidden value="<?= $data['cuisinename'] ?>"><?= $data['cuisinename'] ?></option>
                                            <?php 
                                                $business = getByID("business", $_SESSION['auth_user']['businessid'],"businessid");
                                                if(mysqli_num_rows($business) > 0)
                                                    {
                                                        $item = mysqli_fetch_array($business);
                                                        $cuisine = str_word_count($item['cuisinename'],1);
                                                        foreach ($cuisine as $itemcuisine)
                                                        {
                                                            ?>
                                                            <option value="<?= $itemcuisine ?>"><?= $itemcuisine ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    else
                                                    {
                                                        echo "No Municipality Available";
                                                    }
                                            ?>
                                        </select> 
                                    </div>  
                                    <div class="col-md-12">
                                        <label class="mb-0">Product Description</label>
                                        <textarea rows="3" name="description"  required class="form-control mb-2"><?= $data['description']?></textarea>
                                    </div>              
                                    <div class="row">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="formCheck-1" name="status" <?= $data['status'] == '0'? '':'checked' ?>> 
                                            <label class="form-check-label" for="formCheck-1"><strong>Status</strong></label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn update-btn" name="update_product_btn">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
        
        <?php 
                }
                else
                {
                    echo "Product Not Found for given id";
                }
            }
            else
            {
                echo "ID missing from url";
            }
        ?>
    </div>
  </div>  
</div>


<?php include('includes/footer.php');?>