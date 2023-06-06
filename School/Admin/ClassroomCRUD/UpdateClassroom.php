<?php
$con = mysqli_connect("localhost", "root", "", "school_db");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $old_classroom = mysqli_real_escape_string($con,$_POST['old_classroom']);
    $old_school_year = mysqli_real_escape_string($con,$_POST['old_school_year']);

    $update_classroom = mysqli_real_escape_string($con,$_POST['update_classroom']);
    $update_school_year = mysqli_real_escape_string($con,$_POST['update_school_year']);

    // Insert new classroom
    $insert_query = "INSERT INTO student_classrooms (student_id, school_year, student_classroom) 
    SELECT student_id, '$update_school_year', '$update_classroom' 
    FROM student_classrooms 
    WHERE school_year = '$old_school_year' AND student_classroom = '$old_classroom'";
    
    if (mysqli_query($con, $insert_query)) {
        echo "<script>alert('Success'); window.location.href = '../MainPage.php';</script>"; ;
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
mysqli_close($con);
?>

<form name="inpfrm" method="post" action="StudentCRUD.php">
<table border='0' align='center' class='table table-hover'>
<tr>
    <input name="reset" type="submit" id="Back" value="Back"/></td>
</tr>
</table>
