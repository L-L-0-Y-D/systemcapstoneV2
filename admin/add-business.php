<?php 

include('../middleware/adminMiddleware.php');
include('includes/header.php');

?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-9">
      <div class="card">
        <div class="card-header">
          <h4>Add Business
            <a href="busiowner.php" class="back btn-sm btn-close float-end" ></a>
          </h4>
        </div>
        <div class="card-body">
            <form action="code.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Upload Business Image</label>
                        <input type="file" name="image" required class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="">Upload Business Certificate</label>
                        <input type="file" name="image_cert" required class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="">Business Name:</label>
                        <input type="text" name="business_name" required placeholder="Enter Business Name" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="">Business Address:</label>
                        <input type="text" name='business_address' required placeholder="Business Address" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">Select Business Municipality:</label>
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
                        <label for="">Select Cuisine Type:</label>
                        <select name='categoryid' required class="form-select mb-2">
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
                                echo "No Category Available";
                            }?>
                        </select>
                    </div>                    
                    <div class="col-md-6">
                        <label class="form-label" for="">Opening Time:</label>
                        <input class="form-control" type="time" name="opening" required >
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="">Closing Time:</label>
                        <input class="form-control" type="time" name="closing" required >
                    </div>
                    <h4>OWNER DETAILS</h4>
                    <div class="col-md-6">
                        <label for="">First Name:</label>
                        <input type="text" name="business_firstname" required placeholder="Enter First Name" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">Last Name:</label>
                        <input type="text" name="business_lastname" required placeholder="Enter Last Name" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">Phone Number:</label>
                        <input type="text" name='business_phonenumber' required required placeholder="Contact Number" class="form-control"/>
                    </div>
                    <div class="col-md-6">
                        <label for="">Email Address:</label>
                        <input type="text" name='business_email' required placeholder="Owner Email" class="form-control"/>
                    </div>
                    <div class="col-md-12">
                        <label for="">Address:</label>
                        <input type="text" name='business_owneraddress' required placeholder="Owner Address" class="form-control"/>
                    </div>
                    <div class="col-md-6">
                        <label for="">Password:</label>
                        <input type="password" name="business_password" required placeholder="Enter Password" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">Confirm Password:</label>
                        <input type="password" name="business_confirmpassword" required placeholder="Enter Confirm Password" class="form-control">
                    </div>
                    <div class="row">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="formCheck-1" name="status"> 
                            <label class="form-check-label m-0" for="formCheck-1"><strong>Status</strong></label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn save-btn" name="add_business_btn">Save</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>  
</div>


<?php include('includes/footer.php');?>