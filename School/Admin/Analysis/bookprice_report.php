<!DOCTYPE html>
<html>

<head>
    <title>Tuition Fees Report</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="bookprice_script.js"></script>
</head>

<body>
    <h1>Book Price Report</h1>
    <form>
        <label for="year">Select Year:</label>
        <select name="year" id="year">
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
        </select>

        <label for="semester">Select Semester:</label>
        <select name="semester" id="semester">
            <option value="1">Semester 1</option>
            <option value="2">Semester 2</option>
        </select>
        <label for="classroom">Select Classroom:</label>
        <select name="classroom" id="classroom">
            <?php
            $con = mysqli_connect("localhost", "root", "", "school_db");
            // Check connection
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

        <button type="submit">Generate Report</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Curriculum</th>
                <th>School Year</th>
                <th>Semester</th>
                <th>Book Count</th>
                <th>Book Price per Student</th>
                <th>Sum Book Price for All Students</th>
            </tr>
        </thead>
        <tbody>
            <!-- Report data will be dynamically added here -->
        </tbody>
    </table>
</body>
<div class="container my-5">
    <a href="../MainPage.php" class="btn btn-primary">Back to main page</a>
</div>

</html>