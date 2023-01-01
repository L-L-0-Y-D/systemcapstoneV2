<?php
// Load the database configuration file
include('../config/dbcon.php');
include('../functions/businessfunctions.php');
$id = $_GET['id'];
if(isset($_POST['importSubmit'])){
    $id = $_GET['id'];
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            // Skip the first line
            fgetcsv($csvFile);
            
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data

                $name   = $line[0];
                $description = $line[1];
                $food_type = $line[2];
                $cuisinename = $line[3];
                $price = $line[4];
                $image  = $line[5];
                $status = $line[6];
                
                // Check whether member already exists in the database with the same name
                $prevQuery = "SELECT productid FROM products WHERE name = '".$line[0]."' AND businessid = '$id'";
                $prevResult = $con->query($prevQuery);
                
                if($prevResult->num_rows > 0){
                    // Update member data in the database
                    $con->query("UPDATE products SET name = '".$name."', description = '".$description."', food_type = '".$food_type."', cuisinename = '".$cuisinename."', price = '".$price."', image = '".$image."', status = '".$status."' WHERE name = '".$name."' AND businessid = '$id'");

                }else{
                    // Insert member data in the database
                    $con->query("INSERT INTO products (businessid, name, description, food_type, cuisinename, price, image, status) VALUES ('".$id."','".$name."','".$description."','".$food_type."','".$cuisinename."','".$price."','".$image."','".$status."')");
                }
            }
            
            // Close opened CSV file
            fclose($csvFile);
            redirect("menu.php?id=$id", "Import Success", "success");

        }else{
            redirect("menu.php?id=$id", "Something Went Wrong", "error");
        }
    }else{
        redirect("menu.php?id=$id", "Invalid File Format Please Use .CSV File", "warning");
    }
}

// // Redirect to the listing page
// header("Location: index.php".$qstring);