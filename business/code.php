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
else
{
    header('Location: ../index.php');
}
