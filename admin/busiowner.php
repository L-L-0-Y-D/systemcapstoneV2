<?php 

include('../middleware/adminMiddleware.php');
include('includes/header.php');


?>
<!--
<div class="container-fluid">
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-4">BUSINESS PARTNERS</h3>   
    </div>
    <section class="bg-light" >
        <div class="container">
            <div class="row">
                <?php
                    $business = businessGetAll();

                    if(mysqli_num_rows($business) > 0)
                    {
                        foreach($business as $item)
                        {
                            if($_SESSION['role_as'] != 0)
                            {
                ?>
                <div class="col-sm-6 col-md-4 portfolio-item">
                    <a class="portfolio-link" href="#portfolioModal1" data-bs-toggle="modal">
                        <div class="portfolio-hover" style="border-style: none;background: rgba(255,128,64,0.55);">
                            <div class="portfolio-hover-content"><p><strong>VIEW DETAILS</strong></p></div>
                            <img class="img-fluid" src="../uploads/<?= $item['image']; ?>" style="height:200px; width:200px;" alt="<?= $item['image']; ?>">
                        </div>
                    </a>
                    <div class="portfolio-caption text-center">
                        <h4><?= $item['business_name']; ?></h4>
                    </div>
                </div>
                <?php
                }
                    }
                        }
                        else
                        {
                            echo "No records Found";
                        }
                ?>
            </div>
        </div>
    </section>
