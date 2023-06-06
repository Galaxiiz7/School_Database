<!DOCTYPE html>
<html>

<head>
    <title>Create New Teacher</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="ex.css">
</head>

<body>
    <div class="container my-5">
        <h2>List of Teacher</h2>
        <a class="btn btn-primary" href="TeacherInsertForm.php" role="button">New Teacher</a>
        <a class="btn btn-primary" href="TeacherClassroomForm.php" role="button">Add Teacher to Classroom</a>
        <br>
        <form method="POST" action="TeacherCRUD.php">
            <label for="learning_group">Select Learning Group:</label>
            <select name="learning_group" id="learning_group">
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

            <button type="submit" class="btn btn-primary">Filter</button>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>Teacher ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Birth Date</th>
                    <th>Tel</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Province</th>
                    <th>Amphur</th>
                    <th>District</th>
                    <th>Zipcode</th>
                    <th>Teacher Since</th>
                    <th>Learning Group</th>
                    <th>Position</th>
                    <th>Salary</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $con = mysqli_connect("localhost", "root", "", "school_db");
                if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
                $whereClause = "";

                if (isset($_POST['learning_group']) && !empty($_POST['learning_group'])) {
                    $learningGroup = $_POST['learning_group'];
                    $whereClause = " WHERE teacher_learning_group = '$learningGroup'";
                }
                $sql = "SELECT teachers.*, provinces.name_en AS province_name, amphures.name_en AS amphur_name, districts.name_en AS district_name
                FROM teachers
                INNER JOIN provinces ON teachers.teacher_province = provinces.id
                INNER JOIN amphures ON teachers.teacher_amphur = amphures.id
                INNER JOIN districts ON teachers.teacher_district = districts.id
                $whereClause ORDER BY teacher_id ASC";
                ;

                $result = $con->query($sql);

                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }

                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>$row[teacher_id]</td>
                        <td>$row[teacher_fname]</td>
                        <td>$row[teacher_lname]</td>
                        <td>$row[teacher_birthdate]</td>
                        <td>$row[teacher_telnumber]</td>
                        <td>$row[teacher_email]</td>
                        <td>$row[teacher_address]</td>
                        <td>$row[province_name]</td>
                        <td>$row[amphur_name]</td>
                        <td>$row[district_name]</td>
                        <td>$row[teacher_zipcode]</td>
                        <td>$row[teacher_since]</td>
                        <td>$row[teacher_learning_group]</td>
                        <td>$row[teacher_position]</td>
                        <td>$row[teacher_salary]</td>
                        <td>
                            <div class='btn-group' role='group'>
                                <a class='btn btn-primary btn-sm me-1' href='TeacherEditForm.php?teacher_id=$row[teacher_id]'>Edit</a>
                                <a class='btn btn-danger btn-sm' href='TeacherDeleteForm.php?teacher_id=$row[teacher_id]'>Delete</a>
                            </div>
                        </td>
                    </tr>";
                }
                mysqli_close($con);
                ?>
            </tbody>
        </table>
    </div>
</body>
<div class="container my-5">
    <a href="../MainPage.php" class="btn btn-primary">Back to main page</a>
</div>

</html>