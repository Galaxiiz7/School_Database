<?php
$con=mysqli_connect("localhost","root","","school_db");
// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create New teacher</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <h2>Create New teacher</h2>
        <form method="POST" action="teacherInsert.php">
            <label for="teacher_fname">teacher ID:</label>
            <input type="text" name="teacher_id" id="teacher_id" required>
            <br>
            <label for="teacher_fname">First Name:</label>
            <input type="text" name="teacher_fname" id="teacher_fname" required>
            <br>
            <label for="teacher_lname">Last Name:</label>
            <input type="text" name="teacher_lname" id="teacher_lname" required>
            <br>
            <label for="teacher_gender">Gender:</label>
            <select name="teacher_gender" id="teacher_gender" required>
                <option value="" selected disabled>- Select Gender -</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <br>
            <label for="teacher_birthdate">Birth Date:</label>
            <input type="date" name="teacher_birthdate" id="teacher_birthdate" required>
            <br>
            <label for="teacher_telnumber">Telnumber:</label>
            <input type="text" name="teacher_telnumber" id="teacher_telnumber" required>
            <br>
            <label for="teacher_email">Email:</label>
            <input type="email" name="teacher_email" id="teacher_email" required>
            <br>
            <label for="teacher_address">Address:</label>
            <input type="text" name="teacher_address" id="teacher_address" required>
            <br>
            <label for="province">Province:</label>
            <select class="form-control" name="Ref_prov_id" id="provinces" required>
                <option value="" selected disabled>-Please Select Province-</option>
                <?php foreach ($query as $value) { ?>
                <option value="<?=$value['id']?>"><?=$value['name_en']?></option>
                <?php } ?>
            </select>
            <br>
            <label for="amphures">Amphur:</label>
            <select class="form-control" name="Ref_dist_id" id="amphures" required>
            </select>
            <br>
            <label for="district">District:</label>
            <select class="form-control" name="Ref_subdist_id" id="districts" required>
            </select>
            <br>
            <label for="zipcode">Zipcode:</label>
            <input class="form-control" type="text" name="zip_code" id="zip_code" required readonly>
            <br>
            <label for="teacher_since">Since:</label>
            <input type="date" name="teacher_since" id="teacher_since" required>
            <br>
            <label for="teacher_learning_group">Learning Group:</label>
            <select name="teacher_learning_group" id="teacher_learning_group">
                <option value="">- Select Learning Group -</option>
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
            <input type="text" name="teacher_position" id="teacher_position" required>
            <br>
            <label for="teacher_salary">Salary:</label>
            <input type="text" name="teacher_salary" id="teacher_salary" required>
            <br>
            <input type="submit" value="Register">
        </form>
    </div>
</body>
</html>
<?php include('script.php');?>