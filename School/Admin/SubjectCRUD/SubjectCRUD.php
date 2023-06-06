<!DOCTYPE html>
<html>
<head>
    <title>List of Subjects</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="ex.css">
</head>
<body>
    <div class="container my-5">
        <h2>List of Subjects</h2>
        <a class="btn btn-primary" href="SubjectInsertForm.php" role="button">Add Subject</a>
        <a class="btn btn-primary" href="book_subjects_insertForm.php" role="button">Add Book to Subject</a>
        <br>

        <form method="POST" action="SubjectCRUD.php">
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
                    <th>Subject ID</th>
                    <th>School Year</th>
                    <th>Semester</th>
                    <th>Subject Name</th>
                    <th>Learning Group</th>
                    <th>Credit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $con = mysqli_connect("localhost", "root", "", "school_db");
                if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
                
                $whereClause = "";
                if (isset($_POST['school_year']) && !empty($_POST['school_year'])) {
                    $schoolYear = $_POST['school_year'];
                    $whereClause .= " WHERE school_year = '$schoolYear'";
                }
                
                if (isset($_POST['semester']) && !empty($_POST['semester'])) {
                    $semester = $_POST['semester'];
                    if (!empty($whereClause)) {
                        $whereClause .= " AND semester = '$semester'";
                    } else {
                        $whereClause .= " WHERE semester = '$semester'";
                    }
                }
                
                $sql = "SELECT * FROM subjects $whereClause";
                $result = $con->query($sql);
                
                if (!$result) {
                    die("Invalid query: " . $con->error);
                }
                
                if ($result->num_rows === 0) {
                    echo '<tr><td colspan="7">No record found</td></tr>';
                } else {
                    while ($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                            <td>$row[subject_id]</td>
                            <td>$row[school_year]</td>
                            <td>$row[semester]</td>
                            <td>$row[subject_name]</td>
                            <td>$row[learning_group]</td>
                            <td>$row[credit]</td>
                            <td>
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
