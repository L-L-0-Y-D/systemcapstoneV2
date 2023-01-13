<?php 

include('../middleware/adminMiddleware.php');
include('includes/header.php');

?>
<head>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel="stylesheet" href="assets/css/style-for-addadmin.css">
</head>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-9">
      <div class="card">
        <div class="card-header">
          <a href="admin.php" class="back btn-sm btn-close float-end" ></a>
          <h6 class="fw-bold">Add Admin</h6>
        </div>
        <div class="card-body">
            <form action="code.php" method="POST" enctype="multipart/form-data">
                <div class="row justify-content-center">
                    <div class="col-md-12 form-content">
                        <label >Upload Image</label>
                        <input type="file" name="image" id="file" accept=".jpg, .jpeg, .png" onchange="return profValidation();" required>
                        <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-content">
                                <label >Username:</label>
                                <input name='name' id="adminname" type="text" oninput="checkAdminName();" placeholder="Enter Username" required>
                                <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-content">
                                <label >Email Address:</label>
                                <input name='email' id='adminemail' oninput="checkAdminEmail();" type="email" placeholder="sample@gmail.com" required>
                                <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-content">
                                <label>First Name:</label>
                                <input name='firstname' id='adminfirstname' type="text" oninput="checkAdminFname();" placeholder="Enter First Name">
                                <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-content">
                                <label >Last Name:</label>
                                <input name='lastname' id='adminlastname' type="text" oninput="checkAdminLname();" placeholder="Enter Last Name">
                                <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- <div class="col">
                            <div class="form-content">
                                <label >Age:</label>
                                <input type="number" name="age" id="age" oninput="checkAge();" required >
                                <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error Message</small>
                            </div>
                        </div> -->
                        <div class="col">
                            <div class="form-content">
                                <label >Phone Number:</label>
                                <input type="text" name="phonenumber" id="adminphonenumber" required placeholder="Enter Phone Number" oninput="checkAdminContact();" >
                                <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error Message</small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-content">
                                <label>Complete Address:</label>
                                <input type="text" name='address' id="adminaddress" oninput="checkAdminAddress();" required placeholder="Enter Address">
                                <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                            </div>  
                        </div>  
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-content">
                                <label >Password</label>
                                <input name='password' id="adminpassword" oninput="checkAdminPassword();" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Enter Password" required>  
                                <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>
                                <div id="apassValidation">
                                    <h3>Password must contain the following:</h3>
                                    <p id="letter" class="invalid">A lowercase letter</p>
                                    <p id="capital" class="invalid">An Uppercase letter</p>
                                    <p id="number" class="invalid">A number</p>
                                    <p id="length" class="invalid">Must be atleast 8 characters</b></p>
                                </div>
                            </div>  
                        </div>
                        <div class="col">
                            <div class="form-content">
                                <label >Confirm Password</label>
                                <input name='confirmpassword' id="adminconfirmpassword" oninput="checkConAdminPword();"  type="password" placeholder="Confirm Password" required>
                                <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <input type = "hidden" name='role_as' value = '1'>
                    </div>
                    <div class="col-md-12">
                        <label for=""></label>
                        <input type="hidden" name="status" value = '1'>
                    </div> <br>
                    <div class="col-md-6">
                        <button type="submit" class="btn save-btn" name="add_customer_btn">Save</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>  
</div>
<script  src="assets/js/function-for-adminprof.js"></script>

<?php include('includes/footer.php');?>