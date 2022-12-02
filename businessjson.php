<?php
include('config/dbcon.php');

function getlocation()
{
    global $con;
    $query = "SELECT * FROM business WHERE status='1'";
    return $query_run = mysqli_query($con, $query);
}

$location = getlocation();
$locations = [];
foreach($location  as $storelocation){
if($storelocation['latitude'] && $storelocation['longitude'])
    {
       $locations[] = [
            'id' => $storelocation['businessid'],
            'name' => $storelocation['business_name'],
            'address' => $storelocation['business_address'],
            'cuisinenames' => $storelocation['cuisinename'],
            'opening' => $storelocation['opening'],
            'closing' => $storelocation['closing'],
            'lat' => $storelocation['latitude'],
            'lng' => $storelocation['longitude'],
            
        ];
    }
}
echo json_encode($locations);

?>