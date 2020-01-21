<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <input type="email" name="email" placeholder="Enter your email id"/><br>
        <input type="password" name="password" placeholder="Enter your password"/><br>
        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>


<?php
include 'db/conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login']))
{
    if (empty($_POST['email']) || empty($_POST['password'])) {
        echo "All Fields are required and cannot be empty!";
    } 
    else 
    {
        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $email = test_input($_POST['email']);
        $password = test_input($_POST['password']);

        $sql = "SELECT * from admin_user";
        $result = $conn->query($sql);

    if (mysqli_num_rows($result) > 0) {
        $row = $result->fetch_assoc();
        if($email == $row['email'])
        {
            if(md5($password) == $row['password'])
            {
                echo 'Login successful';
                session_start();
                $_SESSION['id'] = $row['admin_id'];
                echo $_SESSION['id'];
            }
            else
            {
                echo 'Invalid Password';
            }
        }
        else
        {
            echo 'Invalid email id';
        }
    }
    else {
        echo "There is not admin user exists in database";
    }

    }
}

?>