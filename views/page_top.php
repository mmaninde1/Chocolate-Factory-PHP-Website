<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    .topnav {
      background-color: #333;
      overflow: hidden;
    }
    /* Style the links inside the navigation bar */
    .topnav a {
      float: left;
      color: black;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 17px;
    }

    /* Change the color of links on hover */
    .topnav a:hover {
      background-color: #ddd;
      color: black;
    }

    /* Add a color to the active/current link */
    .topnav a.active {
      background-color: #4CAF50;
      color: white;
    }
  </style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $page_title ?></title>
</head>

<body>
  <div class="topnav">
    <a href="index.php">Home</a>
    <a href="cart.php">Cart</a>
  </div>
</body>

</html>