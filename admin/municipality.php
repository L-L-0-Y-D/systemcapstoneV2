<?php 

include('../middleware/adminMiddleware.php');
include('includes/header.php');


?>
    <div class="container-fluid">
            <h3 class="text-dark mb-2 mx-3">Municipality List
            <a class="btn btn-primary btn-sm float-end " role="button" href="add-municipality.php" id="addbtn">Add Municipality</a>
            </h3><div>&nbsp;</div>
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    <table class="table my-0" id="dataTable">
                        <thead style="text-align:center">
                        <tr>
                            <th>Municipality Name</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                            <!-- <th>Delete</th> -->
                        </tr>
                        </thead>
                
                        <tbody style="text-align:center">
                            <?php
                                $municipality = getAll("municipality");

                               if(mysqli_num_rows($municipality ) > 0)
                               {
                                   foreach($municipality  as $item)
                                   {
                                       ?>
                                       <tr>
                                           <td><?= $item['municipality_name']; ?></td>
                                            <td>
                                                <img src="../uploads/<?= $item['image']; ?>" width="50px" height="50px" alt="<?= $item['image']; ?>">
                                            </td>
                                            <td><?= $item['status']== '1'? "Active":"Hidden"  ?></td>
                                           <td>
                                               <a href="edit-municipality.php?id=<?= $item['municipalityid']; ?>" class="btn btn-sm edit-btn btn-outline-dark"><i class="fas fa-pencil-alt"></i></a>
                                           </td>
                                           <!-- <td>
                                               <button type="button" class="btn btn-sm btn-danger delete_municipality_btn" value="<?= $item['municipalityid']; ?>" >Delete</button>
                                           </td> -->
                                       </tr>
                                       <?php
                                       
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