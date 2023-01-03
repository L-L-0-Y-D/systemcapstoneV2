<?php

include('../config/dbcon.php');
include('../functions/businessfunctions.php');

if(isset($_POST['add_product_btn']))
{
    $businessid = $_POST['businessid'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $food_type = $_POST['food_type'];
    $cuisinename = $_POST['cuisinename'];
    $price = $_POST['price'];
    $status = isset($_POST['status']) ? "1":"0";

    $image = $_FILES['image']['name'];

    $food_data = 'name='.$name.'&description='.$description.'&food_type='.$food_type.'&cuisinename='.$cuisinename.'&price='.$price.'&status='.$status;

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
       
        redirect("add-menu.php?id=$businessid&Choose image file to upload", "Choose image file to upload.", "warning");
    
   }  // Validate file input to check if is with valid extension
   else if (! in_array($file_extension, $allowed_image_extension)) {

       redirect("add-menu.php?id=$businessid", "Upload valid images. Only PNG and JPEG are allowed in business image.", "warning");
   }// Validate image file size less than
   else if (($_FILES["image"]["size"] < 80000)) {

       redirect("add-menu.php?id=$businessid", "Image size less than 800KB", "warning");

   }    // Validate image file size that is greater
   else if (($_FILES["image"]["size"] > 100000000)) {

       redirect("add-menu.php?id=$businessid", "Image size exceeds 10MB", "warning");
   }

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    // Check if email already registered
    $check_product_query = "SELECT name FROM products WHERE name='$name' AND businessid='$businessid'";
    $check_product_query_run = mysqli_query($con, $check_product_query);

    if(mysqli_num_rows($check_product_query_run)>0)
    {
        redirect("menu.php?id=$businessid", "Product Already Exist.", "warning");
    }
    else
    {

        $product_query = "INSERT INTO products (businessid,name,description,cuisinename,food_type,price,status,image) 
        VALUES ('$businessid','$name','$description','$cuisinename','$food_type','$price','$status','$filename')";

        $product_query_run = mysqli_query($con, $product_query);

        if($product_query_run)
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
            redirect("menu.php?id=$businessid", "Product Added Successfully", "success");
        }else
        {
            redirect("add-menu.php?id=$businessid", "Something Went Wrong", "error");
        }
    }
}
elseif (isset($_POST['update_product_btn']))
{
    $productid = $_POST['productid'];
    $businessid = $_POST['businessid'];

    $name = $_POST['name'];
    $description = $_POST['description'];
    $food_type = $_POST['food_type'];
    $cuisinename = $_POST['cuisinename'];
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


        $allowed_image_extension = array(
            "png",
            "jpg",
            "jpeg"
        ); 
            
        // Validate file input to check if is with valid extension
        if (! in_array($image_ext, $allowed_image_extension)) {

            redirect("add-menu.php?id=$productid", "Upload valid images. Only PNG and JPEG are allowed in business image.", "warning");
        }// Validate image file size less than
        else if (($_FILES["image"]["size"] < 8000)) {

            redirect("add-menu.php?id=$productid", "Image size less than 800KB", "warning");

        }    // Validate image file size that is greater
        else if (($_FILES["image"]["size"] > 1000000)) {

            redirect("add-menu.php?id=$productid", "Image size exceeds 10MB", "warning");
        }
    }
    else
    {
        $update_filename = $old_image;
    }

    $update_product_query = " UPDATE products SET name='$name', description='$description', food_type='$food_type',cuisinename='$cuisinename',price='$price',status='$status',image='$update_filename' WHERE productid='$productid'";
    $update_product_query_run = mysqli_query($con, $update_product_query);

    if($update_product_query_run)
    {
        if($_FILES['image']['name'] != "")
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename);
            // if(file_exists("../uploads/".$old_image))
            // {
            //     unlink("../uploads/".$old_image);
            // }
        }
        redirect("menu.php?id=$businessid", "Product Updated Successfully", "success");

    }
    else
    {
        redirect("edit-menu.php?id=$productid", "Something Went Wrong", "error"); 
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
    $business_name = $_POST['business_name'];
    // $userid = $_POST['userid'];

    $table_number = $_POST['table_number'];
    $numberofguest = $_POST['chair'];
    $namereserveunder = $_POST['namereserveunder'];
    $username = $_POST['name'];
    $reservation_email = $_POST['reservation_email'];
    $reservation_phonenumber = $_POST['reservation_phonenumber'];
    $reservation_date = $_POST['reservation_date'];
    $reservation_time = $_POST['reservation_time'];
    $status = $_POST['status'];

    $update_query = "UPDATE reservations SET status='$status' WHERE reservationid='$reservationid'";
    //mysqli_query($con,$update_query) or die("bad query: $update_query");

    $update_query_run = mysqli_query($con, $update_query);

    if($update_query_run)
    {
        if($status == 1)
        {
            $insert_notification = "INSERT INTO notifications (comment_subject,comment_text,usertype) 
            VALUES ('Reservation', 'Your reservation in $business_name is approved', '2')";
            $insert_notification_run = mysqli_query($con, $insert_notification);

            sendemail_confirmreservation($reservation_email, $namereserveunder, $username, $reservation_phonenumber, $reservation_date,$reservation_time,$numberofguest,$table_number,$business_name,$businessid);
            sendphonenumber_confirmreservation($namereserveunder,$username,$reservation_phonenumber,$reservation_date,$reservation_time,$numberofguest,$table_number,$business_name,$businessid);
            //redirect("reservation.php?id=$businessid", "Reservation Updated Successfully");
        }
        elseif($status == 2)
        {
            $insert_notification = "INSERT INTO notifications (comment_subject,comment_text,usertype) 
            VALUES ('Reservation', 'Your reservation in $business_name is declined', '2')";
            $insert_notification_run = mysqli_query($con, $insert_notification);
            sendemail_declinedreservation($reservation_email,$username,$business_name);
            sendphonenumber_declinedreservation($namereserveunder,$reservation_phonenumber,$reservation_date,$reservation_time,$numberofguest,$table_number,$business_name,$businessid);
            
        }
        else
        {
            redirect("reservation.php?id=$businessid", "Reservation Updated Successfully", "success");
        }

        
    }
    else
    {
        redirect("edit-reservation.php?id=$reservationid", "Something Went Wrong", "error"); 
    }

}
else if(isset($_POST['edit_business_btn']))
{
    $businessid = mysqli_real_escape_string($con,$_POST['businessid']);
    $business_name = mysqli_real_escape_string($con,$_POST['business_name']);
    $business_address = mysqli_real_escape_string($con,$_POST['business_address']);
    $municipalityid = mysqli_real_escape_string($con,$_POST['municipalityid']);
    $cuisinename = $_POST['cuisinename'];
    $opening = $_POST['opening'];
    $closing = $_POST['closing'];
    $business_firstname = mysqli_real_escape_string($con,$_POST['business_firstname']);
    $business_lastname = mysqli_real_escape_string($con,$_POST['business_lastname']);
    $business_email = mysqli_real_escape_string($con,$_POST['business_email']);
    $business_phonenumber = mysqli_real_escape_string($con,$_POST['business_phonenumber']);
    $business_owneraddress = mysqli_real_escape_string($con,$_POST['business_owneraddress']);
    $business_password = mysqli_real_escape_string($con,$_POST['business_password']);
    $status = isset($_POST['status']) ? "1":"0";

    $new_image = $_FILES['image']['name'];
    $new_image_cert = $_FILES['image_cert']['name'];
    $old_image = $_POST['old_image'];
    $old_image_cert = $_POST['old_image_cert'];

    if($new_image != "")
    {
        //$update_filename = $new_image;
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time().'.'.$image_ext;


        $allowed_image_extension = array(
            "png",
            "jpg",
            "jpeg"
        ); 
            
        // Validate file input to check if is with valid extension
        if (! in_array($image_ext, $allowed_image_extension)) {

            redirect("profile.php?id=$businessid", "Upload valid images. Only PNG and JPEG are allowed in business image.", "warning");
        }// Validate image file size less than
        else if (($_FILES["image"]["size"] < 800)) {

            redirect("profile.php?id=$businessid", "Image size less than 800KB", "warning");

        }    // Validate image file size that is greater
        else if (($_FILES["image"]["size"] > 10000000)) {

            redirect("profile.php?id=$businessid", "Image size exceeds 10MB", "warning");
        }
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

        $allowed_image_extension = array(
            "png",
            "jpg",
            "jpeg"
        ); 
            
        // Validate file input to check if is with valid extension
        if (! in_array($image_cert_ext, $allowed_image_extension)) {

            redirect("add-menu.php?id=$businessid", "Upload valid images. Only PNG and JPEG are allowed in certificate image.", "warning");
        }// Validate image file size less than
        else if (($_FILES["image_cert"]["size"] < 800)) {

            redirect("add-menu.php?id=$businessid", "Image size less than 800KB", "warning");

        }    // Validate image file size that is greater
        else if (($_FILES["image_cert"]["size"] > 10000000)) {

            redirect("add-menu.php?id=$businessid", "Image size exceeds 10MB", "warning");
        }
    }
    else
    {
        $update_filename_cert = $old_image_cert;
    }
    $path = "../uploads";
    $cert_path = "../certificate";

    // Check if email already registered
    $check_email_query = "SELECT business_email FROM business WHERE business_email='$business_email'";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    if(mysqli_num_rows($check_email_query_run)>1)
    {
        redirect("profile.php?=$businessid", "Email Already Use", "warning");
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
                                    $item = implode(" ",$cuisinename);
                                    $update_query = "UPDATE business SET business_name='$business_name',business_address='$business_address',municipalityid='$municipalityid',cuisinename='$item',opening='$opening',closing='$closing',business_firstname='$business_firstname',business_lastname='$business_lastname',business_email='$business_email',business_phonenumber='$business_phonenumber',business_owneraddress='$business_owneraddress', image='$update_filename', image_cert='$update_filename_cert', status='$status' WHERE businessid='$businessid'";
                                    mysqli_query($con,$update_query) or die("bad query: $update_query");
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

                                        redirect("index.php", "Business Updated Successfully", "success");
                                    }
                                    else
                                    {
                                        redirect("profile.php?id=$businessid", "Something Went Wrong", "error"); 
                                    }

                                }
                                else
                                {
                                    redirect("profile.php?id=$businessid", "Your password must be at least 8 characters", "warning"); 
                                }
                        }
                        else
                        {
                            redirect("profile.php?id=$businessid", "Phone number error detected", "warning");
                        }
                    }
                    else
                    {
                        redirect("profile.php?id=$businessid", "Wrong Password", "warning");
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
                                            redirect("index.php", "Password Updated Successfully", "success");
                                        }
                                        else
                                        {
                                            redirect("changepassword.php?id=$businessid", "Something Went Wrong", "error"); 
                                        }
                                        
                                    }
                                    else
                                    {
                                        redirect("changepassword.php?id=$businessid", "Passwords do not match", "warning");
                                    }

                                }
                                else
                                {
                                    redirect("changepassword.php?id=$businessid", "Your password must be at least 8 characters", "warning"); 
                                }
                    }
                    else
                    {
                        redirect("changepassword.php?id=$businessid", "Wrong Old Password", "warning");
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

        redirect("reservation.php?=$reservationid", "Reservation Deleted Successfully", "success");
        echo 900;
    }
    else
    {
        redirect("reservation.php?=$reservationid", "Something went wrong", "error");
        echo 800;
    }

}
else if(isset($_POST['update_location_btn']))
{
    $businessid = $_POST['businessid'];
    $latitude = $_POST["latitude"];
    $longitude = $_POST["longitude"];


    $update_location_query = "UPDATE business SET latitude='$latitude',longitude='$longitude' WHERE businessid='$businessid'";
    //mysqli_query($con,$update_query) or die("bad query: $update_query");

    $update_location_query_run = mysqli_query($con, $update_location_query);

    if($update_location_query_run)
    {
        redirect("location.php?id=$businessid", "Location Updated Successfully", "success");
    }
    else
    {
        redirect("pin-location.php?id=$businessid", "Something Went Wrong", "error"); 
    }

}
else if(isset($_POST['add_table_btn']))
{
    $businessid = $_POST['businessid'];
    $table = $_POST['table'];
    $chair = $_POST['chair'];
    $status = isset($_POST['status']) ? "1":"0";

    // Check if table already registered
     $check_table_query = "SELECT table_number FROM managetable WHERE table_number='$table' AND businessid = '$businessid'";
     $check_table_query_run = mysqli_query($con, $check_table_query);

     if(mysqli_num_rows($check_table_query_run)>0)
     {
         redirect("table.php?id=$businessid", "Table Number Already Exist.", "error");
     }
     else
     {

        $table_query = "INSERT INTO managetable (businessid,table_number,chair,status) 
        VALUES ('$businessid','$table','$chair','$status')";
        // mysqli_query($con,$table_query) or die("bad query: $table_query");
        $table_query_run = mysqli_query($con, $table_query);

        if($table_query_run)
        {
            redirect("table.php?id=$businessid", "Table Added Successfully", "success");
        }else
        {
            redirect("add-table.php?id=$businessid", "Something Went Wrong", "error");
        }
     }
}
else if(isset($_POST['update_table_btn']))
{
    $tableid = $_POST['tableid'];
    $businessid = $_POST['businessid'];
    $table = $_POST['table'];
    $chair = $_POST['chair'];
    $status = isset($_POST['status']) ? "1":"0";

    // Check if table already registered
    // $check_table_query = "SELECT table_number FROM managetable WHERE table_number='$table' AND businessid = '$businessid'";
    // $check_table_query_run = mysqli_query($con, $check_table_query);
    // if(mysqli_num_rows($check_table_query_run)>0)
    // {
    //     redirect("table.php?id=$businessid", "Table Number Already Exist.", "error");
    // }
    // else
    // {

        $update_table_query = "UPDATE managetable SET table_number='$table',chair='$chair',status='$status' WHERE tableid='$tableid'";
        //mysqli_query($con,$update_query) or die("bad query: $update_query");

        $update_table_query_run = mysqli_query($con, $update_table_query);

        if($update_table_query_run)
        {
            redirect("table.php?id=$businessid", "Table Updated Successfully", "success");
        }
        else
        {
            redirect("edit-table.php?id=$businessid", "Something Went Wrong", "error"); 
        }
    // }

}
else if(isset($_POST['update_arrived_btn']))
{
    $arrived = 1;
    $businessid = $_POST['businessid'];
    $reservationid = $_POST['update_arrived_btn'];

    $update_table_query = "UPDATE reservations SET arrived='$arrived' WHERE reservationid='$reservationid'";
    //mysqli_query($con,$update_query) or die("bad query: $update_query");

    $update_table_query_run = mysqli_query($con, $update_table_query);

    $insert_notification = "INSERT INTO notifications (comment_subject,comment_text,usertype) 
    VALUES ('Arrival', 'You have arrived in your reservation at $business_name', '2')";
    $insert_notification_run = mysqli_query($con, $insert_notification);

    if($update_table_query_run)
    {
        if($arrived == 1)
        {
            redirect("arriving.php?id=$businessid", "User Arrived", "success");
        }
        elseif($arrived == 2)
        {
            redirect("arriving.php?id=$businessid", "User Not Arrived", "warning");
        }

    }
    else
    {
        redirect("arriving.php?id=$businessid", "Something Went Wrong", "error"); 
    }

}
else if(isset($_POST['update_not_arrived_btn']))
{
    $arrived = 2;
    $businessid = $_POST['businessid'];
    $reservationid = $_POST['update_not_arrived_btn'];

    $update_table_query = "UPDATE reservations SET arrived='$arrived' WHERE reservationid='$reservationid'";
    //mysqli_query($con,$update_query) or die("bad query: $update_query");

    $update_table_query_run = mysqli_query($con, $update_table_query);

    $insert_notification = "INSERT INTO notifications (comment_subject,comment_text,usertype) 
    VALUES ('Arrival', 'You have not arrived in your reservation at $business_name', '2')";
    $insert_notification_run = mysqli_query($con, $insert_notification);

    if($update_table_query_run)
    {
        if($arrived == 1)
        {
            redirect("arriving.php?id=$businessid", "User Arrived", "success");
        }
        elseif($arrived == 2)
        {
            redirect("arriving.php?id=$businessid", "User Not Arrived", "warning");
        }

    }
    else
    {
        redirect("arriving.php?id=$businessid", "Something Went Wrong", "error"); 
    }

}
else if(isset($_POST['add_blockdate_btn']))
{
    $businessid = $_POST['businessid'];
    $reason = $_POST['reason'];
    $blockdate = $_POST['blockdate'];
    $status = isset($_POST['status']) ? "1":"0";

    // Check if email already registered
     $check_date_query = "SELECT blockdates FROM blockdate WHERE blockdates='$blockdate'";
     $check_date_query_run = mysqli_query($con, $check_date_query);

     if(mysqli_num_rows($check_date_query_run)>0)
     {
         redirect("blockdate.php?id=$businessid", "Date Already Occupied Exist.", "error");
     }
     else
     {

        $date_query = "INSERT INTO blockdate (businessid,reason,blockdates,status) 
        VALUES ('$businessid','$reason','$blockdate','$status')";
        // mysqli_query($con,$table_query) or die("bad query: $table_query");
        $date_query_run = mysqli_query($con, $date_query);

        if($date_query_run)
        {
            redirect("blockdate.php?id=$businessid", "Date Added Successfully", "success");
        }else
        {
            redirect("add-blockdate.php?id=$businessid", "Something Went Wrong", "error");
        }
     }
}
else if(isset($_POST['update_blockdate_btn']))
{
    $blockdateid = $_POST['blockdateid'];
    $blockdates= $_POST['blockdates'];
    $reason = $_POST['reason'];
    $businessid = $_POST['businessid'];
    $status = isset($_POST['status']) ? "1":"0";

    // Check if table already registered
    // $check_table_query = "SELECT table_number FROM managetable WHERE table_number='$table' AND businessid = '$businessid'";
    // $check_table_query_run = mysqli_query($con, $check_table_query);
    // if(mysqli_num_rows($check_table_query_run)>0)
    // {
    //     redirect("table.php?id=$businessid", "Table Number Already Exist.", "error");
    // }
    // else
    // {

        $update_block_query = "UPDATE blockdate SET blockdates='$blockdates',reason='$reason',status='$status' WHERE blockdateid='$blockdateid'";
        //mysqli_query($con,$update_query) or die("bad query: $update_query");

        $update_block_query_run = mysqli_query($con, $update_block_query );

        if($update_block_query_run)
        {
            redirect("blockdate.php?id=$businessid", "Table Updated Successfully", "success");
        }
        else
        {
            redirect("edit-blockdate.php?id=$businessid", "Something Went Wrong", "error"); 
        }
    // }

}
else if(isset($_POST['add_cuisine_btn']))
{
    $businessid = $_POST['businessid'];
    $categoryname = $_POST['categoryname'];
    $status = isset($_POST['status']) ? "1":"0";

    $cate_query = "INSERT INTO mealcategory (categoryname, status) 
    VALUES ('$categoryname', '$status')";
    //mysqli_query($con,$cate_query) or die("bad query: $cate_query");

    $cate_query_run = mysqli_query($con, $cate_query);

    if($cate_query_run){
        redirect("profile.php?id=$businessid", "Cuisine Added Successfully", "success");
    }else{

        redirect("profile.php?id=$businessid", "Something Went Wrong", "error");

    }
}
else if(isset($_POST['archive_menu_btn']))
{
    $status = 2;
    $businessid = $_POST['businessid'];
    $productid = $_POST['archive_menu_btn'];

    $update_table_query = "UPDATE products SET status= '$status' WHERE productid='$productid'";
    //mysqli_query($con,$update_query) or die("bad query: $update_query");

    $update_table_query_run = mysqli_query($con, $update_table_query);

    if($update_table_query_run)
    {
        if($status == 2)
        {
            redirect("menu.php?id=$businessid", "Archive Success", "success");
        }
        else
        {
            redirect("menu.php?id=$businessid", "Something Went Wrong", "error");
        }

    }
    else
    {
        redirect("menu.php?id=$businessid", "Something Went Wrong", "error"); 
    }

}
else if(isset($_POST['archive_table_btn']))
{
    $status = 2;
    $businessid = $_POST['businessid'];
    $tableid = $_POST['archive_table_btn'];

    $update_table_query = "UPDATE managetable SET status= '$status' WHERE tableid='$tableid'";
    //mysqli_query($con,$update_query) or die("bad query: $update_query");

    $update_table_query_run = mysqli_query($con, $update_table_query);

    if($update_table_query_run)
    {
        if($status == 2)
        {
            redirect("table.php?id=$businessid", "Archive Success", "success");
        }
        else
        {
            redirect("table.php?id=$businessid", "Something Went Wrong", "error");
        }

    }
    else
    {
        redirect("table.php?id=$businessid", "Something Went Wrong", "error"); 
    }

}
else if(isset($_POST['archive_blockdate_btn']))
{
    $status = 2;
    $businessid = $_POST['businessid'];
    $blockdateid  = $_POST['archive_blockdate_btn'];

    $update_table_query = "UPDATE blockdate SET status= '$status' WHERE blockdateid ='$blockdateid '";
    //mysqli_query($con,$update_query) or die("bad query: $update_query");

    $update_table_query_run = mysqli_query($con, $update_table_query);

    if($update_table_query_run)
    {
        if($status == 2)
        {
            redirect("blockdate.php?id=$businessid", "Archive Success", "success");
        }
        else
        {
            redirect("blockdate.php?id=$businessid", "Something Went Wrong", "error");
        }

    }
    else
    {
        redirect("blockdate.php?id=$businessid", "Something Went Wrong", "error"); 
    }

}
else if(isset($_POST['archive_menusort_btn']))
{
    $status = 2;
    $businessid = $_POST['businessid'];
    $productid = $_POST['productid'];

    $update_table_query = "UPDATE products SET status= '$status' WHERE productid='$productid'";
    //mysqli_query($con,$update_query) or die("bad query: $update_query");

    $update_table_query_run = mysqli_query($con, $update_table_query);

    if($update_table_query_run)
    {
        if($status == 2)
        {
            redirect("menu.php?id=$businessid", "Archive Success", "success");
        }
        else
        {
            redirect("menu.php?id=$businessid", "Something Went Wrong", "error");
        }

    }
    else
    {
        redirect("menu.php?id=$businessid", "Something Went Wrong", "error"); 
    }

}
else if(isset($_POST['archive_reservation_btn']))
{
    $status = 1;
    $businessid = $_POST['businessid'];
    $reservationid = $_POST['archive_reservation_btn'];

    $update_table_query = "UPDATE reservations SET archive= '$status' WHERE reservationid='$reservationid'";
    $update_table_query_run = mysqli_query($con,$update_table_query) or die("bad query: $update_table_query");

    // $update_table_query_run = mysqli_query($con, $update_table_query);

    if($update_table_query_run)
    {
        if($status == 1)
        {
            redirect("reservation.php?id=$businessid", "Archive Success", "success");
        }
        else
        {
            redirect("reservation.php?id=$businessid", "Something Went Wrong", "error");
        }

    }
    else
    {
        redirect("reservation.php?id=$businessid", "Something Went Wrong", "error"); 
    }

}
else if(isset($_POST['restore_reservation_btn']))
{
    $status = 0;
    $businessid = $_POST['businessid'];
    $reservationid = $_POST['restore_reservation_btn'];

    $update_table_query = "UPDATE reservations SET archive= '$status' WHERE reservationid='$reservationid'";
    $update_table_query_run = mysqli_query($con,$update_table_query) or die("bad query: $update_table_query");

    // $update_table_query_run = mysqli_query($con, $update_table_query);

    if($update_table_query_run)
    {
        if($status == 0)
        {
            redirect("reservation.php?id=$businessid", "Data Restore Success", "success");
        }
        else
        {
            redirect("reservation.php?id=$businessid", "Something Went Wrong", "error");
        }

    }
    else
    {
        redirect("reservation.php?id=$businessid", "Something Went Wrong", "error"); 
    }

}
else if(isset($_POST['restore_blockdate_btn']))
{
    $status = 1;
    $businessid = $_POST['businessid'];
    $blockdateid = $_POST['restore_blockdate_btn'];

    $update_blockdate_query = "UPDATE blockdate SET status= '$status' WHERE blockdateid='$blockdateid'";
    $update_blockdate_query_run = mysqli_query($con,$update_blockdate_query) or die("bad query: $update_blockdate_query");

    // $update_table_query_run = mysqli_query($con, $update_table_query);

    if($update_blockdate_query_run)
    {
        if($status == 1)
        {
            redirect("blockdate.php?id=$businessid", "Data Restore Success", "success");
        }
        else
        {
            redirect("blockdate.php?id=$businessid", "Something Went Wrong", "error");
        }

    }
    else
    {
        redirect("blockdate.php?id=$businessid", "Something Went Wrong", "error"); 
    }

}
else if(isset($_POST['restore_product_btn']))
{
    $status = 1;
    $businessid = $_POST['businessid'];
    $productid = $_POST['restore_product_btn'];

    $update_product_query = "UPDATE products SET status= '$status' WHERE productid='$productid'";
    $update_product_query_run = mysqli_query($con,$update_product_query) or die("bad query: $update_product_query");

    // $update_table_query_run = mysqli_query($con, $update_table_query);

    if($update_product_query_run)
    {
        if($status == 1)
        {
            redirect("menu.php?id=$businessid", "Data Restore Success", "success");
        }
        else
        {
            redirect("menu.php?id=$businessid", "Something Went Wrong", "error");
        }

    }
    else
    {
        redirect("menu.php?id=$businessid", "Something Went Wrong", "error"); 
    }

}
else if(isset($_POST['restore_table_btn']))
{
    $status = 1;
    $businessid = $_POST['businessid'];
    $tableid = $_POST['restore_table_btn'];

    $update_table_query = "UPDATE managetable SET status= '$status' WHERE tableid='$tableid'";
    $update_table_query_run = mysqli_query($con,$update_table_query) or die("bad query: $update_table_query");

    // $update_table_query_run = mysqli_query($con, $update_table_query);

    if($update_table_query_run)
    {
        if($status == 1)
        {
            redirect("table.php?id=$businessid", "Data Restore Success", "success");
        }
        else
        {
            redirect("table.php?id=$businessid", "Something Went Wrong", "error");
        }

    }
    else
    {
        redirect("table.php?id=$businessid", "Something Went Wrong", "error"); 
    }

}
else
{
    header('Location: ../index.php');
}
