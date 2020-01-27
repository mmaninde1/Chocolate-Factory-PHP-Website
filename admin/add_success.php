<?php

session_start(); /* Starts the session */

if ($_SESSION['id'] == false) {
    header("location:login.php");
    exit;
}

include 'views/header.php';
require_once('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

    if (empty($_POST['product_name']) || empty($_POST['description']) || empty($_FILES['image']['name']) || empty($_POST['price']) || empty($_POST['order'])) { ?>
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

                $target = "images/" . ($_FILES['image']['name']);
                $image = addslashes($_FILES['image']['name']);

                /* upload file in directory */
                move_uploaded_file($_FILES['image']['tmp_name'], $target);

                $sql = "INSERT INTO products_table (name,description,img_url,price,min_order) VALUES('$name','$desc','$image',$price,$order)";

                if ($result = $conn->query($sql)) { ?>
            &nbsp;
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Success!</strong> Product added successfully.
            </div><?php
                } else {
                    ?>
            &nbsp;
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Error!</strong> Product cannot be added.
            </div>
<?php
                }
                header("refresh:4;url=index.php");
                $conn->close();
            }
        }
?>