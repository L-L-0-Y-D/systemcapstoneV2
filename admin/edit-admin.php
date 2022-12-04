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
            $user = getByID("users",$id,"userid");

            if(mysqli_num_rows($user) > 0)
            {
                $data = mysqli_fetch_array($user)
                
            
            ?>
            <div class="card">
                <div class="card-header">
                    <a href="admin.php" class="back btn-sm btn-close float-end"></a>
                    <h5 class="fw-bold">Edit Admin</h5>   
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Current Image</label>
                                <img class="rounded img-fluid" src="../uploads/<?= $data['image'] ?>" height="100" width="100">
                                <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="">Update Image</label>
                                <input type="file" name="image" class="form-control" readonly>
                            </div>               
                            <div class="col-md-6">
                                <!--Needed-->
                                <input type="hidden" name="userid" value="<?= $data['userid'] ?>">
                                <label for="">Username:</label>
                                <input type="text" name="name" required value="<?= $data['name'] ?>" placeholder="Enter Username" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="">Email Address:</label>
                                <input type="email" name="email" required value="<?= $data['email'] ?>" placeholder="Enter Email" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="">First Name:</label>
                                <input type="text" name="firstname" required value="<?= $data['firstname'] ?>" placeholder="Enter First Name" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="">Last Name:</label>
                                <input type="text" name="lastname" required value="<?= $data['lastname'] ?>" placeholder="Enter Last Name" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                            <label for="" class="mt-2">Date of Birth:</label>
                                    <input type="date" name='dateofbirth' value="<?= $data['dateofbirth'] ?>" class="form-control form-control-sm item" style="font-size: 14px;height: 40px;" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="">Phone Number:</label>
                                <input type="text" name="phonenumber" required value="<?= $data['phonenumber'] ?>" placeholder="Enter Phone Number" class="form-control" readonly>
                            </div>
                            <div class="col-md-12">
                                <label for="">Complete Address:</label>
                                <input type="text" name="address" required value="<?= $data['address'] ?>" placeholder="Enter Address" class="form-control" readonly>
                            </div>
                            <div class="col-md-12">
                                <input type = "hidden" name='role_as' value = '1'>
                            </div>
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
                                            <option value="2">Closed</option>';}
                                    elseif($data['status'] == 2)
                                    {echo  '<option value="0" hidden>Waiting</option>
                                            <option value="1" >Approve</option>
                                            <option value="2" selected>Closed</option>';} 
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn update-btn btn-sm" name="update_admin_btn">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php
            }
            else
            {
                echo "Users not Found";
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