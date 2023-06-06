<?php
$con = mysqli_connect("localhost", "root", "", "school_db");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
} else {
    if (isset($_POST['curriculum_id']) && isset($_POST['school_year']) && isset($_POST['curriculum_price'])) {
        $curriculum_id = mysqli_real_escape_string($con, $_POST['curriculum_id']);
        $school_year = mysqli_real_escape_string($con, $_POST['school_year']);
        $curriculum_price = mysqli_real_escape_string($con, $_POST['curriculum_price']);

        $sql = "INSERT INTO curriculum_prices (curriculum_id, school_year, curriculum_price) 
                VALUES ('$curriculum_id', '$school_year', '$curriculum_price')";

        if (!mysqli_query($con, $sql)) {
            die('Error: ' . mysqli_error($con));
        }
        echo "<script>alert('Success'); window.location.href = 'CurriculumCRUD.php';</script>";;
    } else {
        echo "<script>alert('Please provide all the required fields.')";
    }
}

mysqli_close($con);
?>

<form name="inpfrm" method="post" action="CurriculumCRUD.php">
<table border='0' align='center' class='table table-hover'>
<tr>
    <input name="reset" type="submit" id="Back" value="Back"/></td>
</tr>
</table>