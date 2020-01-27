<?php

session_start();

if ($_SESSION['id'] == false) {
    header("location:login.php");
    exit;
}
include 'views/header.php';
require_once('conn.php');

$id = $_GET['id'];
$sql = "SELECT * FROM products_table WHERE p_id='" . $id . "'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>
<form action="update_success.php?id=<?= $id; ?>" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name_product">Name of Product</label>
        <input type="text" class="form-control" name="product_name" value="<?= $row['name'] ?>" placeholder="Enter name of product" required>
    </div>
    <div class="form-group">
        <label for="name_product">Description of Product</label>
        <input type="text" class="form-control" name="description" value="<?= $row['description'] ?>" placeholder="Enter description of product" required>
    </div>
    <div class="form-group">
        <label for="name_product">Image of Product</label>
        <img src="images/<?= $row['img_url']; ?>" class="img-responsive" />
        <input type="file" class="form-control" name="newimage" accept="image/*">
    </div>
    <div class="form-group">
        <label for="name_product">Price of Product</label>
        <input class="form-control" type="number" step="0.01" min="0" name="price" value="<?= $row['price'] ?>" placeholder="Enter price of product" required>
    </div>
    <div class="form-group">
        <label for="name_product">Minimum Order of Product</label>
        <input class="form-control" type="number" min="0" name="order" value="<?= $row['min_order'] ?>" placeholder="Enter minimum order of product" required>
    </div>
    <button type="submit" name="update" class="btn btn-primary btn-success">Update</button>
    <a href="index.php"><button type="button" class="btn btn-primary">Cancel</button></a>
</form>
</div>
</body>
</html>