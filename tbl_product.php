<?php
    $page_title = 'Page B';
    require_once('views/page_top.php');
?>
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

$sql = "SELECT * from products_table";
$result = $conn->query($sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Id: " . $row["p_id"]. " - Name: " . $row["name"]. "-Price " . $row["price"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
