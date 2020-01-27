<?php

session_start(); /* Starts the session */

if ($_SESSION['id'] == false) {
  header("location:login.php");
  exit;
}

include 'views/header.php';
?>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Image</th>
      <th scope="col">Price</th>
      <th scope="col">Minimum Order</th>
      <th scope="col">Number of Likes</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
      <th scope="col">Reset Likes</th>
    </tr>
  </thead>
  <tbody>
    <?php
    require_once('conn.php');

    $sql = "SELECT * from products_table";
    $result = $conn->query($sql);

    if (mysqli_num_rows($result) > 0) {
      while ($row = $result->fetch_assoc()) { ?>
        <tr>
          <th scope="row"><?= $row['p_id']; ?></th>
          <td><?= $row['name']; ?></td>
          <td><?= $row['description']; ?></td>
          <td><img src="images/<?= $row['img_url']; ?>" class="img-responsive" /></td>
          <td><?= $row['price']; ?></td>
          <td><?= $row['min_order']; ?></td>
          <td><?= $row['n_likes']; ?></td>
          <td><a href="update.php?id=<?= $row['p_id']; ?>"><button class="btn btn-primary">Update</button></a></td>
          <td><a href="delete.php?id=<?= $row['p_id']; ?>"><button class="btn btn-primary">Delete</button></a></td>
          <td><a href="resetlikes.php?id=<?= $row['p_id']; ?>"><button class="btn btn-primary">Reset Likes</button></a></td>
        </tr>
      <?php
      }
    } else {
      ?>
      &nbsp;
      <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Error!</strong> No Products in Database.
      </div><?php
          }
            ?>
    </div>

    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
    </html>