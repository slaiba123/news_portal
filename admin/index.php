<?php
session_start();
include('includes/config.php');

$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['login'])) {
    $uname = $_POST['username'];
    $password = $_POST['password']; // Do not hash here, as it will be handled differently for admin and user

    // Fetch data from database on the basis of username/email and password for admin
    $sql = $conn->prepare("SELECT AdminUserName, AdminEmailId, AdminPassword, userType FROM tbladmin WHERE AdminUserName=?");
    $sql->bind_param("s", $uname);
    $sql->execute();
    $result = $sql->get_result();
    $num = $result->fetch_assoc();

    if ($num) {
        // Verify the admin password (hashed with MD5)
        if ($num['AdminPassword'] === md5($password)) {

            $_SESSION['login'] = $num['AdminUserName'];
            $_SESSION['utype'] = $num['userType'];
            echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
            exit;
        } else {
            echo "<script>alert('Invalid Admin Username or Password');</script>";
        }
    } else {
        // Check if the user is a normal user
        $sql_user = mysqli_query($con,"SELECT fullName, password,userId FROM tblusers WHERE fullName='$uname' and password='$password'");
        // $sql_user->bind_param("s", $uname);
        // $sql_user->execute();
        // $result_user = $sql_user->get_result();
        $num=mysqli_fetch_array($sql_user);
        
        if ($num> 0) {
            $row_user = $result_user->fetch_assoc();
            // Verify the user password (hashed with password_hash)
            if (password_verify($password, $num['password'])) {
                $_SESSION['login'] = $num['fullName'];
                $_SESSION['user_id'] = $num['userID'];
                $_SESSION['user_logged_in'] = true;
                header("Location: ../Home.php");
                
                exit;
            } else {
                echo "<script>alert('Invalid User Username or Password');</script>";
                echo "<script>alert('Please Signup First');</script>";
                header("Location: signup.php");
                exit;
            }
        } else {
            // Neither admin nor user found
            echo "<script>alert('Invalid Username or Password');</script>";
            header("Location: signup.php");
            exit;
        }
        $sql_user->close();
    }
    $sql->close();
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="News Portal.">
    <meta name="author" content="PHPGurukul">
    <link rel="stylesheet" href="signup.css">

    <!-- App title -->
    <title>News Portal | Admin Panel</title>

    <!-- App css -->
    <link rel="stylesheet" href="styles.css">

    <script src="assets/js/modernizr.min.js"></script>
</head>
<body>
<div class="login-container">
    <div class="login-form">
        <div class="wrapper-page">
            <div class="account-pages">
                <div class="account-content">
                    <h1>LOGIN</h1>
                    <form class="form-horizontal" method="post">
                        <div class="options">
                            <p>LOGIN</p>
                            <a href="signup.php">SIGN UP</a>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" required name="username" placeholder="Username or email" autocomplete="off">
                        </div>
                        <a href="forgot-password.php"><i class="mdi mdi-lock"></i> Forgot your password?</a>

                        <div class="form-group">
                            <input class="form-control" type="password" name="password" required placeholder="Password" autocomplete="off">
                        </div>
                        <div class="form-group account-btn text-center m-t-10">
                            <button class="btn w-md btn-bordered btn-danger waves-effect waves-light" type="submit" name="login">Log In</button>
                        </div>
                    </form>
                    <div class="clearfix"></div>
                    <a href="../Home.php"> Back Home</a>
                </div>
            </div>
        </div>
    </div>
    <div class="login-image">
        <img src="../images/main_pic.png" alt="" height="100%" width="100%">
    </div>
</div>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/detect.js"></script>
<script src="assets/js/fastclick.js"></script>
<script src="assets/js/jquery.blockUI.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>
</body>
</html>