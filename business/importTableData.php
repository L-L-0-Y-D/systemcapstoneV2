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

                $table_number   = $line[0];
                $chair = $line[1];
                $status = $line[2];
                
                // Check whether member already exists in the database with the same name
                $prevQuery = "SELECT tableid FROM managetable WHERE table_number = '".$line[0]."' AND businessid = '$id'";
                $prevResult = $con->query($prevQuery);
                
                if($prevResult->num_rows > 0){
                    // Update member data in the database
                    $con->query("UPDATE managetable SET table_number = '".$table_number."', chair = '".$chair."', status = '".$status."' WHERE table_number = '".$table_number."' AND businessid = '$id'");

                }else{
                    // Insert member data in the database
                    $con->query("INSERT INTO managetable (businessid, table_number, chair, status) VALUES ('".$id."','".$table_number."','".$chair."','".$status."')");
                }
            }
            
            // Close opened CSV file
            fclose($csvFile);
            redirect("table.php?id=$id", "Import Success", "success");

        }else{
            redirect("table.php?id=$id", "Something Went Wrong", "error");
        }
    }else{
        redirect("table.php?id=$id", "Invalid File Format Please Use .CSV File", "warning");
    }
}

// // Redirect to the listing page
// header("Location: index.php".$qstring);