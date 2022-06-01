<?php 

include('../middleware/adminMiddleware.php');
include('includes/header.php');


?>
                <div class="container-fluid">
                <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h3 class="text-dark mb-4">Municipality List</h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="add-municipality.php" style="background: rgb(255,128,64);border-style: none;"  id="addbtn">&nbsp;Add Municipality</a>
                    <div class="form-popup" id="myForm">

        <div class="column">
            
                    
            </form>
        </div>
                        </div>
                </div>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold" style="color: rgb(255,128,64);">Municipality</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Municipality</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $municipality = getAll("municipality");

                                        if(mysqli_num_rows($municipality ) > 0)
                                        {
                                            foreach($municipality  as $item)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $item['municipalityid']; ?></td>
                                                    <td><?= $item['municipality_name']; ?></td>
                                                        <td>
                                                            <img src="../uploads/<?= $item['image']; ?>" width="50px" height="50px" alt="<?= $item['image']; ?>">
                                                        </td>
                                                        <td><?= $item['status']== '0'? "Active":"Hidden"  ?></td>
                                                    <td>
                                                        <a href="edit-municipality.php?id=<?= $item['municipalityid']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-sm btn-danger delete_municipality_btn" value="<?= $item['municipalityid']; ?>" >Delete</button>
                                                    </td>
                                                </tr>
                                                <?php
                                                
                                            }
                                        }
                                            else
                                            {
                                                echo "No records Found";
                                            }
                                    ?>`
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php 

//include('../middleware/adminMiddleware.php');
include('includes/footer.php');


?>