
<?php 

include('../config/dbcon.php');
include('../middleware/businessMiddleware.php');
include('includes/header.php');


?>
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
        <?php 
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];

                $table = getByID("blockdate", $id,"blockdateid");

                if(mysqli_num_rows($table) > 0)
                {
                    $data = mysqli_fetch_array($table);
                    ?>
                    <div class="card">
                        <div class="card-header">
                            <a href="blockdate.php?id=<?= $_SESSION['auth_user']['businessid'];?>" class="back btn-sm btn-close float-end"></a>       
                            <h5 class="fw-bold">Edit Blockdate</h5>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php 
                                        ?>
                                        <input type="hidden" name="businessid" value="<?= $_SESSION['auth_user']['businessid'];?>">
                                        <?php
                                        ?>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0">Reason(s):</label>
                                        <input type="hidden" name="blockdateid" value="<?= $data['blockdateid']?>">
                                        <input type="text" name="reason" required placeholder="Type your reason here" value="<?= $data['reason']?>" required class="form-control mb-2">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0">Select Date:</label>
                                        <input class="form-control" type="date" id="blockdates" name="blockdates" min="<?php echo date("Y-m-d"); ?>" value="<?= $data['blockdates']?>" required>
                                    </div>
                                    <div class="row">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="formCheck-1" name="status" <?= $data['status'] == '0'? '':'checked' ?>> 
                                            <label class="form-check-label" for="formCheck-1"><strong>Status</strong></label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn save-btn btn-sm" name="update_blockdate_btn" >Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
        
        <?php 
                }
                else
                {
                    echo "Product Not Found for given id";
                }
            }
            else
            {
                echo "ID missing from url";
            }
        ?>
    </div>
  </div>  
</div>


<?php include('includes/footer.php');?>