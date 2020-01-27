<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
  text-align: left;
}
</style>


<?php
$page_title = 'Cart';
require_once('views/page_top.php');

include 'db/conn.php';

    $sql = "SELECT * from cart";
    $result = $conn->query($sql);
?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name of Chocolate</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price of Chocolate</th>
                <th scope="col">Operation</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $total = 0;
            if (mysqli_num_rows($result) > 0) {
                while ($row = $result->fetch_assoc()) { 
                    $id = $row['p_id'];
                    $order_id = $row['id'];
                    

                    $sql1 = "SELECT * from products_table WHERE p_id='".$id."'";
                    $result1 = $conn->query($sql1);
                    if (mysqli_num_rows($result1) > 0) {
                        while ($row1 = $result1->fetch_assoc()) {
                            $total += $row1['price']; ?>
                            <tr>
                        <td><?= $row1['name']; ?></td>
                        <td><?= $row1['min_order']; ?></td>
                        <td>$<?= $row1['price']; ?></td>
                        <td><a href="deletecart.php?id=<?= $row['id']; ?>"><button>Remove</button></a></td>
                    </tr>
                    <?php
                        }
                    }
                }
?></tbody>
<tfoot>
    <tr>
      <th colspan="2">Total (Before Tax) :</th>
      <td>$<?= $total; ?></td>
    </tr>
    <tr>
      <th colspan="2">Tax :</th>
      <td>$<?= $tax = (($total*15)/100); ?></td>
    </tr>
    <tr>
      <th colspan="2">Grand Total :</th>
      <td>$<?= $total+$tax; ?></td>
    </tr>
   </tfoot>
</table><br>
                <form action="getemail.php" method="POST">
                <label for="email">Email: </label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required><br>
                <small>Enter your email to proceed checkout.</small>
                <p><button type="submit" class="w3-button w3-black w3-round-xxlarge" name="purchase">Checkout</button></p>
            </form><?php
            }
            else
            {
                ?><p>There are no items in cart.</p>
                <?php
            }
            ?>

<?php
            $conn->close();
?>
            
    