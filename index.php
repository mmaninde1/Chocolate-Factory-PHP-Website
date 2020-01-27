<?php
    $page_title = 'Home | Chocolate Factory';
    require_once('views/page_top.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>

@media only screen and (min-width: 1200px)
  {
    .grid-container {
     
      
      margin-top:80px;
      display: grid;
      grid-template-columns: auto auto auto;
      background-color:white;
      padding: 10px;
    }
  }

  button:hover
  {
    color: black;
    background-color: #BBD4C1;
  }
  .name_recipe>p
  {
    padding-left: 75px;
    text-transform: uppercase;
    font-weight: bolder;
    padding-top: 7px;
    padding-bottom: 7px;
  }
  .grid-item:hover
  {
    transform: scale(1.1);
  }

  .grid-item>.image>img
  {
    height: 186px;
    width: 300px;
    box-shadow: 0px 0px 25px black;
  }

  .grid-item {
    width:450px;
    height: 450px;
    background-color: rgba(255, 255, 255, 0.8);
    /*border: 1px solid gray;*/
    padding: 10px;
    font-size: 20px;
    text-align: center;
    transition: transform .2s;
  }
  button {
    width: 300px;
    height: 50px;
    background-color:black;
    color: white;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    cursor: pointer;
    padding: 10px 10px;
    border-bottom:2px white solid;
  }
  img.resize {
    width:300px;
    height:140px;
  }
  image
  {
      width:400px;
      height: 150px;
      height: auto;
      align-self: center;
  }
  image.food_img
  {
    width: 280px;
    height: 180px;
  }
  .name_recipe
  {
    /*margin-left: 3.7em;
    width: 50%;*/
  }
  @media only screen and (min-width: 200px) and (max-width: 678px)
  {
    .grid-container {
      margin-left: 40px;
      margin-right: 40px;
      display: grid;
      grid-template-columns: auto;
      background-color:white;
      padding: 10px;
    }
  }
  @media only screen and (min-width: 678px) and (max-width: 1200px)
  {
    .grid-container {
      margin-left: 60px;
      margin-right: 60px;
      display: grid;
      grid-template-columns: auto auto;
      background-color:white;
      padding: 10px;
    }
  }

    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    include 'db/conn.php';
    ?>
    <div class="grid-container"> <?php
    $sql = "SELECT * from products_table";
    $result = $conn->query($sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_array($result)) {
            ?>
        
            <div class="grid-item">
                <div class="image">
                    <img src="admin/images/<?= $row['img_url']; ?>" class="food_img">
                </div>
                <div  class="name_recipe">
                    <b><?php echo $row["name"];?></b><br>
                    <small><?php echo $row["description"];?></small><br>
                    <b><?php echo "Price: $" ,$row["price"];?></b><br>
                    <small><?php echo "Likes:" ,$row["n_likes"];?></small><br>
                    <a href="addtocart.php?id=<?= $row['p_id']; ?>"><button class="recipe">Add to Cart</button><br></a>
                    <a href="like.php?id=<?= $row['p_id']; ?>"><button class="recipe1" onclick="xxx">Like</button></a>
                </div>                    
            </div>
        
            <?php
        }
        ?>
        </div>
        <!-- button class="recipe" onclick=''>View Cart</button -->
        <?php
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
</body>
</html>
<?php
    require_once('views/page_bottom.php');
?>