<?php
include 'dbconnect.php'
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

    <link rel="stylesheet" href="view-student.css">

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
                    <i class="fa fa-pencil"></i>Edit Teacher Detail
                </a>

                <a href="add-student.php" class="list-group-item list-group-item-action">
                    <i class="fa fa-user"></i>Add Student Detail
                </a>

                <a href="view-student.php" class="list-group-item list-group-item-action">
                    <i class="fa fa-eye"></i>View Student Detail
                </a>

                <a href="edit-student.php" class="list-group-item list-group-item-action">
                    <i class="fa fa-pencil"></i>Edit Student Detail
                </a>

                <a href="" class="list-group-item list-group-item-action">
                    <i class="fa fa-sign-out"></i>Logout
                </a>

            </ul>
        </div>

        <div class="main-body">

            <button class="btn btn-outline-light bg-danger mt-3" id="toggler">
                <i class="fa fa-bars"></i>
            </button>

            <section id="main-form">
                <h3 class="text-center text-success font-weight-bold"><?php echo @$_GET['update_success'];echo @$_GET['delete_success']; ?></h3>
                <h3 class="text-center text-danger font-weight-bold"><?php echo @$_GET['update_error']; ?></h3>
                <h2 class="text-center text-danger pt-3 font-weight-bold">Student Management System</h2>

                <div class="container bg-danger" id="formsetting">

                    <h3 class="text-center text-white pb-4 pt-2 font-weight-bold">
                        View Student Detail
                    </h3>

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
                                $sql = "SELECT * FROM student_detail";
                                $run = mysqli_query($conn, $sql);

                                $i = 1; //! For serial number
                                while ($row = mysqli_fetch_assoc($run)) {

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
                                            <a style="color:white; text-decoration:none" href="delete-student-detail.php?delete_student=<?php echo $row['id']; ?>">Delete</a>
                                            </td>

                                        </tr>
                                    </tbody>

                                <?php } ?>
                            </table>
                        </div>
                    </div>


                </div>
        </div>
        </section>
    </div>
    </div>
</body>

</html>