<?php
$con=mysqli_connect("localhost","root","","school_db");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
} else {
    // Escape variables for security
    $teacher_id1 = mysqli_real_escape_string($con, $_POST['teacher_id1']);
    $teacher_id2 = mysqli_real_escape_string($con, $_POST['teacher_id2']);
    $school_year = mysqli_real_escape_string($con, $_POST['school_year']);
    $teacher_classroom = mysqli_real_escape_string($con, $_POST['teacher_classroom']);

    // Insert data into teacher_classrooms table
    $sql1 = "INSERT INTO teacher_classrooms (teacher_id, school_year, teacher_classroom) VALUES ('$teacher_id1', '$school_year', '$teacher_classroom')";
    $sql2 = "INSERT INTO teacher_classrooms (teacher_id, school_year, teacher_classroom) VALUES ('$teacher_id2', '$school_year', '$teacher_classroom')";

    if (!mysqli_query($con, $sql1) || !mysqli_query($con, $sql2)) {
        die('Error: ' . mysqli_error($con));
    }
    echo "<script>alert('Success'); window.location.href = 'TeacherCRUD.php';</script>";;
}

mysqli_close($con);
?>
