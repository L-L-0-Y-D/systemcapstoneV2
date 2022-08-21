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
        <h3 class="text-dark mb-4">Profile
            <a href="index.php" class="btn btn-primary float-end" style="background:rgb(255,128,64); border:none;">Back</a>
        </h3>
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
        </div>
        <div class="col-lg-8">
            <div class="row mb-3 d-none">
                <div class="col">
                    <div class="card text-white bg-primary shadow">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col">
                                    <p class="m-0">Peformance</p>
                                    <p class="m-0"><strong>65.2%</strong></p>
                                </div>
                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                            </div>
                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-white bg-success shadow">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col">
                                    <p class="m-0">Peformance</p>
                                    <p class="m-0"><strong>65.2%</strong></p>
                                </div>
                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                            </div>
                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Admin Information</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">                        
                                        <!--Needed-->
                                        <input type="hidden" name="userid" value="<?= $data['userid'] ?>">
                                        <label class="form-label" for=""><strong>Username</strong><br></label>
                                        <input type="text" name="name" required value="<?= $data['name'] ?>" placeholder="Enter Username" class="form-control">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for=""><strong>Email Address</strong></label>
                                        <input type="email" name="email" required value="<?= $data['email'] ?>" placeholder="Enter Email" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">                                               
                                        <label class="form-label" for=""><strong>First Name</strong><br></label>
                                        <input type="text" name="firstname" required value="<?= $data['firstname'] ?>" placeholder="Enter First Name" class="form-control">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for=""><strong>Last Name</strong></label>
                                        <input type="text" name="lastname" required value="<?= $data['lastname'] ?>" placeholder="Enter Last Name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">                                               
                                        <label class="form-label" for=""><strong>Age</strong><br></label>
                                        <input type="number" name="age" required value="<?= $data['age'] ?>" placeholder="Enter Age" class="form-control">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for=""><strong>Phone Number</strong></label>
                                        <input type="text" name="phonenumber" required value="<?= $data['phonenumber'] ?>" placeholder="Enter Phone Number" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for=""><strong>Address</strong></label>
                                <input type="text" name="address" required value="<?= $data['address'] ?>" placeholder="Enter Address" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for=""><strong>Password</strong></label>
                                <input type="password" name="password" required placeholder="Enter Password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <input type = "hidden" name='role_as' value = '1'>
                                </select>
                            </div>
                            <div class="form-check form-switch">
                                <input type="hidden" name="status" value = '1'>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-sm" type="submit" name="update_admin_btn" style="background: rgb(255,128,64);color: var(--bs-white);">UPDATE ADMIN PROFILE&nbsp;</button>
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