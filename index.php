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
        <h2 class="text-center text-danger pt-5 pb-4 font-weight-bold">Student Management System</h2>

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

                    <div id="registerDiv" style="display: block">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="fname" class="text-white">Full name</label>
                                <input placeholder="Enter your name" class="form-control" type="text" name="fname">
                            </div>

                            <div class="form-group">
                                <label for="email" class="text-white">E mail</label>
                                <input placeholder="Enter your email" class="form-control" type="email" name="email">
                            </div>

                            <div class="form-group">
                                <label for="password" class="text-white">Password</label>
                                <input placeholder="Enter your password" class="form-control" type="password" name="password">
                            </div>

                            <div class="form-group">
                                <label for="cpassword" class="text-white">Confirm Password</label>
                                <input placeholder="Re-enter your password" class="form-control" type="password" name="cpassword">
                            </div>

                            <div class="text-center">
                                <input type="submit" name="submit" value="Register" class="btn btn-info px-5">
                            </div>
                        </form>
                    </div>

                    <div id="loginDiv" style="display: none">
                        <form action="" method="post">

                            <div class="form-group">
                                <label for="email" class="text-white">E mail</label>
                                <input placeholder="Enter your email" class="form-control" type="email" name="email">
                            </div>

                            <div class="form-group">
                                <label for="password" class="text-white">Password</label>
                                <input placeholder="Enter your password" class="form-control" type="password" name="password">
                            </div>

                            <div class="text-center">
                                <input type="submit" name="submit" value="Login" class="btn btn-info px-5">
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