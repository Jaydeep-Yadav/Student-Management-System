<?php
session_start();

include 'dbconnect.php';

// !Variable declaration 

$email_err = $pwd_err = $success = $error = '';

if (isset($_POST['registersubmit'])) {

    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

    //!Check if email already exists and password confirmation
    $query = "SELECT * from register WHERE email = '$email' ";
    $run = mysqli_query($conn, $query);
    $row = mysqli_num_rows($run);

    if ($row > 0) {
        $email_err = "Email already exists";
    } else if ($password != $cpassword) {
        $pwd_err = "Password do not match";
    } else {
        $sql = "INSERT INTO register(fname,email,password,cpassword) VALUES('$fname','$email','$pass','$cpass')";
        $run = mysqli_query($conn, $sql);

        if ($run) {
            $success = "Registered Successfully";
        } else {
            $error = "Unable to submit data.Please try again";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="style.css">

    <!-- //!Button Logic -->
    <script src="./script.js"></script>

</head>

<body>
    <section>

        <h3 class="text-center text-danger font-weight-bold"><?php echo @$_SESSION['login_first']; ?></h3>

        <h2 class="text-center text-danger pt-5 pb-4 font-weight-bold">Student Management System</h2>

        <h5 class="text-center font-weight-bold text-danger"><?php echo @$_GET['error']; ?></h5>

        <!-- //! Container starts here -->
        <div class="container bg-danger formsetting">

            <h3 class="text-white text-center py-3">Admin Login | Register Panel</h3>


            <div class="row">
                <!-- //! Row starts here -->

                <!-- //! Left Side -->
                <div class="col-md-7 col-sm-7 col-l2">
                    <img src="./images/image1.jpg" class="img-fluid" alt="">
                </div>

                <!-- //!Right Side -->
                <div class="col-md-5 col-sm-5 col-l2">

                    <div class="text-center">

                        <button class="btn btn-info px-5 mx-2" onclick="register()">
                            Register
                        </button>

                        <button class="btn btn-info px-5 mx-2" onclick="login()">
                            Login

                        </button>

                    </div>


                    <!-- //!Register Div -->
                    <div id="registerDiv" style="display: block">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="fname" class="text-white">Full name</label>
                                <input placeholder="Enter your name" class="form-control" type="text" name="fname" required="required">
                            </div>

                            <div class="form-group">
                                <label for="email" class="text-white">E mail</label>
                                <span class="float-right text-white font-weight-bold"><?php echo $email_err; ?></span>
                                <input placeholder="Enter your email" class="form-control" type="email" name="email" required="required">
                            </div>

                            <div class="form-group">
                                <label for="password" class="text-white">Password</label>
                                <input placeholder="Enter your password" class="form-control" type="password" name="password" required="required" minlength="4">
                            </div>

                            <div class="form-group">
                                <label for="cpassword" class="text-white">Confirm Password</label>
                                <span class="float-right text-white font-weight-bold"><?php echo $pwd_err; ?></span>
                                <input placeholder="Re-enter your password" class="form-control" type="password" name="cpassword" required="required" minlength="4">
                            </div>

                            <div class="text-center">
                                <span class="float-right text-white font-weight-bold"><?php echo $success;
                                                                                        echo $error; ?></span>
                                <input type="submit" name="registersubmit" value="Register" class="btn btn-info px-5">
                            </div>
                        </form>
                    </div>


                    <!-- //!Login Div -->
                    <div id="loginDiv" style="display: none">
                        <form action="" method="post">

                            <div class="form-group">
                                <label for="email" class="text-white">E mail</label>
                                <input placeholder="Enter your email" class="form-control" type="email" name="email" required="required">
                            </div>

                            <div class="form-group">
                                <label for="password" class="text-white">Password</label>
                                <input placeholder="Enter your password" class="form-control" type="password" name="password" required="required" minlength="4">
                            </div>

                            <div class="text-center">
                                <input type="submit" name="loginsubmit" value="Login" class="btn btn-info px-5">
                            </div>

                        </form>
                    </div>
                </div>

            </div> <!-- //! Row ends here -->

        </div>
        <!-- //! Container ends here -->


    </section>
</body>

</html>


<?php

$_SESSION['email'] = null;

if (isset($_POST['loginsubmit'])) {

    $email = $_SESSION['email'] = $_POST['email'];
    $pwd = $_POST['password'];

    $sql = "SELECT * from register WHERE email = '$email' ";
    $run = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($run);

    $pwd_fetch = $row['password'];
    $pwd_decode = password_verify($pwd, $pwd_fetch);

    if ($pwd_decode) {
        echo "<script>window.open('main.php', '_self')</script>";
    } else {
        echo "<script>window.open('index.php?error= Username or password is incorrect', '_self')</script>";
    }
}

//! For auto Login
if ($_SESSION['email']) {
    header('location:main.php');
}


?>