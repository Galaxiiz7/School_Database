<!DOCTYPE html>
<html>

<head>
    <title>Create New Student</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <section>
    <?php
    // Check if the user is logged in
    session_start();
    if (!isset($_SESSION['student_id'])) {
        // Redirect to the login page if not logged in
        header("Location: /School/StudentLogin/StudentloginForm.php");
        exit();
    }

    $con = mysqli_connect("localhost", "root", "", "school_db");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $student_id = $_SESSION['student_id'];

    // Fetch the information of the logged-in student
    $sql = "SELECT students.*, provinces.name_en AS province_name, amphures.name_en AS amphur_name, districts.name_en AS district_name
            FROM students
            INNER JOIN provinces ON students.student_province = provinces.id
            INNER JOIN amphures ON students.student_amphur = amphures.id
            INNER JOIN districts ON students.student_district = districts.id
            WHERE student_id = '$student_id'";

$result = $con->query($sql);

if (!$result) {
    die("Invalid query: " . $connection->error);
}

$row = $result->fetch_assoc();
?>

<div class="container my-5">
    <!-- ...existing code... -->

    <!-- Button to redirect to info.php -->
    <div class="btn-container">
        <div class="other-btn-container">
            <a href="Grade.php"><button class='grade-btn'>Grade</button></a>
            <a href="StudentPayment.php"><button class='grade-btn'>Payment</button></a>
            <a href="Classroom.php"><button class='grade-btn'>Classroom</button></a>
        </div>
        <div class="logout-btn-container">
            <a href="Logout.php"><button class='grade-btn'>Log out</button></a>
        </div>
    </div>

    <div class="student-info-container">
        <h2>Student Information</h2>
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
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $row['student_id']; ?></td>
                    <td><?php echo $row['student_fname']; ?></td>
                    <td><?php echo $row['student_lname']; ?></td>
                    <td><?php echo $row['student_birthdate']; ?></td>
                    <td><?php echo $row['student_telnumber']; ?></td>
                    <td><?php echo $row['student_email']; ?></td>
                    <td><?php echo $row['student_address']; ?></td>
                    <td><?php echo $row['province_name']; ?></td>
                    <td><?php echo $row['amphur_name']; ?></td>
                    <td><?php echo $row['district_name']; ?></td>
                    <td><?php echo $row['student_zipcode']; ?></td>
                    <td><?php echo $row['student_since']; ?></td>
                    <td><?php echo $row['student_status']; ?></td>
                    <td><?php echo $row['student_curriculum_id']; ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <?php
    mysqli_close($con);
    ?>
</section>
</body>


</html>
