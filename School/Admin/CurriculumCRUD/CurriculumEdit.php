<?php
$con=mysqli_connect("localhost","root","","school_db");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
} else {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!empty($_GET['curriculum_id']) && !empty($_GET['school_year'])) {
            $curriculum_id = $_GET['curriculum_id'];
            $school_year = $_GET['school_year'];
        } else {
            header("location: CurriculumCRUD.php");
            exit;
        }
    }
    // Escape variables for security
    $curriculum_id = mysqli_real_escape_string($con, $_POST["curriculum_id"]);
    $school_year = mysqli_real_escape_string($con, $_POST["school_year"]);
    $curriculum_price = mysqli_real_escape_string($con, $_POST["curriculum_price"]);

    $sql = "UPDATE curriculum_prices SET curriculum_price='$curriculum_price' WHERE curriculum_id = '$curriculum_id' AND school_year = '$school_year'";

    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    }
    echo "<script>alert('Success'); window.location.href = 'CurriculumCRUD.php';</script>";;
}
mysqli_close($con);
?>

<form name="inpfrm" method="post" action="CurriculumCRUD.php">
<table border='0' align='center' class='table table-hover'>
<tr>
    <input name="reset" type="submit" id="Back" value="Back"/></td>
</tr>
</table>