</div>
    <div class="modal fade text-center portfolio-modal " role="dialog" tabindex="-1" id="portfolioModal1">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="container">
                    <div class="d-xl-flex justify-content-xl-end mt-4">
                        <button class="btn btn-primary" type="button" data-bs-dismiss="modal">
                            <i class="fa fa-times"></i><span>&nbsp;Close&nbsp;</span>
                        </button>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <?php
                                $business = businessGetAll();

                                if(mysqli_num_rows($business) > 0)
                                {
                                    foreach($business as $item)
                                    {
                                        if($_SESSION['role_as'] != 0)
                                        {
                            ?>
                            <div class="modal-body">
                                <div class="row mb-3">
                                    <div class="col-lg-4">
                                        <div class="card mb-3">
                                            <div class="card-header py-3">
                                                <h6 class="text-primary fw-bold m-0"><?= $item['business_name']; ?></h6>
                                            </div>
                                            <div class="card-body text-center shadow">
                                                <img class="rounded-circle mb-3 mt-4" src="../uploads/<?= $item['image']; ?>" width="160" height="160" alt="<?= $item['image']; ?>"></div>
                                        </div>
                                        <div class="card mb-3">
                                            <div class="card-header py-3">
                                                <h6 class="text-primary fw-bold m-0">BUSINESS PERMIT</h6>
                                            </div>
                                            <div class="card-body text-center shadow">
                                                <a href="../certificate/<?= $item['image_cert']; ?>" width="50px" height="50px" alt="<?= $item['image_cert']; ?>">
                                                    <img class="rounded mb-3 mt-4" src="../certificate/<?= $item['image_cert']; ?>" width="160" height="160" alt="<?= $item['image_cert']; ?>"> 
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="row mb-3 d-none">
                                            <div class="col">
                                                <div class="card text-white bg-primary shadow">
                                                    <div class="card-body">
                                                        <div class="row mb-2">
                                                            <div class="col">
                                                                <p class="m-0">Peformance</p>
                                                                <p class="m-0"><strong>65.2%</strong></p>
                                                            </div>
                                                            <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                                        </div>
                                                        <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="card text-white bg-success shadow">
                                                    <div class="card-body">
                                                        <div class="row mb-2">
                                                            <div class="col">
                                                                <p class="m-0">Peformance</p>
                                                                <p class="m-0"><strong>65.2%</strong></p>
                                                            </div>
                                                            <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                                        </div>
                                                        <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="card shadow mb-3">
                                                    <div class="card-header py-3">
                                                        <p class="text-primary m-0 fw-bold">BUSINESS OWNER INFORMATION</p>
                                                    </div>
                                                    <div class="card-body">
                                                        <form>
                                                            <div class="row">
                                                                <div class="col" style="text-align: left;">
                                                                    <p style="margin-bottom: 0px;">
                                                                    <label class="form-label" for="last_name"><strong>First Nam :&nbsp;</strong></label><?= $item['business_firstname']; ?></p>
                                                                    <p style="margin-bottom: 0px;"
                                                                    ><label class="form-label" for="last_name"><strong>LastName :&nbsp;</strong></label><?= $item['business_lastname']; ?></p>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="card shadow">
                                                    <div class="card-header py-3">
                                                        <p class="text-primary m-0 fw-bold">BUSINESS DETAILS</p>
                                                    </div>
                                                    <div class="card-body">
                                                        <form>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="city"><strong>Opening</strong><br></label>
                                                                        <input class="form-control" type="text" id=""value="<?= date('h:i A', strtotime($item['opening'])); ?>"></div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="country"><strong>Closing</strong><br></label>
                                                                        <input class="form-control" type="text" id="" value="<?= date('h:i A', strtotime($item['closing']));?>" ></div>
                                                                </div>
                                                            </div>
                                                            <div class="col" style="text-align: left;">
                                                                <p style="margin-bottom: 0px;">
                                                                <label class="form-label" for="last_name"><strong>Type of Cuisine :&nbsp;</strong></label><?= $item['cuisinename']; ?></p>
                                                                <p style="margin-bottom: 0px;">
                                                                <label class="form-label" for="last_name"><strong>Municipality :&nbsp;</strong></label><?= $item['municipality_name']; ?></p>
                                                            </div>
                                                            <div class="mb-3" style="text-align: left;">
                                                            <label class="form-label" for="address"><strong>STATUS:&nbsp;</strong><br></label><?= $item['status']== '0'? "Waiting":"Activated"  ?></div>
                                                            <div class="mb-3">
                                                                <div class="row">
                                                                    <div class="col d-lg-flex justify-content-lg-end align-items-lg-center">
                                                                        <div class="mb-3"></div><a href="edit-business.php?id=<?= $item['businessid']; ?>"><button class="btn btn-primary btn-sm" type="submit" >EDIT</button></a>
                                                                    </div>
                                                                    <div class="col d-lg-flex justify-content-lg-start align-items-lg-center">
                                                                        <div class="mb-3"></div><button class="btn btn-primary btn-sm" type="submit" value="<?= $item['businessid']; ?>">DELETE</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="card mb-3">
                                            <div class="card-header py-3">
                                                <h6 class="text-primary fw-bold m-0">BUSINESS LOCATION</h6>
                                            </div>
                                            <div class="card-body text-center shadow">
                                                <iframe allowfullscreen="" frameborder="0" src="https://maps.google.com/maps?q=<?=$item['latitude'];?>,<?=$item['longitude']?>&hl=es;z=14&output=embed" width="100%" height="400"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                                }
                                    }
                                    else
                                    {
                                        echo "No records Found";
                                    }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

-->   




    <div class="container-fluid">
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="text-dark mb-4">BUSINESS PARTNERS</h3>
           
        </div>
        <div class="card shadow">
            <div class="card-body" id="business_table">
                <div class="row">
                    <div class="col-md-6 text-nowrap">
                        <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label class="form-label">Show&nbsp;<select class="d-inline-block form-select form-select-sm">
                            <option value="10" selected="">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            </select>&nbsp;</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-end dataTables_filter" id="dataTable_filter">
                            <label class="form-label">
                                <input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search">
                            </label>
                        </div>
                    </div>
                    </div>
                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                        <table class="table my-0" id="dataTable" style="text-align:center">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Business Permit</th>
                                    <th>Map Location</th>
                                    <th>Business Name</th>
                                    <th>Cuisine Type</th>
                                    <th>Municipality</th>
                                    <th>Opening Time</th>
                                    <th>Closing Time</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            
                            <tbody style="text-align:center">
                                <?php
                                    $business = businessGetAll();

                                    if(mysqli_num_rows($business) > 0)
                                    {
                                        foreach($business as $item)
                                        {
                                            if($_SESSION['role_as'] != 0)
                                            {
                                                ?>
                                                    <tr>
                                                        <td><img src="../uploads/<?= $item['image']; ?>" width="100px" height="100px" alt="<?= $item['image']; ?>"></td>
                                                        <td class="col-md-6 col-lg-4 item">
                                                            <a href="../certificate/<?= $item['image_cert']; ?>" width="50px" height="50px" alt="<?= $item['image_cert']; ?>">
                                                            <img class="img-thumbnail img-fluid image" src="../certificate/<?= $item['image_cert']; ?>" width="100px" height="100px" alt="<?= $item['image_cert']; ?>"> </td>
                                                            <td><a href="https://google.com/maps?q=<?= $item['latitude'] ?>,<?= $item['longitude'] ?>" style="width: 100px; height: 100px;">View Maps</a></td>
                                                            <td><?= $item['business_name']; ?></td>
                                                            <td><?= $item['cuisinename']; ?></td>
                                                            <td><?= $item['municipality_name']; ?></td>
                                                            <td><?= date('h:i A', strtotime($item['opening'])); ?></td>
                                                            <td><?= date('h:i A', strtotime($item['closing']));?></td>
                                                            <td><?= $item['business_firstname']; ?></td>
                                                            <td><?= $item['business_lastname']; ?></td>
                                                            <td><?= $item['status']== '0'? "Waiting":"Activated"  ?></td>
                                                            <td>
                                                            <a href="edit-business.php?id=<?= $item['businessid']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                                            </td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-danger delete_business_btn" value="<?= $item['businessid']; ?>" >Delete</button>
                                                        </td>
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
                    <div class="row">
                        <div class="col-md-6 align-self-center">
                            <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 27</p>
                        </div>
                        <div class="col-md-6">
                            <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                <ul class="pagination">
                                    <li class="page-item disabled"><a class="page-link" aria-label="Previous" href="#"><span aria-hidden="true">«</span></a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" aria-label="Next" href="#"><span aria-hidden="true">»</span></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 

//include('../middleware/adminMiddleware.php');
include('includes/footer.php');


?>