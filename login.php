<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
</head>
<body>
    <h1>User Login</h1>

    <form method = "POST">

        <table>
            <tbody>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>    
                    <td>Password</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>    
                    <td colspan="2" align="center"><input type="submit" name="login" value="Login"></td>
                </tr>
                
            </tbody>
        </table>

    </form>

    <?php

        include_once "connection.php";

        if(isset($_POST['login'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];

            $query = "SELECT * FROM `employee` WHERE `username` = '$username' && `password` = '$password'";
            $run = mysqli_query($conn,$query);

            if($run) {
                $row = mysqli_num_rows($run);

                if($row == 1) {
                    $_SESSION['user'] = $username; 
                    header('location:home.php');
                } else {
                    ?><script>alert("Username and password are not exist !!")</script><?php
                }
            }

        }

    ?>
</body>
</html>