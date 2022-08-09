<?php 

include('../config/dbcon.php');
include('../middleware/businessMiddleware.php');
include('includes/header.php');


?>
<?php
if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $business = getByID("business", $id,"businessid");

?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>Add Products
          <a href="menu.php?id=<?= $_SESSION['auth_user']['businessid'];?>" class="btn btn-primary float-end" style="background:rgb(255,128,64); border:none;">Back</a></h4>
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
                        <label class="mb-0">Name</label>
                        <input type="text" name="name" required placeholder="Enter Product Name" class="form-control mb-2">
                    </div>
                    <div class="col-md-6">
                        <label class="mb-0">Price</label>
                        <input type="text" name="price" required placeholder="Enter Price" class="form-control mb-2">
                    </div>
                    <div class="col-md-12">
                        <label class="mb-0">Description</label>
                        <textarea rows="3" name="description" required placeholder="Enter Description" class="form-control mb-2"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="control-label">Course Menu</label>
						<select  name="food_type" required class="form-control mb-2">
							<option disabled selected hidden> Select your Course Menu </option>
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
						<select class= "border rounded form-select mb-3" name="cuisinename" style="height:40px; border-style:none;"  required>
                        <option disabled selected hidden>Select your Type of Cuisine</option>
                            <?php 
                                //$municipality = getAllActive("municipality");
                                $query = "SELECT * FROM business WHERE status= '1'";
                                $query_run = mysqli_query($con, $query);
                                if(mysqli_num_rows($business) > 0)
                                    {
                                        $data = mysqli_fetch_array($business);
                                        $cuisine = str_word_count($data['cuisinename'],1);
                                        foreach ($cuisine as $item)
                                        {
                                            ?>
                                            <option value="<?= $item ?>"><?= $item ?></option>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "No Municipality Available";
                                    }?>
                        </select> 
                    </div>
                    <div class="col-md-12">
                        <label class="mb-0">Upload Image (Upload image that is greater than 2MB to get a better quality)</label>
                        <input type="file" name="image" required class="form-control mb-2">
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="mb-0">Status</label> <br>
                            <input type="checkbox" name="status" >
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" name="add_product_btn" >Save</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>  
</div>


<?php 
}
else
{
    echo "ID missing from url";
}
include('includes/footer.php');
?>