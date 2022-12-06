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
    $query_business = "SELECT * FROM business WHERE business_name LIKE '%".$_POST["query"]."%' AND status='1' OR cuisinename LIKE '%".$_POST["query"]."%' AND status='1' OR business_address LIKE '%".$_POST["query"]."%' AND status='1' ORDER BY business_name ASC LIMIT 5";
    $result = mysqli_query($con, $query_business);
    $output = '<ul class="list-unstyled">';
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
        {
            $output .= '<li>'.$row["business_name"].'</li>';
        }
    }
    else
    {
        $output .= '<li>Business Not Found</li>';
    }
    $output .= '</ul>';
    echo $output;
}
?>