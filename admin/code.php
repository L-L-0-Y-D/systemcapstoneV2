<?php

include('../config/dbcon.php');
include('../functions/myfunctions.php');


/* This is the code for adding a new municipality. */
if(isset($_POST['add_municipality_btn']))
{
    $municipality_name = $_POST['municipality_name'];
    $status = isset($_POST['status']) ? "0":"1";

    $image = $_FILES['image']['name'];

    $path = "../uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    $muni_query = "INSERT INTO municipality (municipality_name, image, status) 
    VALUES ('$municipality_name','$filename', '$status')";
    //mysqli_query($con,$muni_query) or die("bad query: $cate_query");

    $muni_query_run = mysqli_query($con, $muni_query);

    if($muni_query_run){

        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
        redirect("municipality.php", "Municipality Added Successfully");
    }else{

        redirect("municipality.php", "Something Went Wrong");

    }

}
/* This is the code for updating a municipality. */
else if(isset($_POST['update_municipality_btn']))
{
    $municipalityid = $_POST['municipalityid'];
    $municipality_name = $_POST['municipality_name'];
    $status = isset($_POST['status']) ? "0":"1";

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

    $update_query = "UPDATE municipality SET municipality_name='$municipality_name', image='$update_filename', status='$status' WHERE municipalityid='$municipalityid'";
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
        redirect("municipality.php", "Category Updated Successfully");
    }
    else
    {
        redirect("edit-municipality.php?id=$municipalityid", "Something Went Wrong"); 
    }
}
/* This is the code for deleting a municipality. */
else if(isset($_POST['delete_municipality_btn']))
{
    $municipalityid = mysqli_real_escape_string($con,$_POST['municipalityid']);

    $municipality_query = "SELECT * FROM municipality WHERE municipalityid='$municipalityid' ";
    $municipality_query_run = mysqli_query($con, $municipality_query);
    $municipality_data = mysqli_fetch_array($municipality_query_run);

    $image = $municipality_data['image'];

    $delete_query = "DELETE FROM municipality WHERE municipalityid='$municipalityid' ";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run)
    {
        if(file_exists("../uploads/".$image))
        {
            unlink("../uploads/".$image);
        }

        //redirect("municipality.php", "municipality Deleted Successfully");
        echo 100;
    }
    else
    {
        //redirect("municipality.php", "Something went wrong");
        echo 200;
    }
}
/* This is the code for adding a new product. */
else if(isset($_POST['add_product_btn']))
{
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? "1":"0";
    $trending = isset($_POST['trending']) ? "1":"0";

    $image = $_FILES['image']['name'];

    $path = "../uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    $product_query = "INSERT INTO products (category_id,name,slug,small_description,description,original_price,selling_price,qty,meta_title,meta_description,meta_keywords,status,trending,image) 
    VALUES ('$category_id','$name','$slug','$small_description','$description','$original_price','$selling_price','$qty','$meta_title','$meta_description','$meta_keywords','$status','$trending','$filename')";

    $product_query_run = mysqli_query($con, $product_query);

    if($product_query_run)
    {
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
        redirect("add-products.php", "Product Added Successfully");
    }else
    {
        redirect("add-products.php", "Something Went Wrong");
    }
}
//Update Product
/* This is the code for updating a product. */
else if(isset($_POST['update_product_btn']))
{
    $product_id = $_POST['product_id'];
    $category_id = $_POST['category_id'];

    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? "1":"0";
    $trending = isset($_POST['trending']) ? "1":"0";

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

    $update_product_query = " UPDATE products SET name='$name', slug='$slug', small_description='$small_description',description='$description',original_price='$original_price',selling_price='$selling_price',qty='$qty',meta_title='$meta_title',meta_description='$meta_description',meta_keywords='$meta_keywords',status='$status',trending='$trending',image='$update_filename' WHERE id='$product_id'";
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
        redirect("edit-product.php?id=$product_id", "Product Updated Successfully");

    }
    else
    {
        redirect("edit-product.php?id=$product_id", "Something Went Wrong"); 
    }


}
//Delete a Product
/* This is the code for deleting a product. */
else if(isset($_POST['delete_product_btn']))
{
    $product_id = mysqli_real_escape_string($con,$_POST['product_id']);

    $product_query = "SELECT * FROM products WHERE id='$product_id' ";
    $product_query_run = mysqli_query($con, $product_query);
    $product_data = mysqli_fetch_array($product_query_run);

    $image = $product_data['image'];

    $delete_query = "DELETE FROM products WHERE id='$product_id' ";
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
/* This is the code for adding a new category. */
else if(isset($_POST['add_category_btn']))
{
    $categoryname = $_POST['categoryname'];
    $status = isset($_POST['status']) ? "0":"1";

    $cate_query = "INSERT INTO mealcategory (categoryname, status) 
    VALUES ('$categoryname', '$status')";
    //mysqli_query($con,$cate_query) or die("bad query: $cate_query");

    $cate_query_run = mysqli_query($con, $cate_query);

    if($cate_query_run){
        redirect("category.php", "Cuisine Added Successfully");
    }else{

        redirect("category.php", "Something Went Wrong");

    }
}
/* This is the code for updating a category. */
else if(isset($_POST['update_category_btn']))
{
    $categoryid = $_POST['categoryid'];
    $categoryname = $_POST['categoryname'];
    $status = isset($_POST['status']) ? "0":"1";

    $update_query = "UPDATE mealcategory SET categoryname='$categoryname', status='$status' WHERE categoryid='$categoryid'";
    //mysqli_query($con,$update_query) or die("bad query: $update_query");

    $update_query_run = mysqli_query($con, $update_query);

    if($update_query_run)
    {
        redirect("category.php", "Category Updated Successfully");
    }
    else
    {
        redirect("edit-category.php?id=$categoryid", "Something Went Wrong"); 
    }
}
else if(isset($_POST['delete_category_btn']))
{
    $categoryid = mysqli_real_escape_string($con,$_POST['categoryid']);

    $category_query = "SELECT * FROM mealcategory WHERE categoryid='$categoryid' ";
    $category_query_run = mysqli_query($con, $category_query);
    $category_data = mysqli_fetch_array($category_query_run);

    $delete_query = "DELETE FROM mealcategory WHERE categoryid='$categoryid' ";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run)
    {

        //redirect("category.php", "category Deleted Successfully");
        echo 300;
    }
    else
    {
        //redirect("category.php", "Something went wrong");
        echo 400;
    }
}
else if(isset($_POST['add_customer_btn'])){
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $firstname = mysqli_real_escape_string($con,$_POST['firstname']);
    $lastname = mysqli_real_escape_string($con,$_POST['lastname']);
    $age = mysqli_real_escape_string($con,$_POST['age']);
    $phonenumber = mysqli_real_escape_string($con,$_POST['phonenumber']);
    $address = mysqli_real_escape_string($con,$_POST['address']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $confirmpassword = mysqli_real_escape_string($con,$_POST['confirmpassword']);
    $role_as = mysqli_real_escape_string($con,$_POST['role_as']);
    $status = isset($_POST['status']) ? "0":"1";

    $image = $_FILES['image']['name'];

    $path = "../uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    
    // Check if email already registered
    $check_email_query = "SELECT email FROM users WHERE email='$email'";
    $check_email_query_run = mysqli_query($con, $check_email_query);
    
    /* This is checking if the email is already registered. If it is, it will redirect the user to the
    register page with a message. If it is not, it will check if the password matches the confirm
    password. If it does, it will insert the user data into the database. If it does not, it will
    redirect the user to the register page with a message. */
    if(mysqli_num_rows($check_email_query_run)>0)
    {
        redirect("add-customer.php", "Email Already Use");
    }
    else
    {
        // Check if password Match
        if($password == $confirmpassword)
        {
            // Insert User Data
            $password = md5($password);
            $insert_query = "INSERT INTO users (name, email, firstname, lastname, age, phonenumber, address, password, role_as, image, status) 
            VALUES ('$name','$email','$firstname','$lastname', $age, '$phonenumber', '$address', '$password', $role_as,'$filename', '$status')";
            //mysqli_query($con,$insert_query) or die("bad query: $insert_query");
            $users_query_run = mysqli_query($con, $insert_query);

            if($users_query_run){
                move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
                redirect("customers.php", "Register Successfully");
            }
            else{
                redirect("add-customers.php", "Something went wrong");;
            }

        }
        else
        {
            redirect("add-customers.php", "Passwords do not match");
        }
    }
    
}
else if(isset($_POST['update_customer_btn']))
{
    $userid = $_POST['userid'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $phonenumber = $_POST['phonenumber'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $role_as = $_POST['role_as'];
    $status = isset($_POST['status']) ? "0":"1";

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

    $update_query = "UPDATE users SET name='$name',email='$email',firstname='$firstname',lastname='$lastname',age=$age,phonenumber='$phonenumber',address='$address',password='$password',role_as='$role_as', image='$update_filename', status='$status' WHERE userid='$userid'";
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
        redirect("customers.php", "Category Updated Successfully");
    }
    else
    {
        redirect("edit-customer.php?id=$userid", "Something Went Wrong"); 
    }

}
else if(isset($_POST['delete_customer_btn']))
{
    $userid = mysqli_real_escape_string($con,$_POST['userid']);

    $user_query = "SELECT * FROM users WHERE userid='$userid' ";
    $user_query_run = mysqli_query($con, $user_query);
    $user_data = mysqli_fetch_array($user_query_run);

    $image = $user_data['image'];

    $delete_query = "DELETE FROM users WHERE userid='$userid' ";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run)
    {
        if(file_exists("../uploads/".$image))
        {
            unlink("../uploads/".$image);
        }

        //redirect("user.php", "user Deleted Successfully");
        echo 500;
    }
    else
    {
        //redirect("user.php", "Something went wrong");
        echo 600;
    }
}
else if(isset($_POST['add_business_btn']))
{
    $business_name = mysqli_real_escape_string($con,$_POST['business_name']);
    $business_address = mysqli_real_escape_string($con,$_POST['business_address']);
    $municipalityid = mysqli_real_escape_string($con,$_POST['municipalityid']);
    $categoryid = mysqli_real_escape_string($con,$_POST['categoryid']);
    $business_firstname = mysqli_real_escape_string($con,$_POST['business_firstname']);
    $business_lastname = mysqli_real_escape_string($con,$_POST['business_lastname']);
    $business_email = mysqli_real_escape_string($con,$_POST['business_email']);
    $business_phonenumber = mysqli_real_escape_string($con,$_POST['business_phonenumber']);
    $business_owneraddress = mysqli_real_escape_string($con,$_POST['business_owneraddress']);
    $business_password = mysqli_real_escape_string($con,$_POST['business_password']);
    $business_confirmpassword = mysqli_real_escape_string($con,$_POST['business_confirmpassword']);
    $status = isset($_POST['status']) ? "0":"1";

    $image = $_FILES['image']['name'];

    $path = "../uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    
    // Check if email already registered
    $check_email_query = "SELECT business_email FROM business WHERE business_email='$business_email'";
    $check_email_query_run = mysqli_query($con, $check_email_query);
    
    /* This is checking if the email is already registered. If it is, it will redirect the user to the
    register page with a message. If it is not, it will check if the password matches the confirm
    password. If it does, it will insert the user data into the database. If it does not, it will
    redirect the user to the register page with a message. */
    if(mysqli_num_rows($check_email_query_run)>0)
    {
        redirect("add-business.php", "Email Already Use");
    }
    else
    {
        // Check if password Match
        if($business_password == $business_confirmpassword)
        {
            // Insert User Data
            $$business_password = md5($$business_password);
            $insert_query = "INSERT INTO business (business_name, business_address, municipalityid, categoryid, business_firstname, business_lastname, business_phonenumber, business_owneraddress, business_email, business_password, image, status) 
            VALUES ('$business_name','$business_address', $municipalityid,$categoryid, '$business_firstname', '$business_lastname', '$business_email', '$business_phonenumber', '$business_owneraddress','$business_password','$filename', '$status')";
            //mysqli_query($con,$insert_query) or die("bad query: $insert_query");
            $users_query_run = mysqli_query($con, $insert_query);

            if($users_query_run){
                move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
                redirect("busiowner.php", "Register Successfully");
            }
            else{
                redirect("add-business.php", "Something went wrong");;
            }

        }
        else
        {
            redirect("add-business.php", "Passwords do not match");
        }
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
    $status = isset($_POST['status']) ? "0":"1";

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

    $update_query = "UPDATE business SET business_name='$business_name',business_address='$business_address',municipalityid='$municipalityid',categoryid='$categoryid',business_firstname='$business_firstname',business_lastname='$business_lastname',business_email='$business_email',business_phonenumber='$business_phonenumber',business_owneraddress='$business_owneraddress',business_password='$business_password', image='$update_filename', status='$status' WHERE businessid='$businessid'";
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
        redirect("busiowner.php", "Business Updated Successfully");
    }
    else
    {
        redirect("edit-business.php?id=$businessid", "Something Went Wrong"); 
    }

}
else if(isset($_POST['delete_business_btn']))
{
    $businessid = mysqli_real_escape_string($con,$_POST['businessid']);

    $business_query = "SELECT * FROM business WHERE businessid='$businessid' ";
    $business_query_run = mysqli_query($con, $business_query);
    $business_data = mysqli_fetch_array($business_query_run);

    $image = $business_data['image'];

    $delete_query = "DELETE FROM business WHERE businessid='$businessid' ";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run)
    {
        if(file_exists("../uploads/".$image))
        {
            unlink("../uploads/".$image);
        }

        //redirect("busiowner.php", "business Deleted Successfully");
        echo 700;
    }
    else
    {
        //redirect("busiowner.php", "Something went wrong");
        echo 800;
    }
}
else
{
    header('Location: ../index.php');
}


?>