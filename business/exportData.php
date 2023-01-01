<?php 
// Load the database configuration file 
include('../config/dbcon.php');
include('../functions/businessfunctions.php');

$id = $_GET['id'];
$filename = "products_" . date('Y-m-d') . ".csv"; 
$delimiter = ","; 
 
// Create a file pointer 
$f = fopen('php://memory', 'w'); 
 
// Set column headers 
$fields = array('Name', 'Description', 'Food_Type', 'Cuisinename', 'Price', 'Image', 'Status'); 
fputcsv($f, $fields, $delimiter); 
 
// Get records from the database 
$result = $con->query("SELECT * FROM products WHERE businessid = '$id' ORDER BY productid DESC"); 
if($result->num_rows > 0){ 
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $result->fetch_assoc()){ 
        $lineData = array($row['name'], $row['description'], $row['food_type'],$row['cuisinename'], $row['price'], $row['image'], $row['status']); 
        fputcsv($f, $lineData, $delimiter); 
    } 
} 
 
// Move back to beginning of file 
fseek($f, 0); 
 
// Set headers to download file rather than displayed 
header('Content-Type: text/csv'); 
header('Content-Disposition: attachment; filename="' . $filename . '";'); 
 
// Output all remaining data on a file pointer 
fpassthru($f); 
 
// Exit from file 
exit();