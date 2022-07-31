<?php

session_start();
if (!$_SESSION['email']) {
    $_SESSION['login_first'] = "Please login first";
    header('location:index.php');
}

include 'dbconnect.php';
$studentName = '';

if (isset($_POST['search'])) {
    $studentName = mysqli_real_escape_string($conn, $_POST['studentName']);
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

                <a href="main.php" class="list-group-item list-group-item-action">
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
            <h3 class="text-center text-success font-weight-bold"><?php echo @$_GET['delete_success']; ?></h3>
                <h2 class="text-center text-danger pt-3 font-weight-bold">Student Management System</h2>

                <div class="container bg-danger" id="formsetting">

                    <h3 class="text-center text-white pb-4 pt-2 font-weight-bold">
                        Search Students
                    </h3>

                    <form method="POST" action="">

                        <div class="input-group">
                            <input type="text" class="form-control" name="studentName" placeholder="Search for...">
                            <span class="input-group-btn">
                                <input class="btn btn-search" name="search" type="submit" value="Search"><i class="fa fa-search fa-fw"></i></input>
                            </span>
                        </div>

                    </form>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-12">
                            <table class="table table-bordered text-white table-responsive">
                                <thead>
                                    <tr>
                                        <th>S no.</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Father name</th>
                                        <th>Gender</th>
                                        <th>Email</th>
                                        <th>Birthdate</th>
                                        <th>Mobile</th>
                                        <th>City</th>
                                        <th>District</th>
                                        <th>State</th>
                                        <th>Nationality</th>
                                        <th>Photo</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <?php
                                
                                // if($studentName==''){
                                //     die('<h3 class="text-center text-sucess bg-success text-white font-weight-bold">Search for Students</h3>');
                                // }

                                $sql = "SELECT * FROM student_detail WHERE fname LIKE '%$studentName%' OR lname LIKE '%$studentName%'";
                                $run = mysqli_query($conn, $sql);

                                $usersFoundFlag = true;

                                $i = 1; //! For serial number
                                while ($row = mysqli_fetch_assoc($run)) {
                                    $usersFoundFlag= false;
                                ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $row['fname'] ?></td>
                                            <td><?php echo $row['lname'] ?></td>
                                            <td><?php echo $row['fathername'] ?></td>
                                            <td><?php echo $row['gender'] ?></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td><?php echo $row['birthdate'] ?></td>
                                            <td><?php echo $row['mobile'] ?></td>
                                            <td><?php echo $row['city'] ?></td>
                                            <td><?php echo $row['district'] ?></td>
                                            <td><?php echo $row['state'] ?></td>
                                            <td><?php echo $row['nation'] ?></td>
                                            <td><a href="student_images/<?php echo $row['photo']; ?>">
                                                    <img src="student_images/<?php echo $row['photo']; ?>" width="50" height="60">
                                                </a></td>
                                            <td>
                                                <a style="color:white; text-decoration:none" href="edit-student-detail.php?edit_student=<?php echo $row['id']; ?>">Edit</a> |
                                                <a style="color:white; text-decoration:none" href="delete-student-detail.php?delete_student=<?php echo $row['id'].'&page='.basename(__FILE__); ?>">Delete</a>
                                            </td>

                                        </tr>
                                    </tbody>

                                <?php 
                                } 

                                ?>

                                
                            </table>

                            <?php 
                            if($usersFoundFlag){
                                die('<h3 class="text-center text-sucess bg-success text-white font-weight-bold">No Students Found</h3>');
                            }
                        ?>
                        </div>
                    </div>



                </div>
        </div>
        </section>
    </div>
    </div>
</body>

</html>