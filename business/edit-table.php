
<?php 

include('../config/dbcon.php');
include('../middleware/businessMiddleware.php');
include('includes/header.php');


?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-9">
        <?php 
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];

                $table = getByID("managetable", $id,"tableid");

                if(mysqli_num_rows($table) > 0)
                {
                    $data = mysqli_fetch_array($table);
                    ?>
                    <div class="card">
                        <div class="card-header">
                        <h4>Edit Table
                        <a href="table.php?id=<?= $_SESSION['auth_user']['businessid'];?>" class="back float-end">x</a></h4>       
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
                                        <input type="hidden" name="tableid" value="<?= $data['tableid']?>">
                                        <label class="mb-0">Table number</label>
                                        <input type="text" name="table" value="<?= $data['table_number']?>" required placeholder="Example: Table 1 " class="form-control mb-2">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="control-label">Number Of Chairs</label>
                                        <select  name="chair" value="<?= $data['chair'] ?>" required class="form-control mb-2">
                                            <option disabled selected hidden value="<?= $data['chair'] ?>"> <?= $data['chair'] ?></option>
                                            <option value="1 Person">1 Chair</option>
                                            <option value="2 People">2 Chairs</option>
                                            <option value="3 People">3 Chairs</option>
                                            <option value="4 People">4 Chairs</option>
                                            <option value="5 People">5 Chairs</option>
                                            <option value="6 People">6 Chairs</option>
                                            <option value="7 People">7 Chairs</option>
                                            <option value="8 People">8 Chairs</option>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="formCheck-1" name="status" <?= $data['status'] == '0'? '':'checked' ?>> 
                                            <label class="form-check-label" for="formCheck-1"><strong>Status</strong></label>
                                        </div>
                                    </div>         
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary" name="update_table_btn">Save</button>
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