<?php
$con=mysqli_connect("localhost","root","","school_db");
// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else{
	//esc//ape variables for security
	$teacher_id = mysqli_real_escape_string($con, $_POST['teacher_id']);
	$teacher_fname = mysqli_real_escape_string($con, $_POST['teacher_fname']);
	$teacher_lname = mysqli_real_escape_string($con, $_POST['teacher_lname']);
	$teacher_gender = mysqli_real_escape_string($con, $_POST['teacher_gender']);
    $teacher_birthdate = mysqli_real_escape_string($con, $_POST['teacher_birthdate']);
    $teacher_telnumber = mysqli_real_escape_string($con, $_POST['teacher_telnumber']);
    $teacher_email = mysqli_real_escape_string($con, $_POST['teacher_email']);
    $teacher_address = mysqli_real_escape_string($con, $_POST['teacher_address']);
	$teacher_province = mysqli_real_escape_string($con, $_POST['Ref_prov_id']);
	$teacher_amphur = mysqli_real_escape_string($con, $_POST['Ref_dist_id']);
	$teacher_district = mysqli_real_escape_string($con, $_POST['Ref_subdist_id']);
    $teacher_zipcode = mysqli_real_escape_string($con, $_POST['zip_code']);
    $teacher_since = mysqli_real_escape_string($con, $_POST['teacher_since']);
    $teacher_learning_group = mysqli_real_escape_string($con, $_POST['teacher_learning_group']);
    $teacher_position = mysqli_real_escape_string($con, $_POST['teacher_position']);
	$teacher_salary = mysqli_real_escape_string($con, $_POST['teacher_salary']);

	$sql="INSERT INTO teachers 
	VALUES ('$teacher_id','$teacher_fname', '$teacher_lname', '$teacher_gender','$teacher_birthdate','$teacher_telnumber','$teacher_email','$teacher_address',
	'$teacher_province','$teacher_amphur','$teacher_district','$teacher_zipcode','$teacher_since','$teacher_learning_group','$teacher_position', '$teacher_salary')";
	if (!mysqli_query($con,$sql)) {
	die('Error: ' . mysqli_error($con));
	}
	echo "<script>alert('Success'); window.location.href = 'TeacherCRUD.php';</script>"; ;
}

mysqli_close($con);
?>

<form name="inpfrm" method="post" action="teacherCRUD.php">
<table border='0' align='center' class='table table-hover'>
<tr>
    <input name="reset" type="submit" id="Back" value="Back"/></td>
</tr>
</table>