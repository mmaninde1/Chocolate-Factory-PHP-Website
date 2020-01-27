<?php

session_start(); /* Starts the session */

if ($_SESSION['id'] == false) {
    header("location:login.php");
    exit;
}
include 'views/header.php';
require_once('conn.php');

$id = $_GET['id'];
$sql = "UPDATE products_table SET n_likes=0 WHERE p_id='" . $id . "'";

if ($conn->query($sql) === TRUE) { ?>
    &nbsp;
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Success!</strong> Likes Resetted.
    </div><?php
        } else {
            ?>
    &nbsp;
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Error!</strong> Likes cannot be reset.
    </div><?php
        }

        header("refresh:3;url=index.php");
        $conn->close();
            ?>


</div>
</body>

</html>