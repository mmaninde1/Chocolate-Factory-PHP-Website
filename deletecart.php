<?php
include 'db/conn.php';

$id = $_GET['id'];
$sql = "DELETE FROM cart WHERE id='" . $id . "'";

if ($conn->query($sql) === TRUE)
{
    header("Location:cart.php");
}
else
{
    echo "Error in removing this product from cart";
}

$conn->close();
?>