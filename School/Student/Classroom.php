<!DOCTYPE html>
<html>

<head>
    <title>Student Grade</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="ex.css">
</head>

<body>
    <div class="container my-5">
        <h2>Classroom Information</h2>
        <form method="POST" action="Classroom.php">
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
                    <th>School Year</th>
                    <th>Classroom</th>
                </tr>
            </thead>
            <tbody>
            <?php
// Check if the user is logged in
session_start();
$student_id = $_SESSION['student_id'];
$con = mysqli_connect("localhost", "root", "", "school_db");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$whereClause = "WHERE student_id = '$student_id'";

if (isset($_POST['school_year']) && !empty($_POST['school_year'])) {
    $school_year = $_POST['school_year'];
    $whereClause .= "AND school_year = '$school_year' ";
}

// Fetch the information of the logged-in student
$sql = "SELECT * FROM student_classrooms $whereClause";
$result = $con->query($sql);

if (!$result) {
    die("Invalid query: " . $con->error);
}

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $row['student_id']; ?></td>
            <td><?php echo $row['school_year']; ?></td>
            <td><?php echo $row['student_classroom']; ?></td>
        </tr>
        <?php
    }
} else {
    ?>
    <tr>
        <td colspan="5">No records found.</td>
    </tr>
    <?php
}
?>

</tbody>
</table>
    </div>

    <?php
    mysqli_close($con);
    
    ?>

</body>
<div class="container my-5">
    <!-- ...existing code... -->

    <!-- Button to redirect to info.php -->
    <a href="StudentInfo.php" class="btn btn-primary">Back to student page</a>
</div>


</html>
