<?php
if(isset($_GET['student_id']))
{
    $con=mysqli_connect("localhost","root","","school_db");
    // Check connection
    if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $student_id = $_GET["student_id"];
    $sql = "DELETE FROM students WHERE student_id = $student_id;";
    $con->query($sql);
}

header("location:StudentCRUD.php");
exit;
?>