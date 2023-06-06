<!DOCTYPE html>
<html>
<head>
    <title>List of Scores</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="ex.css">
</head>
<body>
    <div class="container my-5">
        <h2>List of Scores</h2>

        <form method="POST" action="ScoreCRUD.php">
            <label for="student_id">Student ID:</label>
            <input type="text" name="student_id" id="student_id">

            <label for="subject_id">Subject ID:</label>
            <input type="text" name="subject_id" id="subject_id">

            <label for="school_year">Select School Year:</label>
            <select name="school_year" id="school_year">
                <option value="">All</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
            </select>

            <label for="semester">Select Semester:</label>
            <select name="semester" id="semester">
                <option value="">All</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>

            <button type="submit" class="btn btn-primary">Filter</button>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Subject ID</th>
                    <th>School Year</th>
                    <th>Semester</th>
                    <th>Score</th>
                    <th>Edit Score</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $con = mysqli_connect("localhost", "root", "", "school_db");
                if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
                
                $whereClause = "";
                if (isset($_POST['student_id']) && !empty($_POST['student_id'])) {
                    $studentID = $_POST['student_id'];
                    $whereClause .= " WHERE student_id = '$studentID'";
                }
                
                if (isset($_POST['subject_id']) && !empty($_POST['subject_id'])) {
                    $subjectID = $_POST['subject_id'];
                    if (!empty($whereClause)) {
                        $whereClause .= " AND subject_id = '$subjectID'";
                    } else {
                        $whereClause .= " WHERE subject_id = '$subjectID'";
                    }
                }
                
                if (isset($_POST['school_year']) && !empty($_POST['school_year'])) {
                    $schoolYear = $_POST['school_year'];
                    if (!empty($whereClause)) {
                        $whereClause .= " AND school_year = '$schoolYear'";
                    } else {
                        $whereClause .= " WHERE school_year = '$schoolYear'";
                    }
                }
                
                if (isset($_POST['semester']) && !empty($_POST['semester'])) {
                    $semester = $_POST['semester'];
                    if (!empty($whereClause)) {
                        $whereClause .= " AND semester = '$semester'";
                    } else {
                        $whereClause .= " WHERE semester = '$semester'";
                    }
                }
                
                $sql = "SELECT * FROM student_subjects $whereClause";
                $result = $con->query($sql);
                
                if (!$result) {
                    die("Invalid query: " . $con->error);
                }
                
                if ($result->num_rows === 0) {
                    echo '<tr><td colspan="5">No record found</td></tr>';
                } else {
                    while ($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                            <td>$row[student_id]</td>
                            <td>$row[subject_id]</td>
                            <td>$row[school_year]</td>
                            <td>$row[semester]</td>
                            <td>$row[score]</td>
                            <td>
                            <a class='btn btn-primary btn-sm' href='ScoreEditForm.php?student_id=$row[student_id]&subject_id=$row[subject_id]&school_year=$row[school_year]&semester=$row[semester]'>Edit</a>
                            </td>
                        </tr>";
                    }
                }
                
                mysqli_close($con);
                ?>
            </tbody>
        </table>
    </div>
    <div class="container my-5">
        <a href="../MainPage.php" class="btn btn-primary">Back to main page</a>
    </div>
</body>
</html>
