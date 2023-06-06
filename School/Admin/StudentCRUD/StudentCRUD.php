<!DOCTYPE html>
<html>
<head>
    <title>Create New Student</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="ex.css">
</head>
<body>
    <div class="container my-5">
        <h2>List of Students</h2>
        <a class="btn btn-primary" href="StudentInsertForm.php" role="button">New Student</a>
        <br>

        <form method="POST" action="StudentCRUD.php">
            <label for="classroom">Classroom:</label>
            <select name="classroom" id="classroom">
                <option value="">- All -</option>
                <?php
                $con = mysqli_connect("localhost", "root", "", "school_db");
                if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
                $classrooms_sql = "SELECT classroom, curriculum_id FROM classrooms";
                $classrooms_result = $con->query($classrooms_sql);
                if ($classrooms_result->num_rows > 0) {
                    while ($row = $classrooms_result->fetch_assoc()) {
                        echo "<option value='" . $row['classroom'] . "'>" . $row['classroom'] . " - " . $row['curriculum_id'] . "</option>";
                    }
                }
                ?>
            </select>
            <label for="school_year">Select School Year:</label>
            <select name="school_year" id="school_year">
                <option value="">All</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
            </select>

            <button type="submit" class="btn btn-primary">Filter</button>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th>Student ID</th>
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
                    <th>Student Since</th>
                    <th>Status</th>
                    <th>Curriculum ID</th>
                    <th>Classroom</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $whereClause = "";
                if (isset($_POST['classroom']) && !empty($_POST['classroom'])) {
                    $classroom = $_POST['classroom'];
                    $whereClause = "WHERE student_classroom = '$classroom'";
                }

                if (isset($_POST['school_year']) && !empty($_POST['school_year'])) {
                    $schoolYear = $_POST['school_year'];
                    if (empty($whereClause)) {
                        $whereClause = "WHERE school_year = '$schoolYear'";
                    } else {
                        $whereClause .= " AND school_year = '$schoolYear'";
                    }
                }

                $sql = "SELECT students.*, provinces.name_en AS province_name, amphures.name_en AS amphur_name, districts.name_en AS district_name, student_classrooms.student_classroom
                FROM students
                INNER JOIN provinces ON students.student_province = provinces.id
                INNER JOIN amphures ON students.student_amphur = amphures.id
                INNER JOIN districts ON students.student_district = districts.id
                INNER JOIN student_classrooms ON students.student_id = student_classrooms.student_id
                $whereClause ORDER BY students.student_id ASC"; 

                $result = $con->query($sql);

                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }

                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>$row[student_id]</td>
                        <td>$row[student_fname]</td>
                        <td>$row[student_lname]</td>
                        <td>$row[student_birthdate]</td>
                        <td>$row[student_telnumber]</td>
                        <td>$row[student_email]</td>
                        <td>$row[student_address]</td>
                        <td>$row[province_name]</td>
                        <td>$row[amphur_name]</td>
                        <td>$row[district_name]</td>
                        <td>$row[student_zipcode]</td>
                        <td>$row[student_since]</td>
                        <td>$row[student_status]</td>
                        <td>$row[student_curriculum_id]</td>
                        <td>$row[student_classroom]</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='StudentEditForm.php?student_id=$row[student_id]'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='StudentDeleteForm.php?student_id=$row[student_id]'>Delete</a>
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
