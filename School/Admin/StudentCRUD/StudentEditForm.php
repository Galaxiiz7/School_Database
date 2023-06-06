<?php
$con=mysqli_connect("localhost","root","","school_db");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["student_id"])) {
        header("location:StudentCRUD.php");
        exit;
    }
    $student_id = $_GET["student_id"];

    $sql = "SELECT * FROM students WHERE student_id = $student_id;";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    if (!$row) {
        header("location:StudentCRUD.php");
        exit;
    }
    $student_id = $row["student_id"];
    $student_fname = $row["student_fname"];
    $student_lname = $row["student_lname"];
    $student_gender = $row["student_gender"];
    $student_birthdate = $row["student_birthdate"];
    $student_telnumber = $row["student_telnumber"];
    $student_email = $row["student_email"];
    $student_address = $row["student_address"];
    $student_province = $row["student_province"];
    $student_amphur = $row["student_amphur"];
    $student_district = $row["student_district"];
    $student_zipcode = $row["student_zipcode"];
    $student_since = $row["student_since"];
    $student_status = $row["student_status"];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" type="text/css" href="/School/css/InsertStyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <?php
    $sql_provinces = "SELECT * FROM provinces";
    $query = mysqli_query($con, $sql_provinces);
    ?>
    <div class="container">
        <h2>Edit Student</h2>
        <form method="POST" action="StudentEdit.php?student_id=<?php echo $row['student_id']; ?>">

        <label for="student_id">Student ID:</label>
            <input type="text" name="student_id" id="student_id" value="<?php echo $student_id;?>" required readonly>
            <br>
            <label for="student_fname">First Name:</label>
            <input type="text" name="student_fname" id="student_fname" value="<?php echo $student_fname;?>" required>
            <br>
            <label for="student_lname">Last Name:</label>
            <input type="text" name="student_lname" id="student_lname" value="<?php echo $student_lname;?>" required>
            <br>
            <label for="student_gender">Gender:</label>
            <select name="student_gender" id="student_gender" required>
                <option value="" selected disabled>- <?php echo $student_gender;?> -</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <br>
            <label for="student_birthdate">Birth Date:</label>
            <input type="date" name="student_birthdate" id="student_birthdate" value="<?php echo $student_birthdate;?>" required>
            <br>
            <label for="student_telnumber">Telnumber:</label>
            <input type="text" name="student_telnumber" id="student_telnumber" value="<?php echo $student_telnumber;?>" required>
            <br>
            <label for="student_email">Email:</label>
            <input type="email" name="student_email" id="student_email" value="<?php echo $student_email;?>" required>
            <br>
            <label for="student_address">Address:</label>
            <input type="text" name="student_address" id="student_address" value="<?php echo $student_address;?>" required>
            <br>
            <label for="province">Province:</label>
            <select class="form-control" name="Ref_prov_id" id="provinces" value="<?php echo $student_province;?>" required>
                <option value="" selected disabled>-Please Select Province-</option>
                <?php foreach ($query as $value) { ?>
                <option value="<?=$value['id']?>"><?=$value['name_en']?></option>
                <?php } ?>
            </select>
            <br>
            <label for="amphures">Amphur:</label>
            <select class="form-control" name="Ref_dist_id" id="amphures" value="<?php echo $student_amphur;?>" required>
            </select>
            <br>
            <label for="district">District:</label>
            <select class="form-control" name="Ref_subdist_id" id="districts" value="<?php echo $student_district;?>" required>
            </select>
            <br>
            <label for="zipcode">Zipcode:</label>
            <input class="form-control" type="text" name="zip_code" id="zip_code" value="<?php echo $student_zipcode;?>" required>
            <br>
            <label for="student_since">Since:</label>
            <input type="date" name="student_since" id="student_since" value="<?php echo $student_since;?>" required>
            <br>
            <label for="student_status">Student Status:</label>
            <select name="student_status" id="student_status" required readonly>
                <option value="" selected disabled>- <?php echo $student_status;?> -</option>
                <option value="Student">Student</option>
                <option value="Graduated">Graduated</option>
            </select>
            <br>
            <input type="submit" value="Edit">
        </form>
    </div>
</body>
</html>
<?php include('script.php');?>