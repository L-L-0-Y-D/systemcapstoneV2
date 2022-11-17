<?php
include('../config/dbcon.php');
if(isset($_POST['request'])){

    $id = $_GET['id'];
    $request = $_POST['request'];

    $query = "SELECT * FROM products WHERE food_type = '$request' AND businessid = '$id'";
    $result = mysqli_query($con,$query);
    $count = mysqli_num_rows($result);

?>

<table class="table">
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
            <td><button type="submit" class="btn btn-sm btn-danger" value = "<?= $item['productid']; ?>"  name="archive_menu_btn"><i class="fas fa-archive"></i></button></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?php
}
?>