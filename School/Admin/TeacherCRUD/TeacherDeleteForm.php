<?php
if(isset($_GET['teacher_id']))
{
    $con=mysqli_connect("localhost","root","","school_db");
    // Check connection
    if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $teacher_id = $_GET["teacher_id"];
    $sql = "DELETE FROM teachers WHERE teacher_id = $teacher_id;";
    $con->query($sql);
}

header("location:teacherCRUD.php");
exit;
?>