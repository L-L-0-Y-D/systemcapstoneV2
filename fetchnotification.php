<?php
//fetch.php;
$id = $_GET['id'];

if(isset($_POST["view"]))
{
    $host = "localhost";
    $username = "u217632220_ieat";
    $password = "Hj1@8QuF3C";
    $database = "u217632220_ieatwebsite";

    // Creating database connection
    $connect = mysqli_connect($host,$username,$password,$database);


    $id = $_GET['id'];
    if($_POST["view"] != '')
    {
        $update_query = "UPDATE notifications SET comment_status=1 WHERE comment_status=0 AND userid = $id";
        mysqli_query($connect, $update_query);
    }
        $query = "SELECT * FROM notifications WHERE usertype=2 AND userid = $id ORDER BY comment_id DESC LIMIT 5";
        $result = mysqli_query($connect, $query);
        $output = '';
    
    if(mysqli_num_rows($result) > 0)
    {
        $output .= '<h6 class="dropdown-header">Notification/s</h6>';
        while($row = mysqli_fetch_array($result))
        {
            $output .= '
            <a class="dropdown-item d-flex align-items-center" href="your_reservation.php?id='.$id.'">
                <div>
                    <span class="small text-gray-500"><strong>'.$row["comment_subject"].'</strong></span>
                    <span class="small text-gray-500" style="text-align: center;"></span>
                    <p>'.$row["comment_text"].'</p>
                </div>
            </a>
            ';
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
    
    $query_1 = "SELECT * FROM notifications WHERE userid = $id AND comment_status=0 AND usertype=2";
    $result_1 = mysqli_query($connect, $query_1);
    $count = mysqli_num_rows($result_1);
    $data = array(
    'notification'   => $output,
    'unseen_notification' => $count
    );
    echo json_encode($data);
}
?>