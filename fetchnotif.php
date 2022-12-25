<?php
//fetch.php;
$host = "localhost";
$username = "u217632220_ieat";
$password = "Hj1@8QuF3C";
$database = "u217632220_ieatwebsite";

// Creating database connection
$connect = mysqli_connect($host,$username,$password,$database);

// if (isset($_SESSION['auth'])) {
    // $userid = $_SESSION['userid'];
    $query = "SELECT * FROM notifications WHERE comment_status = 0 AND usertype=2 ORDER BY comment_id DESC";
    $result = mysqli_query($connect, $query);
    $output = '';
    while ($row = mysqli_fetch_array($result)) {
        $output .= '
        <div class="alert alert_default">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <p><strong>' . $row["comment_subject"] . '</strong><br>
        <small><em>' . $row["comment_text"] . '</em></small>
        </p>
        </div>
        ';
    }
    $update_query = "UPDATE notifications SET comment_status = 1 WHERE comment_status = 0";
    mysqli_query($connect, $update_query);
    echo $output;
// }

?>