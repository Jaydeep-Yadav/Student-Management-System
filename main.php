<?php

session_start();
if( !$_SESSION['email']){
    $_SESSION['login_first'] = "Please login first"; 
    header('location:index.php');
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

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="sidebar.css">

    <!-- //!Button Logic -->
    <script>
        jQuery(document).ready(function($) {
            $('#toggler').click(function(event) {
                event.preventDefault();
                $('#wrap').toggleClass('toggled');

            });
        });
    </script>
</head>

<body>
    <div class="d-flex" id="wrap">
        <div class="sidebar bg-light border-light">

            <div class="sidebar-heading">
                <p class="text-center">Manage students</p>
            </div>

            <ul class="list-group list-group-flush">

                <a href="" class="list-group-item list-group-item-action">
                    <i class="fa fa-vcard-o"></i>Dashboard
                </a>

                <a href="add-teacher.php" class="list-group-item list-group-item-action">
                    <i class="fa fa-user"></i>Add Teacher Detail
                </a>

                <a href="view-teacher.php" class="list-group-item list-group-item-action">
                    <i class="fa fa-eye"></i>View Teacher Detail
                </a>

                <a href="edit-teacher.php" class="list-group-item list-group-item-action">
                    <i class="fa fa-search"></i>Search Teacher Detail
                </a>

                <a href="add-student.php" class="list-group-item list-group-item-action">
                    <i class="fa fa-user"></i>Add Student Detail
                </a>

                <a href="view-student.php" class="list-group-item list-group-item-action">
                    <i class="fa fa-eye"></i>View Student Detail
                </a>

                <a href="search-student.php" class="list-group-item list-group-item-action">
                    <i class="fa fa-search"></i>Search Student Detail
                </a>

                <a href="logout.php" class="list-group-item list-group-item-action">
                    <i class="fa fa-sign-out"></i>Logout
                </a>

            </ul>
        </div>

        <div class="main-body">

            <button class="btn btn-outline-light bg-danger mt-3" id="toggler">
                <i class="fa fa-bars"></i>
            </button>

            <section id="main-form">
                <h2 class="text-center text-danger pt-3 font-weight-bold">Student Management System</h2>

                <div class="container bg-danger" id="formsetting">

                    <h3 class="text-center text-white pb-4 pt-2 font-weight-bold">
                        Welcome to Dashboard
                    </h3>

                    <div class="row">

                        <div class="col-md-4 col-sm-4 col-12 m-auto icon">
                            <a href="add-student.php" class="text-white text-center">
                                <i class="fa fa-user"></i>
                                <h3>Add Student Detail</h3>
                            </a>
                        </div>

                        <div class="col-md-4 col-sm-4 col-12 m-auto icon">
                            <a href="view-student.php" class="text-white text-center">
                                <i class="fa fa-eye"></i>
                                <h3>View Student Detail</h3>
                            </a>
                        </div>

                        <div class="col-md-4 col-sm-4 col-12 m-auto icon">
                            <a href="search-student.php" class="text-white text-center">
                                <i class="fa fa-search"></i>
                                <h3>Search Student Detail</h3>
                            </a>
                        </div>

                    </div>

                    <hr>

                    <div class="row">

                        <div class="col-md-4 col-sm-4 col-12 m-auto icon">
                            <a href="add-teacher.php" class="text-white text-center">
                                <i class="fa fa-user"></i>
                                <h3>Add Teacher Detail</h3>
                            </a>
                        </div>

                        <div class="col-md-4 col-sm-4 col-12 m-auto icon">
                            <a href="view-teacher.php" class="text-white text-center">
                                <i class="fa fa-eye"></i>
                                <h3>View Teacher Detail</h3>
                            </a>
                        </div>

                        <div class="col-md-4 col-sm-4 col-12 m-auto icon">
                            <a href="search-teacher.php" class="text-white text-center">
                                <i class="fa fa-search"></i>
                                <h3>Search Teacher Detail</h3>
                            </a>
                        </div>

                    </div>

                </div>
        </div>
        </section>
    </div>
    </div>
</body>

</html>