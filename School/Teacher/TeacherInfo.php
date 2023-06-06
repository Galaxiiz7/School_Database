<!DOCTYPE html>
<html>

<head>
    <title>Create New Teacher</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    </style>
</head>

<body>
    <section>
    <?php
    // Check if the user is logged in
    session_start();
    if (!isset($_SESSION['teacher_id'])) {
        // Redirect to the login page if not logged in
        header("Location: /School/TeacherLogin/TeacherloginForm.php");
        exit();
    }

    $con = mysqli_connect("localhost", "root", "", "school_db");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $teacher_id = $_SESSION['teacher_id'];

    // Fetch the information of the logged-in teacher
    $sql = "SELECT teachers.*, provinces.name_en AS province_name, amphures.name_en AS amphur_name, districts.name_en AS district_name
            FROM teachers
            INNER JOIN provinces ON teachers.teacher_province = provinces.id
            INNER JOIN amphures ON teachers.teacher_amphur = amphures.id
            INNER JOIN districts ON teachers.teacher_district = districts.id
            WHERE teacher_id = '$teacher_id'";

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
        <!-- <div class="other-btn-container">
            <a href="Grade.php"><button class='grade-btn'>Grade</button></a>
            <a href="StudentPayment.php"><button class='grade-btn'>Payment</button></a>
        </div> -->
        <div class="logout-btn-container">
            <a href="Logout.php"><button class='grade-btn'>Log out</button></a>
        </div>
    </div>

    <div class="teacher-info-container">
        <h2>Teacher Information</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>teacher ID</th>
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
                    <th>teacher Since</th>
                    <th>Learning Group</th>
                    <th>Position</th>
                    <th>Salary</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $row['teacher_id']; ?></td>
                    <td><?php echo $row['teacher_fname']; ?></td>
                    <td><?php echo $row['teacher_lname']; ?></td>
                    <td><?php echo $row['teacher_birthdate']; ?></td>
                    <td><?php echo $row['teacher_telnumber']; ?></td>
                    <td><?php echo $row['teacher_email']; ?></td>
                    <td><?php echo $row['teacher_address']; ?></td>
                    <td><?php echo $row['province_name']; ?></td>
                    <td><?php echo $row['amphur_name']; ?></td>
                    <td><?php echo $row['district_name']; ?></td>
                    <td><?php echo $row['teacher_zipcode']; ?></td>
                    <td><?php echo $row['teacher_since']; ?></td>
                    <td><?php echo $row['teacher_learning_group']; ?></td>
                    <td><?php echo $row['teacher_position']; ?></td>
                    <td><?php echo $row['teacher_salary']; ?></td>
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
