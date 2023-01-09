<?php 

include('../config/dbcon.php');
include('../middleware/businessMiddleware.php');
include('includes/header.php');


?>
<head>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel="stylesheet" href="assets/css/style-for-ownerprof.css">
</head>
<div class="container-fluid pt-3">
    <?php 
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $business = getByID("business",$id,"businessid");

            if(mysqli_num_rows($business) > 0)
            {
                $data = mysqli_fetch_array($business)
                
            
            ?>
            <a href="index.php" class="back float-end me-5 mt-2">Back&nbsp;<i class="fas fa-arrow-right"></i></a>
            <h4 class="text-dark">Your Business Profile</h4>
    <form action="code.php" method="POST" enctype="multipart/form-data">
    <div class="row mb-3 w-100">
        <div class="col-lg-4">
            <div class="card mb-3">
                <div class="card-header py-2">
                    <p class="fw-bold">Upload Profile</p>
                </div>
                <div class="card-body text-center shadow">
                    <img class="rounded-circle mb-3 mt-3" src="../uploads/<?= $data['image'] ?>" width="160" height="160">
                    <input type="hidden" name="old_image" value="<?= $data['image'] ?>"><br>
                    <div class="form-content">
                        <label class="form-label float-start" >Change Profile:<br></label>
                        <input type="file" name="image" id="file" accept=".jpg, .jpeg, .png" onchange="return fileValidation();">
                        <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <p class="fw-bold">Business Time</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-content">
                                <label class="form-label" for=""><strong>Opening Time:</strong><br></label>
                                <input type="time" name="opening" value="<?= $data['opening'] ?>" id="opening" oninput="checkOpening();" placeholder="Opening Time"  required>
                                <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><br><small>Error message</small>  
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-content"> 
                                <label class="form-label" for=""><strong>Closing Time:</strong><br></label>
                                <input type="time" name="closing" value="<?= $data['closing'] ?>" id="closing" oninput="checkClosing();" required placeholder="Closing">
                                <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><br><small>Error message</small>  
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-content"> 
                        <label class="form-label">Time Duration For Every Reservation(Minutes)</label>
                        <input type="number" name="duration"  id="duration" value="<?= $data['duration'] ?>" oninput="checkDuration();"  required>
                        <small>Error message</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-check">
                        <input class= "form-checkbox float-start mt-2" type="checkbox" style="margin-right:5px;" name="sameday" <?= $data['sameday_reservation'] == '1'? 'checked':'' ?>></input>
                            <label class="form-label text-black" for="formCheck-1">Have same day reservation?</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row">
                <div class="col">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class="fw-bold">Business Information</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="form-content">                          
                                        <!--Needed-->
                                        <input type="hidden" name="businessid" value="<?= $data['businessid'] ?>">
                                        <label class="form-label" for="business_name"><strong>Business Name</strong><br></label>
                                        <input type="text" name='business_name' id="businessname" oninput="checkBusiName();" value="<?= $data['business_name'] ?>" required placeholder="Enter Business Name">
                                        <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-content">
                                        <label class="form-label" for=""><strong>Contact Number</strong></label>
                                        <input name='business_number' id='businessnumber' value="<?= $data['business_number'] ?>" oninput="checkbusiPhone();" type="text" required>
                                        <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-content">
                                        <label class="form-label" for="email"><strong>Full Address</strong></label>
                                        <input type="text" name='business_address' id='businessaddress' oninput="checkBusiAddress();" value="<?= $data['business_address'] ?>"  required placeholder="Business Address">
                                        <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
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
                                        <label class="form-label" for=""><strong>Cuisine Type:</strong></label>
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
                                                        >&nbsp<?= $item['categoryname']; ?></input>
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
                            <p class="fw-bold">Business Owner Details</p>
                        </div>
                        <div class="card-body">                            
                            <div class="row">
                                <div class="col">
                                    <div class="form-content"><label class="form-label" for=""><strong>First Name</strong></label>
                                    <input name='business_firstname' id='businessfirstname' type="text" oninput="checkbusiFname();" value="<?= $data['business_firstname'] ?>" placeholder="Enter First Name">
                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-content"><label class="form-label" for=""><strong>Last Name</strong></label>
                                    <input name='business_lastname' id='businesslastname' type="text" oninput="checkbusiLname();" value="<?= $data['business_lastname'] ?>" placeholder="Enter Last Name">
                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-content"><label class="form-label" for=""><strong>Phone Number</strong></label>
                                    <input name='business_phonenumber' id='businessphonenumber' oninput="checkbusiNum();" type="text" value="<?= $data['business_phonenumber'] ?>"  required placeholder="Contact Number">
                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                    </div>
                                 </div>
                                <div class="col">
                                    <div class="form-content"><label class="form-label" for=""><strong>Email Address</strong></label>
                                    <input name='business_email' id='businessemail' oninput="checkbusiEmail();" type="email" placeholder="sample@gmail.com" value="<?= $data['business_email'] ?>"  required>
                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-content">
                                <label class="form-label" for=""><strong>Address</strong></label>
                                <input name='business_owneraddress' id='businessowneraddress' oninput="checkownerAdd();" type="text" value="<?= $data['business_owneraddress'] ?>"  required placeholder="Owner Address">
                                <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                            </div>
                            <div class="form-content">
                                <label class="form-label" for=""><strong>Password</strong></label>

                                <input name='business_password' id="businesspassword" placeholder="Enter Password" type="password" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>  

                                <!-- <input name='business_password' id="businesspassword" oninput="checkBusiPassword();" placeholder="Enter Password" type="password"  title="Password" required>   -->

                            </div>
                            <div class="form-check form-switch">
                                <input type="hidden" name="status" <?= $data['status'] == '1'? 'checked':'' ?>>
                            </div>
                            <div class="">
                                <button class="btn update-btn " type="submit" name="edit_business_btn">Update Business Profile</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3 w-100">
            <div class="col-lg-6">
                <div class="card mb-3">
                    <div class="card-header py-2">
                        <p class="fw-bold">Business Permit</p>
                    </div>
                    <div class="card-body text-center shadow">
                        <a href="../certificate/<?= $data['image_cert'] ?>"><img class="rounded mb-3 mt-3" src="../certificate/<?= $data['image_cert'] ?>" width="160" height="160"></a>
                        <input type="hidden" name="old_image_cert" value="<?= $data['image_cert'] ?>"><br>
                        <div class="form-content">
                            <label class="form-label float-start" >Upload your DTI Business Permit<br></label>
                            <input type="file" name="image_cert" id="imagecert" accept=".jpg, .jpeg, .png" onchange="return certValidation();">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><br><small>Error message</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mb-3">
                    <div class="card-header py-2">
                        <p class="fw-bold">Sanitary Permit</p>
                    </div>
                    <div class="card-body shadow">
                        <a href="../certificate/<?= $data['image_scert'] ?>">
                        <img class="rounded mb-3 mt-3" src="../certificate/<?= $data['image_scert'] ?>" width="160" height="160"></a>
                        <input type="hidden" name="old_image_scert" value="<?= $data['image_scert'] ?>"><br>
                        <div class="form-content">
                            <label class="form-label float-start" >Upload your Sanitary Permit<br></label>
                            <input type="file" name="image_scert" id="imagescert" accept=".jpg, .jpeg, .png" onchange="return scertValidation();">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><br><small>Error message</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mb-3">
                    <div class="card-header py-2">
                        <p class="fw-bold">Fire Safety Permit</p>
                    </div>
                    <div class="card-body shadow">
                        <a href="../certificate/<?= $data['image_fcert'] ?>">
                        <img class="rounded mb-3 mt-3" src="../certificate/<?= $data['image_fcert'] ?>" width="160" height="160"></a>
                        <input type="hidden" name="old_image_fcert" value="<?= $data['image_fcert'] ?>"><br>
                        <div class="form-content">
                            <label class="form-label float-start" >Upload your Fire Safety Permit<br></label>
                            <input type="file" name="image_fcert" id="imagefscert" accept=".jpg, .jpeg, .png" onchange="return fscertValidation();">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><br><small>Error message</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mb-3">
                    <div class="card-header py-2">
                        <p class="fw-bold">Brgy. Clearance Permit</p>
                    </div>
                    <div class="card-body shadow">
                        <a href="../certificate/<?= $data['image_bcert'] ?>">
                        <img class="rounded mb-3 mt-3" src="../certificate/<?= $data['image_bcert'] ?>" width="160" height="160"></a>
                        <input type="hidden" name="old_image_bcert" value="<?= $data['image_bcert'] ?>"><br>
                        <div class="form-content">
                            <label class="form-label float-start" >Upload your Brgy. Clearance Permit<br></label>
                            <input type="file" name="image_bcert" id="imagebccert" accept=".jpg, .jpeg, .png" onchange="return bccertValidation();">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><br><small>Error message</small>
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
<script  src="assets/js/function-for-ownerprof.js"></script>
<?php include('includes/footer.php');?>