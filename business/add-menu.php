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
<div class="container mt-5">
  <div class="row  justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <a href="menu.php?id=<?= $_SESSION['auth_user']['businessid'];?>" class="back btn-sm btn-close float-end"></a>
          <h6 class="fw-bold">Add Products</h6>
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
                    <div class="col-md-12">
                        <label class="form-label text-black">Upload Product Image (Image must be greater than 2MB to get a better quality)</label>
                        <input type="file" name="image" required class="form-control mb-2">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-black">Product Name:</label>
                        <input type="text" name="name" required class="form-control mb-2">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-black">Price:</label>
                        <input type="text" name="price" required class="form-control mb-2">
                    </div>                   
                    <div class="col-md-6">
                        <label class="form-label text-black">Course Menu:</label>
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
                        <label class="form-label text-black">Cuisine Type:</label>
						<select class= "border rounded form-select mb-3" name="cuisinename" required>
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
                        <label class="form-label text-black">Product Description:</label>
                        <textarea rows="3" name="description" required class="form-control mb-2"></textarea>
                    </div>
                    <div class="row">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="formCheck-1" name="status" > 
                            <label class="form-label text-black" for="formCheck-1"><strong>Status</strong></label>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <button type="submit" class="btn save-btn " name="add_product_btn" >Save</button>
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