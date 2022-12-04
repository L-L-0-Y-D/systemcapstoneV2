<?php 

include('../middleware/adminMiddleware.php');
include('includes/header.php');


?>
<div class="container-fluid">
    <?php 
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $user = getByID("users",$id,"userid");

            if(mysqli_num_rows($user) > 0)
            {
                $data = mysqli_fetch_array($user)          
        ?>
            <a href="index.php" class="back float-end me-3 mt-2">Back&nbsp;<i class="fas fa-arrow-right"></i></a>
            <h4 class="text-dark">Admin's Profile</h4>
    <form action="code.php" method="POST" enctype="multipart/form-data">
    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card mb-3">
                <div class="card-header py-3">
                    <p class="text-primary fw-bold">Upload Profile</p>
                </div>
                <div class="card-body text-center shadow">
                    <img class="rounded-circle mb-3 mt-4" src="../uploads/<?= $data['image'] ?>" width="160" height="160">
                    <input type="hidden" name="old_image" value="<?= $data['image'] ?>"><br>
                    <label class="form-label float-start" ><strong>Change Profile:</strong><br></label>
                    <div class="mb-3"><input type="file" name="image" class="form-control"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row">
                <div class="col">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class="text-primary fw-bold">Admin Information</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div>                        
                                        <!--Needed-->
                                        <input type="hidden" name="userid" value="<?= $data['userid'] ?>">
                                        <label class="form-label" for=""><strong>Username</strong><br></label>
                                        <input type="text" name="name" required value="<?= $data['name'] ?>" placeholder="Enter Username" class="form-control">
                                    </div>
                                </div>
                                <div class="col">
                                    <div>
                                        <label class="form-label" for=""><strong>Email Address</strong></label>
                                        <input type="email" name="email" required value="<?= $data['email'] ?>" placeholder="Enter Email" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div>                                               
                                        <label class="form-label" for=""><strong>First Name</strong><br></label>
                                        <input type="text" name="firstname" required value="<?= $data['firstname'] ?>" placeholder="Enter First Name" class="form-control">
                                    </div>
                                </div>
                                <div class="col">
                                    <div>
                                        <label class="form-label" for=""><strong>Last Name</strong></label>
                                        <input type="text" name="lastname" required value="<?= $data['lastname'] ?>" placeholder="Enter Last Name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div>                                               
                                    <label class="fw-bold mb-2">Date of birth</label>
                                    <input type="date" name='dateofbirth' value="<?= $data['dateofbirth'] ?>" class="form-control form-control-sm item" style="font-size: 14px;height: 40px;" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div>
                                        <label class="form-label" for=""><strong>Phone Number</strong></label>
                                        <input type="text" name="phonenumber" required value="<?= $data['phonenumber'] ?>" placeholder="Enter Phone Number" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label class="form-label" for=""><strong>Address</strong></label>
                                <input type="text" name="address" required value="<?= $data['address'] ?>" placeholder="Enter Address" class="form-control">
                            </div>
                            <div>
                                <label class="form-label" for=""><strong>Password</strong></label>
                                <input type="password" name="password" required placeholder="Enter Password" class="form-control">
                            </div>
                            <div>
                                <input type = "hidden" name='role_as' value = '1'>
                                </select>
                            </div>
                            <div class="form-check form-switch">
                                <input type="hidden" name="status" value = '1'>
                            </div>
                            <div>
                                <button class="btn update-btn btn-sm" type="submit" name="update_admin_btn">Update Admin Profile</button>
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
            echo "Users not Found";
        }
            }
            else
            {
                echo"ID missing from url";
            }
    ?>
</div>

<?php include('includes/footer.php');?>