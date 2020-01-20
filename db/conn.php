<<<<<<< HEAD
        <?php

            $mysqli = new mysqli("localhost", "root", "", "sitebuild");
            //var_dump($mysqli->connect_errno);

            if ($mysqli->connect_errno) {
                echo "Failled to connect to MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }
       
=======
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Connection</title> 
    </head>
    <body>
        <header>
            <h1> Code of connection to databases</h1>
            
            <div></div>
        </header>
        </body>
</html>
>>>>>>> 54f409391309e5a8cfe1b329ca84566e6b75f409
