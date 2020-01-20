<main>
   
</main>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "finalproject";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * from product";
$result = $conn->query($sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Id: " . $row["product_id"]. " - Name: " . $row["product_name"]. "-Price " . $row["price"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>




