<?php
session_start();
include 'config.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']) ? true : false;

    $result = mysqli_query($conn, "SELECT * FROM user WHERE email='$email'");
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        if ($password == $row['password']) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row['id'];

            if ($remember) {
                // Set cookies for email and password
                setcookie('email', $email, time() + (86400 * 1), '/');  // Expires in 30 days
                setcookie('password', $password, time() + (86400 * 1), '/');  // Expires in 30 days
            }

            header("Location: ../FrontEnd/tamplate.php");
            exit();
        } else {
            echo "<script>alert('Wrong password');</script>";
        }
    } else {
        echo "<script>alert('Email not found. Please register.');</script>";
    }
}
?>


<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="../Css/register.css">

    <title>Login Form</title>
</head>
<body>

    <div class="container">

        <div class="forms">
            <!-- Login Form -->
            <div class="form login">
                <span class="title">Login</span>

                <form action="" method="POST">
                    <div class="input-field">
                        <input type="text" placeholder="Enter your email" name="email" id="email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Enter your password"  name="password" id="password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember" class="text">Remember me</label>
                        </div>

                        <a href="#" class="text">Forgot password?</a>
                    </div>

                    <div class="input-field button">
                        <input type="submit" name="submit" value="Login">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Not a member?
                        <a href="register.php" class="text signup-link">Signup Now</a>
                    </span>
                </div>
            </div>
        </div>

    </div>
    <style></style>

    <script src="../Javascript/register.js"></script>
</body>
</html>
