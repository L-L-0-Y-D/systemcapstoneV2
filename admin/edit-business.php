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
            $business = getByID("business",$id,"businessid");

            if(mysqli_num_rows($business) > 0)
            {
                $data = mysqli_fetch_array($business)
                
            
            ?>
            <div class="card">
                <div class="card-header">
                <h4>Edit Business
                    <a href="busiowner.php" class="btn btn-primary float-end">Back</a>
                </h4>   
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                                <div class="col-md-12">
                                <label for="">Upload Image</label>
                                <input type="file" name="image" class="form-control" disabled>
                                <label for="">Current Image</label>
                                <img src="../uploads/<?= $data['image'] ?>" height="50px" width="50px">
                                <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                            </div>
                            <div class="col-md-6">
                                <!--Needed-->
                                <input type="hidden" name="businessid" value="<?= $data['businessid'] ?>">
                                <label for="">Business Name</label>
                                <input type="text" name="business_name" value="<?= $data['business_name'] ?>" required placeholder="Enter Business Name" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="">Business address</label>
                                <input type="text" name="business_address" value="<?= $data['business_address'] ?>"  required placeholder="Business Address" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="">Select Business Municipality</label>
                                <select name='municipalityid' class="form-select mb-2" disabled>
                                    <option readonly value="" disabled selected hidden>Municipality</option>
                                    <?php 
                                    $municipality = getAll("municipality");
                                    if(mysqli_num_rows($municipality) > 0)
                                    {
                                        foreach ($municipality as $item)
                                        {
                                            ?>
                                            <option value="<?= $item['municipalityid']; ?>" <?= $data['municipalityid'] == $item['municipalityid']?'selected':''?>><?= $item['municipality_name']; ?></option>
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
                                <select name='categoryid' class="form-select mb-2" disabled>
                                    <option value="" disabled selected hidden>Cuisine Type</option>
                                    <?php 
                                    $category = getAll("mealcategory");
                                    if(mysqli_num_rows($category) > 0)
                                    {
                                        foreach ($category as $item)
                                        {
                                            ?>
                                            <option value="<?= $item['categoryid']; ?>" <?= $data['categoryid'] == $item['categoryid']?'selected':''?>><?= $item['categoryname']; ?></option>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "No Category Available";
                                    }?>
                                </select>
                            </div>
                            <h3>OWNER DETAILS</h3>
                            <div class="col-md-6">
                                <label for="">First Name</label>
                                <input type="text" name="business_firstname" value="<?= $data['business_firstname'] ?>" placeholder="Enter First Name" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="">Last Name</label>
                                <input type="text" name="business_lastname" value="<?= $data['business_lastname'] ?>" placeholder="Enter Last Name" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="">Phone Number</label>
                                <input type="text" name="business_phonenumber" value="<?= $data['business_phonenumber'] ?>"  required placeholder="Contact Number" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="">Email</label>
                                <input type="text" name="business_email" value="<?= $data['business_email'] ?>"  required placeholder="Owner Email" class="form-control" readonly>
                            </div>
                            <div class="col-md-12">
                                <label for="">Address</label>
                                <input type="text" name="business_owneraddress" value="<?= $data['business_owneraddress'] ?>"  required placeholder="Owner Address" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="">Password</label>
                                <input type="password" name="business_password" value="<?= $data['business_password'] ?>"  placeholder="Enter Password" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="">Confirm Password</label>
                                <input type="password" name="business_confirmpassword" value="<?= $data['business_password'] ?>"  placeholder="Enter Confirm Password" class="form-control" readonly>
                            </div>
                            <div class="col-md-12">
                                <label for="">Status</label>
                                <input type="checkbox" name="status" <?= $data['status'] == '0'? 'checked':'' ?>>
                            </div> <br>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary" name="edit_business_btn">Save</button>
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