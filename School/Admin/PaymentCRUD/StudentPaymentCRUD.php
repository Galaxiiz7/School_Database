<!DOCTYPE html>
<html>
<head>
    <title>List of Student Payments</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="ex.css">
</head>
<body>
    <div class="container my-5">
        <h2>List of Student Payments</h2>
        <a class="btn btn-primary" href="StudentPaymentInsertForm.php" role="button">Add Payment</a>
        <br>

        <form method="POST" action="StudentPaymentCRUD.php">
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
                <option value="1">Semester 1</option>
                <option value="2">Semester 2</option>
            </select>

            <button type="submit" class="btn btn-primary">Filter</button>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>School Year</th>
                    <th>Semester</th>
                    <th>Paid</th>
                    <th>Timestamp</th>
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
                if (isset($_POST['school_year']) && !empty($_POST['school_year'])) {
                    $schoolYear = $_POST['school_year'];
                    $whereClause .= " WHERE school_year = '$schoolYear'";
                }
                
                if (isset($_POST['semester']) && !empty($_POST['semester'])) {
                    $semester = $_POST['semester'];
                    if (empty($whereClause)) {
                        $whereClause .= " WHERE semester = '$semester'";
                    } else {
                        $whereClause .= " AND semester = '$semester'";
                    }
                }
                
                $sql = "SELECT * FROM student_payments $whereClause";
                $result = $con->query($sql);
                
                if (!$result) {
                    die("Invalid query: " . $con->error);
                }
                
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>$row[student_id]</td>
                        <td>$row[school_year]</td>
                        <td>$row[semester]</td>
                        <td>$row[paid]</td>
                        <td>$row[timestamp]</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='StudentPaymentEditForm.php?student_id=$row[student_id]&school_year=$row[school_year]&semester=$row[semester]'>Edit</a>
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
