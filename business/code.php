<?php

include('../config/dbcon.php');
include('../functions/businessfunctions.php');

if(isset($_POST['add_product_btn']))
{
    $businessid = $_POST['businessid'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $status = isset($_POST['status']) ? "1":"0";

    $image = $_FILES['image']['name'];

    $path = "../uploads";

    // Get Image Dimension
    $fileinfo = @getimagesize($_FILES["image"]["tmp_name"]);

    $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );
    
    // Get image file extension
    $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
    
    // Validate file input to check if is not empty
   if (! file_exists($_FILES["image"]["tmp_name"])) {
       
        redirect("add-menu.php?id=$businessid", "Choose image file to upload.");
    
   }  // Validate file input to check if is with valid extension
   else if (! in_array($file_extension, $allowed_image_extension)) {

       redirect("add-menu.php?id=$businessid", "Upload valid images. Only PNG and JPEG are allowed in business image.");
   }// Validate image file size less than
   else if (($_FILES["image"]["size"] < 2000000)) {

       redirect("add-menu.php?id=$businessid", "Image size less than 2MB");

   }    // Validate image file size that is greater
   else if (($_FILES["image"]["size"] > 10000000)) {

       redirect("add-menu.php?id=$businessid", "Image size exceeds 10MB");
   }

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    $product_query = "INSERT INTO products (businessid,name,description,price,status,image) 
    VALUES ('$businessid','$name','$description','$price','$status','$filename')";

    $product_query_run = mysqli_query($con, $product_query);

    if($product_query_run)
    {
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
        redirect("menu.php?id=$businessid", "Product Added Successfully");
    }else
    {
        redirect("add-menu.php?id=$businessid", "Something Went Wrong");
    }
}
elseif (isset($_POST['update_product_btn']))
{
    $productid = $_POST['productid'];
    $businessid = $_POST['businessid'];

    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $status = isset($_POST['status']) ? "1":"0";

    $path = "../uploads";

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    // Get Image Dimension
    $fileinfo = @getimagesize($_FILES["image"]["tmp_name"]);

    $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );
    
    // Get image file extension
    $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
    
    // Validate file input to check if is not empty
   if (! file_exists($_FILES["image"]["tmp_name"])) {
       
        redirect("add-menu.php?id=$businessid", "Choose image file to upload.");
    
   }  // Validate file input to check if is with valid extension
   else if (! in_array($file_extension, $allowed_image_extension)) {

       redirect("add-menu.php?id=$businessid", "Upload valid images. Only PNG and JPEG are allowed in business image.");
   }// Validate image file size less than
   else if (($_FILES["image"]["size"] < 2000000)) {

       redirect("add-menu.php?id=$businessid", "Image size less than 2MB");

   }    // Validate image file size that is greater
   else if (($_FILES["image"]["size"] > 10000000)) {

       redirect("add-menu.php?id=$businessid", "Image size exceeds 10MB");
   }

    if($new_image != "")
    {
        //$update_filename = $new_image;
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time().'.'.$image_ext;
    }
    else
    {
        $update_filename = $old_image;
    }

    $update_product_query = " UPDATE products SET name='$name', description='$description',price='$price',status='$status',image='$update_filename' WHERE productid='$productid'";
    $update_product_query_run = mysqli_query($con, $update_product_query);

    if($update_product_query_run)
    {
        if($_FILES['image']['name'] != "")
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename);
            if(file_exists("../uploads/".$old_image))
            {
                unlink("../uploads/".$old_image);
            }
        }
        redirect("menu.php?id=$businessid", "Product Updated Successfully");

    }
    else
    {
        redirect("edit-menu.php?id=$product_id", "Something Went Wrong"); 
    }

}
elseif (isset($_POST['delete_product_btn']))
{
    $productid = mysqli_real_escape_string($con,$_POST['productid']);

    $product_query = "SELECT * FROM products WHERE productid='$productid' ";
    $product_query_run = mysqli_query($con, $product_query);
    $product_data = mysqli_fetch_array($product_query_run);

    $image = $product_data['image'];

    $delete_query = "DELETE FROM products WHERE productid='$productid' ";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run)
    {
        if(file_exists("../uploads/".$image))
        {
            unlink("../uploads/".$image);
        }

        //redirect("products.php", "Product Deleted Successfully");
        echo 200;
    }
    else
    {
        //redirect("products.php", "Something went wrong");
        echo 500;
    }

}
elseif (isset($_POST['update_reservation_btn']))
{
    $reservationid = $_POST['reservationid'];
    $businessid = $_POST['businessid'];
    $userid = $_POST['userid'];

    $numberofguest = $_POST['numberofguest'];
    $namereserveunder = $_POST['namereserveunder'];
    $reservation_email = $_POST['reservation_email'];
    $reservation_phonenumber = $_POST['reservation_phonenumber'];
    $reservation_date = $_POST['reservation_date'];
    $reservation_time = $_POST['reservation_time'];
    $status = isset($_POST['status']) ? "1":"0";

    $update_query = "UPDATE reservations SET numberofguest='$numberofguest',businessid='$businessid',userid='$userid',namereserveunder='$namereserveunder',reservation_email='$reservation_email',reservation_phonenumber='$reservation_phonenumber',reservation_date='$reservation_date',reservation_time='$reservation_time', status='$status' WHERE reservationid='$reservationid'";
    //mysqli_query($con,$update_query) or die("bad query: $update_query");

    $update_query_run = mysqli_query($con, $update_query);

    if($update_query_run)
    {
        redirect("reservation.php?id=$businessid", "Reservation Updated Successfully");
    }
    else
    {
        redirect("edit-reservation.php?id=$reservationid", "Something Went Wrong"); 
    }

}
else if(isset($_POST['edit_business_btn']))
{
    $businessid = $_POST['businessid'];
    $business_name = $_POST['business_name'];
    $business_address = $_POST['business_address'];
    $municipalityid = $_POST['municipalityid'];
    $categoryid = $_POST['categoryid'];
    $business_firstname = $_POST['business_firstname'];
    $business_lastname = $_POST['business_lastname'];
    $business_email = $_POST['business_email'];
    $business_phonenumber = $_POST['business_phonenumber'];
    $business_owneraddress = $_POST['business_owneraddress'];
    $business_password = $_POST['business_password'];
    $status = isset($_POST['status']) ? "1":"0";

    $new_image = $_FILES['image']['name'];
    $new_image_cert = $_FILES['image_cert']['name'];
    $old_image = $_POST['old_image'];
    $old_image_cert = $_POST['old_image_cert'];

    // Get Image Dimension
    $fileinfo = @getimagesize($_FILES["image"]["tmp_name"]);
    $fileinfo = @getimagesize($_FILES["image_cert"]["tmp_name"]);

    $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );
    
    // Get image file extension
    $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
    $file_cert_extension = pathinfo($_FILES["image_cert"]["name"], PATHINFO_EXTENSION);
    
    // Validate file input to check if is not empty
   if (! file_exists($_FILES["image"]["tmp_name"])) {
       
        redirect("profile.php?id=$businessid", "Choose image file to upload.");
    
   }// Validate file input to check if is not empty
   else if (! file_exists($_FILES["image_cert"]["tmp_name"])) {
       
       redirect("profile.php?id=$businessid", "Choose image certificate file to upload.");
           
   }    // Validate file input to check if is with valid extension
   else if (! in_array($file_extension, $allowed_image_extension)) {

       redirect("profile.php?id=$businessid", "Upload valid images. Only PNG and JPEG are allowed in business image.");
   }    // Validate file input to check if is with valid extension
   else if (! in_array($file_cert_extension, $allowed_image_extension)) {
   
       redirect("profile.php?id=$businessid", "Upload valid images. Only PNG and JPEG are allowed in business certificate.");
      
   }    // Validate image file size less than
   else if (($_FILES["image"]["size"] < 2000000)) {

       redirect("profile.php?id=$businessid", "Image size less than 2MB");

   }    // Validate image file size less than
   else if (($_FILES["image_cert"]["size"] < 2000000)) {

       redirect("profile.php?id=$businessid", "Image size less than 2MB");

   }    // Validate image file size that is greater
   else if (($_FILES["image"]["size"] > 5000000)) {

       redirect("profile.php?id=$businessid", "Image size exceeds 5MB");
   }    // Validate image file size
   else if (($_FILES["image_cert"]["size"] > 5000000)) {

       redirect("profile.php?id=$businessid", "Image size exceeds 5MB");

   }

    if($new_image != "")
    {
        //$update_filename = $new_image;
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time().'.'.$image_ext;
    }
    else
    {
        $update_filename = $old_image;
    }

    if($new_image_cert != "")
    {
        //$update_filename = $new_image;
        $image_cert_ext = pathinfo($new_image_cert, PATHINFO_EXTENSION);
        $update_filename_cert = time().'.'.$image_cert_ext;
    }
    else
    {
        $update_filename_cert = $old_image_cert;
    }
    $path = "../uploads";
    $cert_path = "../certificate";

    if(mysqli_num_rows($check_email_query_run)>0)
    {
        redirect("add-business.php", "Email Already Use");
    }
    else
    {
        $login_query = "SELECT * FROM business WHERE businessid='$businessid'";
        $login_query_run = mysqli_query($con, $login_query);
        //mysqli_query($con,$login_query) or die("bad query: $login_query");

                while($row = mysqli_fetch_array($login_query_run))
                {
                    if(password_verify($business_password, $row["business_password"]))
                    {
                        if(preg_match("/^[0-9]\d{10}$/",$_POST['business_phonenumber']))
                        {
                                if(strlen($_POST['business_password']) >= 8 )
                                {
                                    //$hash = password_hash($business_password, PASSWORD_DEFAULT);
                                    $update_query = "UPDATE business SET business_name='$business_name',business_address='$business_address',municipalityid='$municipalityid',categoryid='$categoryid',business_firstname='$business_firstname',business_lastname='$business_lastname',business_email='$business_email',business_phonenumber='$business_phonenumber',business_owneraddress='$business_owneraddress', image='$update_filename', image_cert='$update_filename_cert', status='$status' WHERE businessid='$businessid'";
                                    //mysqli_query($con,$update_query) or die("bad query: $update_query");
                                    $update_query_run = mysqli_query($con, $update_query);

                                    if($update_query_run)
                                    {
                                        if($_FILES['image']['name'] != "")
                                        {
                                            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename);
                                            
                                            if(file_exists("../uploads/".$old_image))
                                            {
                                                unlink("../uploads/".$old_image);
                                            }
                                        }
                                        if($_FILES['image_cert']['name'] != "")
                                        {
                                            move_uploaded_file($_FILES['image_cert']['tmp_name'], $cert_path.'/'.$update_filename_cert);
                                            
                                            if(file_exists("../certification/".$old_image_cert))
                                            {
                                                unlink("../certification/".$old_image_cert);
                                            }
                                        }

                                        redirect("index.php", "Business Updated Successfully");
                                    }
                                    else
                                    {
                                        redirect("profile.php?id=$businessid", "Something Went Wrong"); 
                                    }

                                }
                                else
                                {
                                    redirect("profile.php?id=$businessid", "Your password must be at least 8 characters"); 
                                }
                        }
                        else
                        {
                            redirect("profile.php?id=$businessid", "Phone number error detected");
                        }
                    }
                    else
                    {
                        redirect("profile.php?id=$businessid", "Wrong Password");
                    }
    
                }
    
    }


}
else if(isset($_POST['edit_password_btn']))
{
    $businessid = $_POST['businessid'];
    $business_oldpassword = $_POST['business_oldpassword'];
    $business_password = $_POST['business_password'];
    $business_confirmpassword = $_POST['business_confirmpassword'];

        $login_query = "SELECT * FROM business WHERE businessid='$businessid'";
        $login_query_run = mysqli_query($con, $login_query);
        //mysqli_query($con,$login_query) or die("bad query: $login_query");

                while($row = mysqli_fetch_array($login_query_run))
                {
                    if(password_verify($business_oldpassword, $row["business_password"]))
                    {
                                if(strlen($_POST['business_password']) >= 8 )
                                {
                                    if($business_password == $business_confirmpassword)
                                    {
                                        $hash = password_hash($business_password, PASSWORD_DEFAULT);
                                        $update_query = "UPDATE business SET business_password='$hash' WHERE businessid='$businessid'";
                                        //mysqli_query($con,$update_query) or die("bad query: $update_query");
                                        $update_query_run = mysqli_query($con, $update_query);
                                        if($update_query_run)
                                        {   
                                            redirect("index.php", "Business Updated Successfully");
                                        }
                                        else
                                        {
                                            redirect("changepassword.php?id=$businessid", "Something Went Wrong"); 
                                        }
                                        
                                    }
                                    else
                                    {
                                        redirect("changepassword.php?id=$businessid", "Passwords do not match");
                                    }

                                }
                                else
                                {
                                    redirect("changepassword.php?id=$businessid", "Your password must be at least 8 characters"); 
                                }
                    }
                    else
                    {
                        redirect("changepassword.php?id=$businessid", "Wrong Old Password");
                    }
    
                }


}
elseif (isset($_POST['delete_reservation_btn']))
{
    $reservationid = mysqli_real_escape_string($con,$_POST['reservationid']);

    $reservation_query = "SELECT * FROM reservations WHERE reservationid='$reservationid' ";
    $reservation_query_run = mysqli_query($con, $reservation_query);
    $reservation_data = mysqli_fetch_array($reservation_query_run);

    $delete_query = "DELETE FROM reservations  WHERE reservationid='$reservationid' ";
    $delete_query_run = mysqli_query($con, $delete_query);

    //mysqli_query($con,$delete_query) or die("bad query: $delete_query");

    if($delete_query_run)
    {

        //redirect("reservation.php?=$reservationid", "Reservation Deleted Successfully");
        echo 900;
    }
    else
    {
        //redirect("reservation.php?=$reservationid", "Something went wrong");
        echo 800;
    }

}
else
{
    header('Location: ../index.php');
}
