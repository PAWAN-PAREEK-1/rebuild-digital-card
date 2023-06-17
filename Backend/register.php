<?php
include "config.php";

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];

    $duplicate = mysqli_prepare($conn, "SELECT * FROM user WHERE name=? OR email=?");
    mysqli_stmt_bind_param($duplicate, "ss", $name, $email);
    mysqli_stmt_execute($duplicate);
    $result = mysqli_stmt_get_result($duplicate);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Email is already registered');</script>";
    } else {
        if ($password == $confirmpassword) {
            $query = "INSERT INTO user VALUES ('', ?, ?, ?)";
            $insert = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($insert, "sss", $name, $email, $password);
            mysqli_stmt_execute($insert);
            echo "<script>alert('Registration Successful');</script>";
        } else {
            echo "<script>alert('Password does not match');</script>";
        }
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

    <title>Registration Form</title>
</head>

<body>
    <div class="container">
        <div class="forms">
            <!-- Registration Form -->
            <div class="form signup">
                <form method="POST">
                    <span class="title">Registration</span>
                    <div class="input-field">
                        <input type="text" placeholder="Enter your name" name="name" id="name" required>
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Enter your email" name="email" id="email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" name="password" id="password" placeholder="Create a password" required>
                        <i class="uil uil-lock icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm a password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="termCon">
                            <label for="termCon" class="text">I accept all terms and conditions</label>
                        </div>
                    </div>

                    <div class="input-field button">
                        <input type="submit" name="submit" value="Sign Up">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Already a member?
                        <a href="login.php" class="text login-link">Login Now</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <style></style>

    <script src="../Javascript/register.js"></script>
</body>

</html>
