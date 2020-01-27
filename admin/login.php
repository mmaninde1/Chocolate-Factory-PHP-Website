<?php
require_once('conn.php');
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/signin.css">
    <title>Admin Page</title>
</head>

<body>
    <div class="container">
        <h2 class="text-center">Admin Dashboard</h2>
        <form action="" method="POST" name="Login_Form" class="form-signin">
            <h3 class="form-signin-heading">Please sign in</h3>
            <label for="inputUsername" class="sr-only">Username</label>
            <input name="Username" type="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input name="Password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button name="Submit" value="Login" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

            <?php

            /* Check if login form has been submitted */
            if (isset($_POST['Submit'])) {

                if ($_POST['Password'] == '' || $_POST['Username'] == '') { ?>
                    &nbsp;
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Warning!</strong> Email id and Password is required.
                    </div><?php
                        } else {
                            /* extract email and password from database */
                            $sql = "SELECT * from admin_user";
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();

                            if (md5($_POST['Password']) == $row['password'])
                                $result = true;
                            else
                                $result = false;

                            /* Check if form's username and password matches */
                            if (($_POST['Username'] == $row['email']) && ($result === true)) {

                                /* Success: Set session variables and redirect to protected page */
                                $_SESSION['Username'] = $row['email'];

                                $_SESSION['id'] = true;
                                header("location:index.php");
                                exit;
                            } else {
                            ?>
                        <!-- Show an error alert -->
                        &nbsp;
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Warning!</strong> Incorrect information.
                        </div>
            <?php
                            }
                        }
                    }
            ?>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>