<?php 

include('../middleware/adminMiddleware.php');
include('includes/header.php');


?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-9">
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
                        <a href="busiowner.php" class="back btn-sm btn-close float-end"></a>
                    </h4>   
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Current Business Image</label>
                                <img class="rounded img-fluid" src="../uploads/<?= $data['image'] ?>" height="100" width="100">
                                <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="">Update Business Image</label>
                                <input type="file" name="image" class="form-control" disabled>
                            </div>
                            <div class="col-md-6">  
                                <label for="">Current Business Certificate</label>
                                <img src="../certificate/<?= $data['image_cert'] ?>" height="100" width="100">
                                <input type="hidden" name="old_image_cert" value="<?= $data['image_cert'] ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="">Update Business Certificate</label>
                                <input type="file" name="image_cert" class="form-control" disabled >
                            </div>
                            <div class="col-md-6">
                                <!--Needed-->
                                <input type="hidden" name="businessid" value="<?= $data['businessid'] ?>">
                                <label for="">Business Name</label>
                                <input type="text" name="business_name"  value="<?= $data['business_name'] ?>" required placeholder="Enter Business Name" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="">Business address</label>
                                <input type="text" name="business_address" value="<?= $data['business_address'] ?>"  required placeholder="Business Address" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="">Select Business Municipality</label>
                                <select name='municipalityid' readonly required class="form-select mb-2" disabled>
                                    <option value="" disabled selected hidden>Municipality</option>
                                    <?php 
                                    $municipality = getAll("municipality");
                                    if(mysqli_num_rows($municipality) > 0)
                                    {
                                        foreach ($municipality as $item)
                                        {
                                            ?>
                                            <option readonly value="<?= $item['municipalityid']; ?>" <?= $data['municipalityid'] == $item['municipalityid']?'selected':''?>><?= $item['municipality_name']; ?></option>
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
                                <label for="">Select Cuisine Type</label><br>
                                <input type="text" name="cuisinename" value="<?= $data['cuisinename'] ?>"  required placeholder="Cuisine Type" class="form-control" readonly>
                            </div>                                                      
                            <div class="col-md-6">
                                <label for="">Openig Time</label>
                                <input type="text" name="opening" value="<?= date('h:i A', strtotime($data['opening'])); ?>"  required placeholder="opening" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="">Closing Time</label>
                                <input type="text" name="closing" value="<?= date('h:i A', strtotime($data['closing'])); ?>"  required placeholder="closing" class="form-control" readonly>
                            </div>
                            <h4 class="mt-3">OWNER DETAILS</h4>
                            <div class="col-md-6">
                                <label for="">First Name</label>
                                <input type="text" name="business_firstname" required value="<?= $data['business_firstname'] ?>" placeholder="Enter First Name" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="">Last Name</label>
                                <input type="text" name="business_lastname" required value="<?= $data['business_lastname'] ?>" placeholder="Enter Last Name" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="">Phone Number</label>
                                <input type="text" name="business_phonenumber" required value="<?= $data['business_phonenumber'] ?>"  required placeholder="Contact Number" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="">Email Address</label>
                                <input type="text" name="business_email" required value="<?= $data['business_email'] ?>"  required placeholder="Owner Email" class="form-control" readonly>
                            </div>
                            <div class="col-md-12">
                                <label for="">Address</label>
                                <input type="text" name="business_owneraddress" required value="<?= $data['business_owneraddress'] ?>"  required placeholder="Owner Address" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="">Password</label>
                                <input type="password" name="business_password" required value="<?= $data['business_password'] ?>"  placeholder="Enter Password" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="">Confirm Password</label>
                                <input type="password" name="business_confirmpassword" required value="<?= $data['business_password'] ?>"  placeholder="Enter Confirm Password" class="form-control" readonly>
                            </div>
                            <!-- <div class="col-md-12">
                                <label for="">Status</label>
                                <input type="checkbox" name="status" <?= $data['status'] == '1'? 'checked':'' ?>>
                            </div> <br> -->
                            <div class="col-md-12">
                                <label for="">Status</label>
                                <select name='status' required class="form-select mb-2">
                                    <?php
                                    if($data['status'] == 0)
                                    { echo '<option value="0" selected hidden>Waiting</option>
                                            <option value="1">Approve</option>
                                            <option value="2">Declined</option>'; } 
                                    elseif($data['status'] == 1)
                                    { echo '<option value="0" hidden>Waiting</option>
                                            <option value="1" selected>Approve</option>
                                            <option value="2">Declined</option>';}
                                    elseif($data['status'] == 2)
                                    {echo  '<option value="0" hidden>Waiting</option>
                                            <option value="1" >Approve</option>
                                            <option value="2" selected>Declined</option>';} 
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn update-btn" name="edit_business_btn">Update</button>
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