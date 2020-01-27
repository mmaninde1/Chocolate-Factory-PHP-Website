<?php

session_start(); /* Starts the session */

if ($_SESSION['id'] == false) {
    header("location:login.php");
    exit;
}
include 'views/header.php';
?>

<form action="add_success.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name_product">Name of Product</label>
        <input type="text" class="form-control" name="product_name" placeholder="Enter name of product" required>
    </div>
    <div class="form-group">
        <label for="name_product">Description of Product</label>
        <input type="text" class="form-control" name="description" placeholder="Enter description of product" required>
    </div>
    <div class="form-group">
        <label for="name_product">Image of Product</label>
        <input type="file" class="form-control" name="image" accept="image/*" required>
    </div>
    <div class="form-group">
        <label for="name_product">Price of Product</label>
        <input class="form-control" type="number" step="0.01" min="0" name="price" placeholder="Enter price of product" required>
    </div>
    <div class="form-group">
        <label for="name_product">Minimum Order of Product</label>
        <input class="form-control" type="number" min="0" name="order" placeholder="Enter minimum order of product" required>
    </div>
    <button type="submit" name="submit" class="btn btn-primary btn-success">Submit</button>
</form>
</div>
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>