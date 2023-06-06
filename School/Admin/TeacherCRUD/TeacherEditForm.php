<?php
$con=mysqli_connect("localhost","root","","school_db");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["teacher_id"])) {
        header("location:teacherCRUD.php");
        exit;
    }
    $teacher_id = $_GET["teacher_id"];

    $sql = "SELECT * FROM teachers WHERE teacher_id = $teacher_id;";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    if (!$row) {
        header("location:teacherCRUD.php");
        exit;
    }
    $teacher_id = $row["teacher_id"];
    $teacher_fname = $row["teacher_fname"];
    $teacher_lname = $row["teacher_lname"];
    $teacher_gender = $row["teacher_gender"];
    $teacher_birthdate = $row["teacher_birthdate"];
    $teacher_telnumber = $row["teacher_telnumber"];
    $teacher_email = $row["teacher_email"];
    $teacher_address = $row["teacher_address"];
    $teacher_province = $row["teacher_province"];
    $teacher_amphur = $row["teacher_amphur"];
    $teacher_district = $row["teacher_district"];
    $teacher_zipcode = $row["teacher_zipcode"];
    $teacher_since = $row["teacher_since"];
    $teacher_learning_group = $row["teacher_learning_group"];
    $teacher_position= $row["teacher_position"];
    $teacher_salary = $row["teacher_salary"];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit teacher</title>
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
        <h2>Edit teacher</h2>
        <form method="POST" action="teacherEdit.php?oldteacher_id=<?php echo $row['teacher_id']; ?>">

        <label for="teacher_id">teacher ID:</label>
            <input type="text" name="teacher_id" id="teacher_id" value="<?php echo $teacher_id;?>" required readonly>
            <br>
            <label for="teacher_fname">First Name:</label>
            <input type="text" name="teacher_fname" id="teacher_fname" value="<?php echo $teacher_fname;?>" required>
            <br>
            <label for="teacher_lname">Last Name:</label>
            <input type="text" name="teacher_lname" id="teacher_lname" value="<?php echo $teacher_lname;?>" required>
            <br>
            <label for="teacher_gender">Gender:</label>
            <select name="teacher_gender" id="teacher_gender" required>
                <option value="" selected disabled>- <?php echo $teacher_gender;?> -</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <br>
            <label for="teacher_birthdate">Birth Date:</label>
            <input type="date" name="teacher_birthdate" id="teacher_birthdate" value="<?php echo $teacher_birthdate;?>" required>
            <br>
            <label for="teacher_telnumber">Telnumber:</label>
            <input type="text" name="teacher_telnumber" id="teacher_telnumber" value="<?php echo $teacher_telnumber;?>" required>
            <br>
            <label for="teacher_email">Email:</label>
            <input type="email" name="teacher_email" id="teacher_email" value="<?php echo $teacher_email;?>" required>
            <br>
            <label for="teacher_address">Address:</label>
            <input type="text" name="teacher_address" id="teacher_address" value="<?php echo $teacher_address;?>" required>
            <br>
            <label for="province">Province:</label>
            <select class="form-control" name="Ref_prov_id" id="provinces" value="<?php echo $teacher_province;?>" required>
                <option value="" selected disabled>-Please Select Province-</option>
                <?php foreach ($query as $value) { ?>
                <option value="<?=$value['id']?>"><?=$value['name_en']?></option>
                <?php } ?>
            </select>
            <br>
            <label for="amphures">Amphur:</label>
            <select class="form-control" name="Ref_dist_id" id="amphures" value="<?php echo $teacher_amphur;?>" required>
            </select>
            <br>
            <label for="district">District:</label>
            <select class="form-control" name="Ref_subdist_id" id="districts" value="<?php echo $teacher_district;?>" required>
            </select>
            <br>
            <label for="zipcode">Zipcode:</label>
            <input class="form-control" type="text" name="zip_code" id="zip_code" value="<?php echo $teacher_zipcode;?>" required readonly>
            <br>
            <label for="teacher_since">Since:</label>
            <input type="date" name="teacher_since" id="teacher_since" value="<?php echo $teacher_since;?>" required>
            <br>
            <label for="teacher_learning_group">Learnning Group:</label>
            <select name="teacher_learning_group" id="teacher_learning_group" required>
                <option value="">- <?php echo $teacher_learning_group;?> -</option>
                <option value="Thai Language Department">Thai Language Department</option>
                <option value="Foreign Languages Department">Foreign Languages Department</option>
                <option value="Science Department">Science Department</option>
                <option value="Mathematics Department">Mathematics Department</option>
                <option value="Health and Physical Education Department">Health and Physical Education Department</option>
                <option value="Arts Department">Arts Department</option>
                <option value="Social studies, Religion and Culture Department">Social studies, Religion and Culture Department</option>
                <option value="Career and Technology Department">Career and Technology Department</option>
            </select>
            <br>
            <label for="teacher_position">Position:</label>
            <input type="text" name="teacher_position" id="teacher_position" value="<?php echo $teacher_position;?>" required>
            <br>
            <label for="teacher_salary">Salary:</label>
            <input type="text" name="teacher_salary" id="teacher_salary" value="<?php echo $teacher_salary;?>" required>
            <br>
            <input type="submit" value="Edit">
        </form>
    </div>
</body>
</html>
<?php include('script.php');?>