<?php


include 'db/conn.php';

if (!empty($_GET)) {
    $id = $_GET['id'];

    $sql = "INSERT INTO cart (p_id) VALUES('$id')";

    if ($result = $conn->query($sql)) {
        header("Location:index.php");
    } else {
        header("Location:index.php");
    }
}
else
{
    header("Location:index.php");
}
