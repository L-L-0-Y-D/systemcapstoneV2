<?php 

include('../config/dbcon.php');
include('../middleware/businessMiddleware.php');
include('includes/header.php');


?>
<div class="container-fluid">
    <?php 
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $business = getByID("business",$id,"businessid");

            if(mysqli_num_rows($business) > 0)
            {
                $data = mysqli_fetch_array($business)
                
            
            ?>
        <h4 class="text-dark mb-4">Your Business Profile
            <a href="index.php" class="btn btn-primary float-end">Back</a>
        </h4>
    <form action="code.php" method="POST" enctype="multipart/form-data">
    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card mb-3">
                <div class="card-header py-3">
                    <h6 class="text-primary fw-bold m-0">Upload Profile</h6>
                </div>
                <div class="card-body text-center shadow">
                    <img class="rounded-circle mb-3 mt-4" src="../uploads/<?= $data['image'] ?>" width="160" height="160">
                    <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                    <div class="mb-3"><input type="file" name="image" class="form-control"></div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="text-primary fw-bold m-0">Business Time</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">  
                                <h4 class="small fw-bold">
                                    <label class="form-label" for="username"><strong>Opening Time:</strong><br></label>
                                    <input type="time" name="opening" value="<?= $data['opening'] ?>"  required placeholder="Opening">
                                </h4>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3"> 
                                <h4 class="small fw-bold">
                                    <label class="form-label" for="username"><strong>Closing Time:</strong><br></label>
                                    <input type="time" name="closing" value="<?= $data['closing'] ?>"  required placeholder="Closing">
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">                  
                <div class="card-header py-3">
                    <h6 class="text-primary fw-bold m-0">Business Certificate</h6>
                </div>
                <div class="card-body text-center shadow">
                    <a href="../certificate/<?= $data['image_cert'] ?>">   
                    <img class="rounded mb-3 mt-4" src="../certificate/<?= $data['image_cert'] ?>" width="160" height="160"></a>
                    <input type="hidden" name="old_image_cert" value="<?= $data['image_cert'] ?>">
                    <div class="mb-3"><input type="file" name="image_cert" class="form-control"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row">
                <div class="col">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Business Information</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">                          
                                        <!--Needed-->
                                        <input type="hidden" name="businessid" value="<?= $data['businessid'] ?>">
                                        <label class="form-label" for="business_name"><strong>Business Name</strong><br></label>
                                        <input type="text" name="business_name" value="<?= $data['business_name'] ?>" required placeholder="Enter Business Name" class="form-control">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="email"><strong>Business Address</strong></label>
                                        <input type="text" name="business_address" value="<?= $data['business_address'] ?>"  required placeholder="Business Address" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for=""><strong>Business Municipality</strong><br></label>
                                        <select name='municipalityid' class="form-select mb-2">
                                            <option value="" disabled selected hidden>Municipality</option>
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
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for=""><strong>Cuisine Type</strong></label>
                                        <?php 
                                            //$category = getAllActive("mealcategory");
                                            $query = "SELECT * FROM mealcategory ";
                                            $query_run = mysqli_query($con, $query);
                                            if(mysqli_num_rows($query_run) > 0)
                                                {
                                                    foreach ($query_run as $item)
                                                    {
                                                        ?>
                                                        <input type="checkbox" name="cuisinename[]" value="<?= $item['categoryname']; ?>"
                                                        <?php
                                                            $cuisine = str_word_count($data['cuisinename'],1);
                                                            foreach ($cuisine as $itemcuisine)
                                                            {
                                                            ?>
                                                            <?= $itemcuisine == $item['categoryname']?'checked':''?>
                                                            <?php
                                                            }
                                                        ?>
                                                        ><?= $item['categoryname']; ?></input>
                                                        <?php
                                                    }
                                                }
                                            else
                                                {
                                                    echo "No Cuisine Type Available";
                                                }
                                        ?>
                                        <a style="color: black;" href="addcuisine.php">Add Cuisine Type</a>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Business Owner Details</p>
                        </div>
                        <div class="card-body">                            
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3"><label class="form-label" for=""><strong>First Name</strong></label>
                                        <input type="text" name="business_firstname" value="<?= $data['business_firstname'] ?>" placeholder="Enter First Name" class="form-control">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3"><label class="form-label" for=""><strong>Last Name</strong></label>
                                        <input type="text" name="business_lastname" value="<?= $data['business_lastname'] ?>" placeholder="Enter Last Name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3"><label class="form-label" for=""><strong>Phone Number</strong></label>
                                        <input type="text" name="business_phonenumber" value="<?= $data['business_phonenumber'] ?>"  required placeholder="Contact Number" class="form-control">
                                    </div>
                                 </div>
                                <div class="col">
                                    <div class="mb-3"><label class="form-label" for=""><strong>Email Address</strong></label>
                                        <input type="text" name="business_email" value="<?= $data['business_email'] ?>"  required placeholder="Owner Email" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for=""><strong>Address</strong></label>
                                <input type="text" name="business_owneraddress" value="<?= $data['business_owneraddress'] ?>"  required placeholder="Owner Address" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for=""><strong>Password</strong></label>
                                <input type="password" name="business_password" placeholder="Enter Password" class="form-control" required>
                            </div>
                            <div class="form-check form-switch">
                                <input type="hidden" name="status" <?= $data['status'] == '1'? 'checked':'' ?>>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-sm" type="submit" name="edit_business_btn">UPDATE BUSINESS PROFILE&nbsp;</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>       
</div>
</form>      
    <?php
        }
        else
        {
            echo "Business not Found";
        }
            }
            else
            {
            echo"ID missing from url";
            }
    ?>
</div>

<?php include('includes/footer.php');?>