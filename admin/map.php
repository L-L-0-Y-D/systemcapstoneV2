<?php 

include('../middleware/adminMiddleware.php');
include('includes/header.php');

?>
  <div class="row justify-content-center mb-5">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <form method="post" action="code.php">
                    <h5 class="fw-bold text-center">All Business Location
                    <input hidden  type="text" id="latitude" name="latitude">
                    <input hidden  type="text" id="longitude" name="longitude">
                </form></h5>
            </div>
            <div class="card-body">
                <div id="map"  style="height: 700px"></div>
            </div>
        </div>
    </div>
</div>

<?php 

//include('../middleware/adminMiddleware.php');
include('includes/footer.php');

?>