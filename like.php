<?php
$page_title = 'Products';
require_once('views/page_top.php');

include 'db/conn.php';

$id = $_GET['id'];

$sql = "SELECT n_likes from products_table WHERE p_id='" . $id . "'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$old_likes = $row['n_likes'];

$old_likes += 1;

$sql1 = "UPDATE products_table SET n_likes='$old_likes' WHERE p_id='" . $id . "'";

if ($result = $conn->query($sql1)) { ?>
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
        header("Location:index.php");
        $conn->close();
?>