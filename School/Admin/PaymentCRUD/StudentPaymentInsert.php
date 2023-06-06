<?php
$con = mysqli_connect("localhost", "root", "", "school_db");
date_default_timezone_set('Asia/Bangkok');
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
} else {
    // Escape variables for security
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);
    $school_year = mysqli_real_escape_string($con, $_POST['school_year']);
    $semester = mysqli_real_escape_string($con, $_POST['semester']);
    $paid = mysqli_real_escape_string($con, $_POST['paid']);
    $timestamp = date('Y-m-d H:i:s');

    $sql = "INSERT INTO student_payments (student_id, school_year, semester, paid, timestamp)
    VALUES ('$student_id', '$school_year', '$semester', '$paid', '$timestamp')";

    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    }

    echo "<script>alert('Success'); window.location.href = 'StudentPaymentCRUD.php';</script>";
}

mysqli_close($con);
?>
