<?php

session_start(); /* Starts the session */

if ($_SESSION['id'] == false) {
    header("location:login.php");
    exit;
}
include 'views/header.php';
require_once('conn.php');

$id = $_GET['id'];
$sql = "DELETE FROM products_table WHERE p_id='" . $id . "'";

if ($conn->query($sql) === TRUE) { ?>
    &nbsp;
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Success!</strong> This Product is successfully deleted from database.
    </div><?php
        } else {
            ?>
    &nbsp;
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Error!</strong> This Product cannot be deleted.
    </div><?php
        }

        header("refresh:3;url=index.php");
        $conn->close();
            ?>
</div>
</body>
</html>