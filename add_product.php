<?php

$page_title = 'Add Product';
require_once('views/page_top.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
        <input type="text" name="product_name" placeholder="Enter name of product" required /><br>
        <textarea name="description" placeholder="Enter description of product" required></textarea><br>
        <span>Upload Image of Product: </span><input type="file" name="image" accept="image/*" required /><br>
        <input type="number" min="0" name="price" placeholder="Enter price of product" required /><br>
        <input type="number" min="0" name="order" placeholder="Enter minimum order of product" required /><br>
        <button type="submit" name="submit">Add Product</button>
    </form>
</body>

</html>

<?php
include 'db/conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

    if (empty($_POST['product_name']) || empty($_POST['description']) || empty($_FILES['image']['name']) || empty($_POST['price']) || empty($_POST['order'])) {
        echo "All Fields are required and cannot be empty!";
    } else {

        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $name = test_input($_POST['product_name']);
        $desc = test_input($_POST['description']);
        $price = test_input($_POST['price']);
        $order = test_input($_POST['order']);

        /* image store */
        $target = "images/" . ($_FILES['image']['name']);
        $image = addslashes($_FILES['image']['name']);

        /* upload file in directory */
        move_uploaded_file($_FILES['image']['tmp_name'], $target);

        $sql = "INSERT INTO products_table (name,description,img_url,price,min_order) VALUES('$name','$desc','$image',$price,$order)";


        if ($result = $conn->query($sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    $conn->close();
}

?>