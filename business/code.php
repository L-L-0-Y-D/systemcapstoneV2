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
    //$delete_query_run = mysqli_query($con, $delete_query);

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
    $business_confirmpassword = $_POST['business_confirmpassword'];
    $status = isset($_POST['status']) ? "1":"0";

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

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
    $path = "../uploads";

    if(mysqli_num_rows($check_email_query_run)>0)
    {
        redirect("add-business.php", "Email Already Use");
    }
    else
    {
        // Check if password Match
        if($business_password == $business_confirmpassword)
        {
            if(preg_match("/^[0-9]\d{10}$/",$_POST['business_phonenumber']))
            {
                    if(strlen($_POST['business_password']) >= 8 )
                    {
                        $hash = password_hash($business_password, PASSWORD_DEFAULT);
                        $update_query = "UPDATE business SET business_name='$business_name',business_address='$business_address',municipalityid='$municipalityid',categoryid='$categoryid',business_firstname='$business_firstname',business_lastname='$business_lastname',business_email='$business_email',business_phonenumber='$business_phonenumber',business_owneraddress='$business_owneraddress',business_password='$hash', image='$update_filename', status='$status' WHERE businessid='$businessid'";
                        //mysqli_query($con,$update_query) or die("bad query: $update_query");
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
            redirect("profile.php?id=$businessid", "Passwords do not match");
        }
    }

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
        redirect("index.php", "Business Updated Successfully");
    }
    else
    {
        redirect("profile.php?id=$businessid", "Something Went Wrong"); 
    }

}
else
{
    header('Location: ../index.php');
}
