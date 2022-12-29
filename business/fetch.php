<?php
include('../config/dbcon.php');
if(isset($_POST['request'])){

    $id = $_GET['id'];
    $request = $_POST['request'];

    if($request == "All")
    {
        $query = "SELECT * FROM products WHERE businessid = '$id' AND NOT status = 2";
        $result = mysqli_query($con,$query);
        $count = mysqli_num_rows($result);
    }
    else
    {
        $query = "SELECT * FROM products WHERE food_type = '$request' AND businessid = '$id' AND NOT status = 2";
        $result = mysqli_query($con,$query);
        $count = mysqli_num_rows($result); 
    }

?>

<div class="container" id="container">
    <?php
    if($count)
        {
    ?>

    <?php
        }
    else
        {
            echo "Sorry! no Record Found";
        }
    ?>
    <!-- <form action="menu.php" method="POST" enctype="multipart/form-data"> -->

        <?php
        while($item = mysqli_fetch_assoc($result))
        {
        ?>
        <div class="row mx-auto shadow-sm justify-content-center mb-2">
            <div class="col col-md-2">
                <div><img class="p-3" src="../uploads/<?= $item['image']; ?>" height="170px" width="150px"></div>
            </div>
            <div class="col p-4 col-md-5 info">
                <h6 class="fw-bold p-0 m-1"><?= $item['name']; ?></h6>
                <p class="p-0 m-1">₱<?= $item['price']; ?>.00</p>
                <p class="p-0 m-1">Course Menu:&nbsp;<?= $item['food_type']; ?></p>
                <p class="p-0 m-1">Cuisine Type:&nbsp;<?= $item['cuisinename']; ?></p>
                <p class="p-0 m-1">Product Description:&nbsp;<?= $item['description']; ?></p>
                <p class="p-0 m-1 fw-bold">Status:&nbsp;<?= $item['status']== '0'? "Sold Out":"Available"  ?></p>
            </div>
            <div class="col p-3 col-md-4 ">
                <div class="btn-group m-3" role="group">
                    <input type="hidden" name="businessid" value="<?= $item['businessid']; ?>">
                    <a href="edit-menu.php?id=<?= $item['productid']; ?>" class="btn edit-btn btn-sm" type="button">Edit&nbsp;&nbsp;<i class="fas fa-pencil-alt"></i></a>                                                           
                    <td><button  type="submit" class="btn btn-sm btn-danger archive_menu_btn" id="<?= $item['businessid']; ?>" value = "<?= $item['productid']; ?>"  name="archive_menu_btn"><i class="fas fa-archive">Archive&nbsp;&nbsp;</i></button></td>
                </div>
            </div>
        </div>
        <?php
        }
        ?>

    <!-- </form> -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('.archive_menu_btn').click(function () {
            var value = $(this).val();
            var id = $(this).attr('id');
            var name = $(this).attr('name');
            // alert (value);
            // alert (id);
            $.ajax({
                type: "POST",
                url: "code.php",
                data: {productid: value, businessid: id, archive_menusort_btn: name},
                success:function(data){
                    swal({
                    title: "Archive Success",
                    icon: "success",
                    button: "Okay",
                    timer: 1500,
                    }).then(() => {
                        location.reload();
                        });
                }
            });
        });
    });

</script>
<?php
}

?>