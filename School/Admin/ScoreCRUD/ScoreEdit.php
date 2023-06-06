<?php
$con=mysqli_connect("localhost","root","","school_db");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
} else {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Escape variables for security
    $student_id = mysqli_real_escape_string($con, $_POST["student_id"]);
    $subject_id = mysqli_real_escape_string($con, $_POST["subject_id"]);
    $school_year = mysqli_real_escape_string($con, $_POST["school_year"]);
    $semester = mysqli_real_escape_string($con, $_POST["semester"]);
    $score = mysqli_real_escape_string($con, $_POST["score"]);

    // Perform the update query
    $sql = "UPDATE student_subjects SET score = '$score'
    WHERE student_id = '$student_id' AND subject_id = '$subject_id' AND school_year = '$school_year' AND semester = '$semester';";

    if (!mysqli_query($con,$sql)) {
        die('Error: ' . mysqli_error($con));
    }
    echo "<script>alert('Success'); window.location.href = 'ScoreCRUD.php';</script>";
}   
}

mysqli_close($con);
?>

<form name="inpfrm" method="post" action="ScoreCRUD.php">
<table border='0' align='center' class='table table-hover'>
<tr>
    <input name="reset" type="submit" id="Back" value="Back"/></td>
</tr>
</table>