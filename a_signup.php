<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login V13</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>

<body style="background-color: #999999;">
    <form action="" method="POST">
        <input type="hidden" name="hide" value="h">
        <div class="limiter">
            <div class="container-login100">
                <div class="login100-more" style="background-image: url('images/bg-0111.jpg');"></div>

                <div class="wrap-login100 p-l-50 p-r-50 p-t-21 p-b-50">
                    <span class="login100-form-title p-b-59">
                        Sign Up
                    </span>
                    <div class="wrap-input100 validate-input" data-validate="Username is required">
                        <span class="label-input100">Username</span>
                        <input class="input100" type="text" name="username" placeholder="Username..." required>
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Email is required">
                        <span class="label-input100">Email</span>
                        <input class="input100" type="email" name="user_email" placeholder="Email..." required>
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="user_password" placeholder="*************" required>
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Confirm Password is required">
                        <span class="label-input100">Confirm Password</span>
                        <input class="input100" type="password" name="confirm_password" placeholder="*************" required>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" name="submit">Sign Up</button>
                        </div>
                        <a href="login.php" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
                            Sign in
                            <i class="fa fa-long-arrow-right m-l-5"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>

</html>

<?php
include('connection.php');

if (isset($_POST['hide']) && ($_POST['hide'] == 'h')) {
    // Get user IP address
    $ip = $_SERVER['REMOTE_ADDR'];

    $a = $_POST['username'];
    $b = $_POST['user_email'];
    $plainPassword = $_POST['user_password'];
    $confirmPassword = $_POST['confirm_password'];

    // Check if passwords match
    if ($plainPassword !== $confirmPassword) {
        echo "Passwords do not match!";
    } else {
        // Hash the password using Argon2i
        $hashedPassword = password_hash($plainPassword, PASSWORD_ARGON2I);

        $q = "INSERT INTO `admin_table`(`admin_name`, `admin_email`, `admin_password`, `ip`) VALUES ('$a', '$b', '$hashedPassword', '$ip')";
        $i = mysqli_query($con, $q);

        if ($i) {
            // Redirect to login.php using JavaScript
            echo "<script>window.open('alogin.php','_self')</script>";
           // header("Location: login.php");
        } else {
            echo "NOT SUCCESSFUL";
        }
    }
}
?>
