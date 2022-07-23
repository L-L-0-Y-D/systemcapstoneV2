
<?php 

include('../config/dbcon.php');
include('../middleware/businessMiddleware.php');
include('includes/header.php');


?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
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
                        <a href="menu.php?id=<?= $_SESSION['auth_user']['businessid'];?>" class="btn btn-primary float-end">Back</a>
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
                                        <input type="hidden" name="productid" value="<?= $data['productid']?>">
                                        <label class="mb-0">Name</label>
                                        <input type="text" name="name" value="<?= $data['name']?>" required placeholder="Enter Product Name" class="form-control mb-2">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0">Price</label>
                                        <input type="text" name="price" value="<?= $data['price']?>" required placeholder="Enter Price" class="form-control mb-2">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0">Description</label>
                                        <textarea rows="3" name="description"  required placeholder="Enter Description" class="form-control mb-2"><?= $data['description']?></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0">Upload Image</label>
                                        <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                                        <input type="file" name="image" class="form-control mb-2">
                                        <label class="mb-0">Current Image</label>
                                        <img src="../uploads/<?= $data['image'] ?>" height="50px" width="50px">
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
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="mb-0">Status</label> <br>
                                            <input type="checkbox" name="status" <?= $data['status'] == '0'? '':'checked' ?>>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary" name="update_product_btn">Save</button>
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