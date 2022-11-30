<?php
//fetch.php;
$host = "localhost";
$username = "u217632220_ieat";
$password = "Hj1@8QuF3C";
$database = "u217632220_ieatwebsite";

// Creating database connection
$connect = mysqli_connect($host,$username,$password,$database);
if(isset($_POST["view"]))
{


    if($_POST["view"] != '')
    {
        $update_query = "UPDATE notifications SET comment_status=1 WHERE comment_status=0";
        mysqli_query($connect, $update_query);
    }
        $query = "SELECT * FROM notifications WHERE usertype=1 ORDER BY comment_id DESC LIMIT 5";
        $result = mysqli_query($connect, $query);
        $output = '';
    
    if(mysqli_num_rows($result) > 0)
    {
        $output .= '<h6 class="dropdown-header">Notification</h6>';
        while($row = mysqli_fetch_array($result))
        {
            if($row['comment_subject'] == "NEW BUSINESS FOR VERIFICATION")
            {
                $output .= '
                <a class="dropdown-item d-flex align-items-center" href="busiowner.php">
                    <div>
                        <span class="small text-gray-500"><strong>'.$row["comment_subject"].'</strong></span>
                        <span class="small text-gray-500" style="text-align: center;"></span>
                        <p>'.$row["comment_text"].'</p>
                    </div>
                </a>
                ';
            }elseif($row['comment_subject'] == "NEW USER")
            {
                $output .= '
                <a class="dropdown-item d-flex align-items-center" href="customers.php">
                    <div>
                        <span class="small text-gray-500"><strong>'.$row["comment_subject"].'</strong></span>
                        <span class="small text-gray-500" style="text-align: center;"></span>
                        <p>'.$row["comment_text"].'</p>
                    </div>
                </a>
                ';
            }
        }
    }
    else
    {
        $output .= '<h6 class="dropdown-header">Notification</h6>';
        $output .= '<a class="dropdown-item d-flex align-items-center" href="#">
                        <div>
                            <p>No Notification Found</p>
                        </div>
                    </a>';
    }
    
    $query_1 = "SELECT * FROM notifications WHERE comment_status=0 AND usertype=1";
    $result_1 = mysqli_query($connect, $query_1);
    $count = mysqli_num_rows($result_1);
    $data = array(
    'notification'   => $output,
    'unseen_notification' => $count
    );
    echo json_encode($data);
}

// if(isset($_GET["users"]))
// {
// $query_user = "SELECT userid FROM users WHERE role_as = 0 ORDER BY userid";
// $query_user_run = mysqli_query($connect, $query_user);
// $row_user = mysqli_num_rows($query_user_run);
// echo $row_user;
// }

// if(isset($_GET["all_business"]))
// {
// $query_business = "SELECT businessid FROM business WHERE status = 1 ORDER BY businessid";
// $query_business_run = mysqli_query($connect, $query_business);
// $row_business = mysqli_num_rows($query_business_run);
// echo $row_business;
// }
?>
