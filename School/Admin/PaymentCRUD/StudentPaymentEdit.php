<?php
$con=mysqli_connect("localhost","root","","school_db");
date_default_timezone_set('Asia/Bangkok');
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
} else {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Escape variables for security
        $student_id = mysqli_real_escape_string($con, $_POST["student_id"]);
        $school_year = mysqli_real_escape_string($con, $_POST["school_year"]);
        $semester = mysqli_real_escape_string($con, $_POST["semester"]);
        $paid = mysqli_real_escape_string($con, $_POST["paid"]);
        $timestamp = date('Y-m-d H:i:s');

        // Perform the update query
        $sql = "UPDATE student_payments SET paid = '$paid', timestamp = '$timestamp'
        WHERE student_id = '$student_id' AND school_year = '$school_year' AND semester = '$semester';";

        if (!mysqli_query($con, $sql)) {
            die('Error: ' . mysqli_error($con));
        }
        echo "<script>alert('Success'); window.location.href = 'StudentPaymentCRUD.php';</script>";
    }
}

mysqli_close($con);
?>
