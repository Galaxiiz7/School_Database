<?php
if(isset($_GET['student_id']))
{
    $con=mysqli_connect("localhost","root","","school_db");
    // Check connection
    if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $student_id = $_GET["student_id"];
    $school_year = $_GET["school_year"];
    $semester = $_GET["semester"];

    $sql = "DELETE FROM student_payments WHERE student_id = $student_id AND school_year = $school_year AND semester = $semester;";
    $con->query($sql);
}

header("location:StudentPaymentCRUD.php");
exit;
?>