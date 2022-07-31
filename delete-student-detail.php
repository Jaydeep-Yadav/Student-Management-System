<?php

session_start();

if (!$_SESSION['email']) {
    $_SESSION['login_first'] = "Please login first";
    header('location:index.php');
}

include 'dbconnect.php';

if (isset($_GET['delete_student'])) {

    $deleteId = $_GET['delete_student'];
    $pageUrl = $_GET['page'];
    
    //! To delete image
    $image_query = " SELECT * FROM student_detail WHERE id = '$deleteId' ";
    $rs = mysqli_query($conn, $image_query);
    while ($row = mysqli_fetch_assoc($rs)) {
        $image = $row['photo'];
    }

    unlink('student_images/' . $image);

    //! To delete record
    $sql = "DELETE FROM student_detail WHERE id = '$deleteId' ";
    $run = mysqli_query($conn, $sql);

    if ($run) 
    {     if($pageUrl == 'view-student.php')
       echo "<script>window.open('view-student.php?delete_success=Student data deleted successfully','_self')</script>";
       else if($pageUrl == 'search-student.php') echo "<script>window.open('search-student.php?delete_success=Student data deleted successfully','_self')</script>";
        
    }
}
