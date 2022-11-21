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

<table id="container" class="table my-0" id="dataTable" style="text-align:center">
    <?php
    if($count)
        {
    ?>
    <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Course Menu</th>
            <th>Cuisine Type</th>
            <th>Status</th>
            <th>Action</th>
            <th>Archive</th>
            <!--<th>Delete</th>-->
        </tr>
    <?php
        }
    else
        {
            echo "Sorry! no Record Found";
        }
    ?>
    </thead>
    <!-- <form action="menu.php" method="POST" enctype="multipart/form-data"> -->
    <tbody style="text-align:center">
        <?php
        while($item = mysqli_fetch_assoc($result))
        {
        ?>
        <tr>
            <td><img src="../uploads/<?= $item['image']; ?>" width="50px" height="50px" alt="<?= $item['image']; ?>"></td>
            <td><?= $item['name']; ?></td>
            <td><?= $item['price']; ?></td>
            <td><?= $item['description']; ?></td>
            <td><?= $item['food_type']; ?></td>
            <td><?= $item['cuisinename']; ?></td>
            <td><?= $item['status']== '0'? "Sold Out":"Available"  ?></td>
            <td>
                <a href="edit-menu.php?id=<?= $item['productid']; ?>" class="btn edit-btn"><i class="fas fa-pencil-alt"></i></a>
            </td>
            <!--<td>
                <button type="button" class="btn btn-sm btn-danger" value="<?= $item['productid']; ?>" >Delete</button>
            </td>-->
            
            <!-- <input type="hidden" name="businessid" class="bisnes" value="<?= $item['businessid']; ?>"> -->
            <td><button  type="submit" class="btn btn-sm btn-danger archive_menu_btn" id="<?= $item['businessid']; ?>" value = "<?= $item['productid']; ?>"  name="archive_menu_btn"><i class="fas fa-archive"></i></button></td>

        </tr>
        <?php
        }
        ?>
    </tbody>
    <!-- </form> -->
</table>
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