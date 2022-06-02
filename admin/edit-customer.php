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
            $user = getByID("users",$id,"userid");

            if(mysqli_num_rows($user) > 0)
            {
                $data = mysqli_fetch_array($user)
                
            
            ?>
            <div class="card">
                <div class="card-header">
                <h4>Edit Cuisine
                    <a href="category.php" class="btn btn-primary float-end">Back</a>
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
                                <input type="hidden" name="userid" value="<?= $data['userid'] ?>">
                                <label for="">Username</label>
                                <input type="text" name="name" value="<?= $data['name'] ?>" placeholder="Enter Username" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="">Email</label>
                                <input type="email" name="email" value="<?= $data['email'] ?>" placeholder="Enter Email" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="">First Name</label>
                                <input type="text" name="firstname" value="<?= $data['firstname'] ?>" placeholder="Enter First Name" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="">Last Name</label>
                                <input type="text" name="Lastname" value="<?= $data['lastname'] ?>" placeholder="Enter Last Name" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="">Age</label>
                                <input type="number" name="age" value="<?= $data['age'] ?>" placeholder="Enter Age" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="">Phone Number</label>
                                <input type="text" name="phonenumber" value="<?= $data['phonenumber'] ?>" placeholder="Enter Phone Number" class="form-control" readonly>
                            </div>
                            <div class="col-md-12">
                                <label for="">Address</label>
                                <input type="text" name="address" value="<?= $data['address'] ?>" placeholder="Enter Address" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="">Password</label>
                                <input type="password" name="password" value="<?= $data['password'] ?>" placeholder="Enter Password" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="">Confirm Password</label>
                                <input type="password" name="confirmpassword" value="<?= $data['password'] ?>" placeholder="Enter Confirm Password" class="form-control" readonly>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Select Role</label>
                                <select name="role_as" class="form-select mb-2" >
                                    <option disabled selected hidden>Select Role</option>
                                    <option value="0">User</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="">Status</label>
                                <input type="checkbox" name="status" <?= $data['status'] == '0'? 'checked':'' ?>>
                            </div> <br>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary" name="update_customer_btn">Save</button>
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