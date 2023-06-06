<?php
$con=mysqli_connect("localhost","root","","school_db");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
} else {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!empty($_GET['student_id'])) {
            $oldstudent_id = $_GET['student_id'];
        } else {
            // Handle the case when oldstudent_id is not provided
            // Redirect or show an error message
            header("location: StudentCRUD.php");
            exit;
        }
    }
    // Escape variables for security
    $student_id = mysqli_real_escape_string($con, $_POST["student_id"]);
    $student_fname = mysqli_real_escape_string($con, $_POST["student_fname"]);
    $student_lname = mysqli_real_escape_string($con, $_POST["student_lname"]);
    $student_gender = mysqli_real_escape_string($con, $_POST["student_gender"]);
    $student_birthdate = mysqli_real_escape_string($con, $_POST["student_birthdate"]);
    $student_telnumber = mysqli_real_escape_string($con, $_POST["student_telnumber"]);
    $student_email = mysqli_real_escape_string($con, $_POST["student_email"]);
    $student_address = mysqli_real_escape_string($con, $_POST["student_address"]);
    $student_province = mysqli_real_escape_string($con, $_POST["Ref_prov_id"]);
    $student_amphur = mysqli_real_escape_string($con, $_POST["Ref_dist_id"]);
    $student_district = mysqli_real_escape_string($con, $_POST["Ref_subdist_id"]);
    $student_zipcode = mysqli_real_escape_string($con, $_POST["zip_code"]);
    $student_since = mysqli_real_escape_string($con, $_POST["student_since"]);
    $student_status = mysqli_real_escape_string($con, $_POST["student_status"]);

    // Perform the update query
    $sql = "UPDATE students SET student_id='$student_id', student_fname='$student_fname', student_lname='$student_lname',
    student_gender='$student_gender', student_birthdate='$student_birthdate', student_telnumber='$student_telnumber',
    student_email='$student_email', student_address='$student_address', student_province='$student_province',
    student_amphur='$student_amphur', student_district='$student_district', student_zipcode='$student_zipcode',
    student_since='$student_since', student_status='$student_status'
    WHERE student_id = $oldstudent_id";

    if (!mysqli_query($con,$sql)) {
        die('Error: ' . mysqli_error($con));
    }
    echo "<script>alert('Success'); window.location.href = 'StudentCRUD.php';</script>";
}

mysqli_close($con);
?>

<form name="inpfrm" method="post" action="StudentCRUD.php">
<table border='0' align='center' class='table table-hover'>
<tr>
    <input name="reset" type="submit" id="Back" value="Back"/></td>
</tr>
</table>
