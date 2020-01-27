<?php

session_start();

if ($_SESSION['id'] == false) {
    header("location:login.php");
    exit;
}
include 'views/header.php';
require_once('conn.php');

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {

    if (empty($_POST['product_name']) || empty($_POST['description']) || empty($_POST['price']) || empty($_POST['order'])) { ?>
        &nbsp;
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Error!</strong> Fields cannot be empty.
        </div><?php
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

                /* image */
                $image = $_FILES['newimage']['name'];
                $image_tmp = $_FILES['newimage']['tmp_name'];

                if ($image_tmp != "") {
                    $target = "images/" . ($_FILES['newimage']['name']);
                    move_uploaded_file($_FILES['newimage']['tmp_name'], $target);
                    $sql = "UPDATE products_table SET name='$name',description='$desc',img_url='$image',price='$price',min_order='$order' WHERE p_id='" . $id . "'";
                } else {
                    $sql = "UPDATE products_table SET name='$name',description='$desc',price='$price',min_order='$order' WHERE p_id='" . $id . "'";
                }

                if ($result = $conn->query($sql)) { ?>
            &nbsp;
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Success!</strong> Data updated successfully.
            </div><?php
                } else {
                    ?>
            &nbsp;
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Error!</strong> Data cannot be updated.
            </div>
<?php
                }
                header("refresh:4;url=index.php");
                $conn->close();
            }
        }
?>