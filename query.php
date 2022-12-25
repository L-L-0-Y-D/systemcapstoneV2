<?php
    $host = "localhost";
    $username = "u217632220_ieat";
    $password = "Hj1@8QuF3C";
    $database = "u217632220_ieatwebsite";

    // Creating database connection
    $con = mysqli_connect($host,$username,$password,$database);
if(isset($_POST["query"]))
{
    $output = '';
    $query_business = "SELECT * FROM business JOIN municipality ON business.municipalityid = municipality.municipalityid WHERE business.business_name LIKE '%".$_POST["query"]."%' AND business.status='1' AND business.archive='0' OR business.cuisinename LIKE '%".$_POST["query"]."%' AND business.status='1' AND business.archive='0' OR municipality.municipality_name LIKE '%".$_POST["query"]."%' AND business.status='1' AND business.archive='0' ORDER BY business_name ASC LIMIT 5";
    $result = mysqli_query($con, $query_business);
    $output = '<ul class="list-group justify-content-center">';
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
        {
            $output .= '<li id="businesslist">'.$row["business_name"].' ('.$row["municipality_name"].')</li>';
        }
    }
    else
    {
        $output .= '<li id="businesslist">Business Not Found</li>';
    }
    $output .= '</ul>';
    echo $output;
}
?>