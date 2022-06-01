<?php 

include('../middleware/adminMiddleware.php');
include('includes/header.php');

?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>
              Add Business
            <a href="busiowner.php" class="btn btn-primary float-end">Back</a>
          </h4>
        </div>
        <div class="card-body">
            <form action="code.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Business Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="">Business Name</label>
                        <input type="text" name="business_name" required placeholder="Enter Business Name" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="">Business address</label>
                        <input type="text" name='business_address' required placeholder="Business Address" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">Select Business Municipality</label>
                        <select name='municipalityid' class="form-select mb-2">
                            <option value="" disabled selected hidden>Municipality</option>
                            <?php 
                            $municipality = getAllStatus("municipality");
                            if(mysqli_num_rows($municipality) > 0)
                            {
                                foreach ($municipality as $item)
                                {
                                    ?>
                                    <option value="<?= $item['municipalityid']; ?>"><?= $item['municipality_name']; ?></option>
                                    <?php
                                }
                            }
                            else
                            {
                                echo "No Municipality Available";
                            }?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Select Cuisine Type</label>
                        <select name='categoryid' class="form-select mb-2">
                            <option value="" disabled selected hidden>Cuisine Type</option>
                            <?php 
                            $category = getAllStatus("mealcategory");
                            if(mysqli_num_rows($category) > 0)
                            {
                                foreach ($category as $item)
                                {
                                    ?>
                                    <option value="<?= $item['categoryid']; ?>"><?= $item['categoryname']; ?></option>
                                    <?php
                                }
                            }
                            else
                            {
                                echo "No Municipality Available";
                            }?>
                        </select>
                    </div>
                    <h3>OWNER DETAILS</h3>
                    <div class="col-md-6">
                        <label for="">First Name</label>
                        <input type="text" name="business_firstname" placeholder="Enter First Name" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">Last Name</label>
                        <input type="text" name="business_lastname" placeholder="Enter Last Name" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">Phone Number</label>
                        <input type="text" name='business_phonenumber' required placeholder="Contact Number" class="form-control"/>
                    </div>
                    <div class="col-md-6">
                        <label for="">Email</label>
                        <input type="text" name='business_email' required placeholder="Owner Email" class="form-control"/>
                    </div>
                    <div class="col-md-12">
                        <label for="">Address</label>
                        <input type="text" name='business_owneraddress' required placeholder="Owner Address" class="form-control"/>
                    </div>
                    <div class="col-md-6">
                        <label for="">Password</label>
                        <input type="password" name="business_password" placeholder="Enter Password" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">Confirm Password</label>
                        <input type="password" name="business_confirmpassword" placeholder="Enter Confirm Password" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="">Status</label>
                        <input type="checkbox" name="status" >
                    </div> <br>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary" name="add_business_btn">Save</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>  
</div>


<?php include('includes/footer.php');?>