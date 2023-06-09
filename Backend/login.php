<?php

session_start();

// Check login status
if (isset($_SESSION['email'])) {
    header('Location:../FrontEnd/index.php');
    exit;
}

require_once 'config.php';
$email = $password = "";
$err = "";
$email_err = $password_err = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty(trim($_POST['email'])) || empty(trim($_POST['password']))) {
        $err = "Please enter a email and password";
    }
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);


    if (empty($err)) {
        $sql = "SELECT id, email, password FROM users WHERE email = ?";
        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "s", $param_email);
        $param_email = $email;

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password);
                if (mysqli_stmt_fetch($stmt)) {
                    $password = $hashed_password;
                    if (password_verify($password, $hashed_password)) {
                        // If password is correct
                        session_start();
                        $_SESSION["email"] = $email;
                        $_SESSION["id"] = $id;
                        $_SESSION["loggedin"] = true;

                        header("Location:../FrontEnd/index.php");
                    }
                }
            }
        }
    }
}

?>
<link rel="stylesheet" href="../Css/register.css">
<div class="form login">
    <span class="title">Login</span>

    <form action="" method="post">
        <div class="input-field">
            <input type="text" name="email" placeholder="Enter your email" required>
            <i class="uil uil-envelope icon"></i>
        </div>
        <div class="input-field">
            <input type="password" name="password" class="password" placeholder="Enter your password" required>
            <i class="uil uil-lock icon"></i>
            <i class="uil uil-eye-slash showHidePw"></i>
        </div>

        <div class="checkbox-text">
            <div class="checkbox-content">
                <input type="checkbox" id="logCheck">
                <label for="logCheck" class="text">Remember me</label>
            </div>

            <a href="#" class="text">Forgot password?</a>
        </div>

        <div class="input-field button">
            <input type="submit" value="Login">
        </div>
    </form>

    <div class="login-signup">
        <span class="text">Not a member?
            <a href="register.php" class="text signup-link">Signup Now</a>
        </span>
    </div>
</div>