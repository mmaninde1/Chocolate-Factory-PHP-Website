        <?php

            $mysqli = new mysqli("localhost", "root", "", "sitebuild");
            //var_dump($mysqli->connect_errno);

            if ($mysqli->connect_errno) {
                echo "Failled to connect to MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }
       