<?php

include('../config/dbcon.php');
include('../functions/myfunctions.php');

//inserting add-new-municipality
/* This is the code for adding a new municipality. */
if(isset($_POST['add_municipality_btn']))
{
    $municipality_name = $_POST['municipality_name'];

    $image = $_FILES['image']['name'];

    $path = "../uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    $muni_query = "INSERT INTO municipality (municipality_name, image) 
    VALUES ('$municipality_name','$filename')";
    mysqli_query($con,$muni_query) or die("bad query: $cate_query");

    $muni_query_run = mysqli_query($con, $muni_query);

    if($muni_query_run){

        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
        redirect("municipality.php", "Municipality Added Successfully");
    }else{

        redirect("municipality.php", "Something Went Wrong");

    }

}
//Update a new category
/* This is the code for updating a municipality. */
else if(isset($_POST['update_municipality_btn']))
{
    $municipalityid = $_POST['municipalityid'];
    $municipality_name = $_POST['municipality_name'];

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

    $update_query = "UPDATE municipality SET municipality_name='$municipality_name', image='$update_filename' WHERE municipalityid='$municipalityid'";
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
        redirect("edit-municipality.php?id=$municipalityid", "Category Updated Successfully");
    }
    else
    {
        redirect("edit-municipality.php?id=$municipalityid", "Something Went Wrong"); 
    }
}
//delete a new category
/* This is the code for deleting a category. */
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

        //redirect("category.php", "Category Deleted Successfully");
        echo 200;
    }
    else
    {
        //redirect("category.php", "Something went wrong");
        echo 500;
    }
}
//add new Product
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
else
{
    header('Location: ../index.php');
}


?>