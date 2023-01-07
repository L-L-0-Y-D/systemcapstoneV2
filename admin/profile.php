<?php 

include('../middleware/adminMiddleware.php');
include('includes/header.php');


?>
<head>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel="stylesheet" href="assets/css/style-for-adminprof.css">
</head>
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
            <h3 class="text-dark mb-2 mx-3">Admin's Profile</h3> 
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
                        <input type="file" name="image" id="file" accept=".jpg, .jpeg, .png" onchange="return profValidation();" required>
                        <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row">
                <div class="col">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class=" fw-bold">Admin Information</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="form-content">
                                        <input type="hidden" name="userid" value="<?= $data['userid'] ?>">
                                        <label class="form-label" for=""><strong>Username</strong></label>
                                        <input name='name' id="adminname" type="text" oninput="checkAdminName();" value="<?= $data['name'] ?>" placeholder="Enter Username" required>
                                        <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-content">
                                        <label class="form-label" for=""><strong>Email Address</strong></label>
                                        <input name='email' id='adminemail' oninput="checkAdminEmail();" type="email" placeholder="sample@gmail.com" value="<?= $data['email'] ?>"  required>
                                        <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-content">
                                        <label class="form-label" for=""><strong>First Name</strong></label>
                                        <input name='firstname' id='adminfirstname' type="text" oninput="checkAdminFname();" value="<?= $data['firstname'] ?>" placeholder="Enter First Name">
                                        <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-content">
                                        <label class="form-label" for=""><strong>Last Name</strong></label>
                                        <input name='lastname' id='adminlastname' type="text" oninput="checkAdminLname();" value="<?= $data['lastname'] ?>" placeholder="Enter Last Name">
                                        <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-content">
                                        <label for="dob">Date of Birth</span></label>
                                        <input name='dateofbirth' type="date" value="<?= $data['dateofbirth'] ?>" id="admindate" oninput="checkAdminBirthDate();" required>
                                        <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error Message</small>
                                    </div>
                                </div>      
                                <div class="col">
                                    <div class="form-content">
                                        <label class="form-label" for=""><strong>Phone Number</strong></label>
                                        <input type="text" name="phonenumber" id="adminphonenumber" required value="<?= $data['phonenumber'] ?>" placeholder="Enter Phone Number" oninput="checkAdminContact();" >
                                        <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error Message</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-content">
                                        <label class="form-label" for="email"><strong>Address</strong></label>
                                        <input type="text" name='address' id="adminaddress" oninput="checkAdminAddress();" value="<?= $data['address'] ?>"  required placeholder="Enter Address">
                                        <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-content">
                                <label class="form-label" for=""><strong>Password</strong></label>
                                <input type="password" name="password" placeholder="Enter Password" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>  
                            </div>
                            <div>
                                <input type = "hidden" name='role_as' value = '1'>
                                </select>
                            </div>
                            <div class="form-check form-switch">
                                <input type="hidden" name="status" value = '1'>
                            </div>
                            <div>
                                <button class="btn update-btn" type="submit" name="update_admin_btn">Update Admin Profile</button>
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
<script  src="assets/js/function-for-adminprof.js"></script>
<?php include('includes/footer.php');?>