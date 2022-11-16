<?php 

include('../config/dbcon.php');
include('../middleware/businessMiddleware.php');
include('includes/header.php');


?>
    <div class="container-fluid">
            <h4 class="text-dark">Feedback List</h4>
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    <table class="table my-0" id="dataTable">
                        <thead style="text-align:center">
                        <tr>
                            <th>Name</th>
                            <th>Rating</th>
                            <th>Review</th>
                        </tr>
                        </thead>
                
                        <tbody style="text-align:center">
                            <?php
                                $review = getAll("review_table");

                               if(mysqli_num_rows($review) > 0)
                               {
                                   foreach($review as $item)
                                   {
                                    if($item['businessid'] == $_SESSION['auth_user']['businessid'])
                                        {
                                       ?>
                                       <tr>
                                            <td><?= $item['user_name']; ?></td>
                                            <td><?= $item['user_rating']; ?></td>
                                            <td><?= $item['user_review'];?></td>
                                       </tr>
                                       <?php
                                        }
                                   }
                               }
                                else
                                {
                                    echo "No records Found";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php 

//include('../middleware/adminMiddleware.php');
include('includes/footer.php');


?>