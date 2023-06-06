<?php
$con = mysqli_connect("localhost", "root", "", "school_db");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Create New Student</title>
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
        <h2>Create New Student</h2>
        <form method="POST" action="StudentInsert.php">
            <label for="student_fname">Student ID:</label>
            <input type="text" name="student_id" id="student_id" required>
            <br>
            <label for="student_fname">First Name:</label>
            <input type="text" name="student_fname" id="student_fname" required>
            <br>
            <label for="student_lname">Last Name:</label>
            <input type="text" name="student_lname" id="student_lname" required>
            <br>
            <label for="student_gender">Gender:</label>
            <select name="student_gender" id="student_gender" required>
                <option value="" selected disabled>- Select Gender -</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <br>
            <label for="student_birthdate">Birth Date:</label>
            <input type="date" name="student_birthdate" id="student_birthdate" required>
            <br>
            <label for="student_telnumber">Telnumber:</label>
            <input type="text" name="student_telnumber" id="student_telnumber" required>
            <br>
            <label for="student_email">Email:</label>
            <input type="email" name="student_email" id="student_email" required>
            <br>
            <label for="student_address">Address:</label>
            <input type="text" name="student_address" id="student_address" required>
            <br>
            <label for="province">Province:</label>
            <select class="form-control" name="Ref_prov_id" id="provinces" required>
                <option value="" selected disabled>- Please Select Province -</option>
                <?php foreach ($query as $value) { ?>
                    <option value="<?= $value['id'] ?>"><?= $value['name_en'] ?></option>
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
            <label for="student_since">Since:</label>
            <input type="date" name="student_since" id="student_since" required>
            <br>
            <label for="student_status">Student Status:</label>
            <select name="student_status" id="student_status" required>
                <option value="" selected disabled>- Select Status -</option>
                <option value="Student">Student</option>
                <option value="Graduated">Graduated</option>
            </select>
            <br>
            <label for="student_curriculum_id">Curriculum:</label>
            <select name="student_curriculum_id" id="student_curriculum_id" required>
                <option value="">- Select Curriculum -</option>
                <?php
                  $curriculum_sql = "SELECT curriculum_id, curriculum_name FROM curriculums";
                  $curriculum_result = $con->query($curriculum_sql);

                  if ($curriculum_result->num_rows > 0) {
                    while ($row = $curriculum_result->fetch_assoc()) {
                      echo "<option value='" . $row['curriculum_id'] . "'>" . $row['curriculum_id'] . " - " . $row['curriculum_name'] . "</option>";
                    }
                  }
                ?>
            </select>
            <br>
            <label for="school_year">School Year:</label>
            <input type="text" name="school_year" id="school_year" required>
            <br>
            <label for="student_classroom">Classroom:</label>
            <select name="student_classroom" id="student_classroom" required>
                <option value="">- Select Classroom -</option>
                <?php
                $classrooms_sql = "SELECT classroom, curriculum_id FROM classrooms";
                $classrooms_result = $con->query($classrooms_sql);
                if ($classrooms_result->num_rows > 0) {
                    while ($row = $classrooms_result->fetch_assoc()) {
                        echo "<option value='" . $row['classroom'] . "'>" . $row['classroom'] . " - " . $row['curriculum_id'] . "</option>";
                    }
                }
                ?>
            </select>
            <br>
            <input type="submit" value="Register">
        </form>
    </div>
</body>
</html>
<?php include('script.php'); ?>