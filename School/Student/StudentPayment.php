<!DOCTYPE html>
<html>

<head>
    <title>Student Payment</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="ex.css">
</head>

<body>
    <section>
    <?php
    // Check if the user is logged in
    session_start();

    $con = mysqli_connect("localhost", "root", "", "school_db");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $student_id = $_SESSION['student_id'];

    // Fetch the information of the logged-in student
    $sql = "SELECT * FROM student_payments
            WHERE student_id = '$student_id'";

    $result = $con->query($sql);

    if (!$result) {
        die("Invalid query: " . $connection->error);
    }

    $row = $result->fetch_assoc();
    ?>

    <div class="container my-5">
        <h2>Payment Information</h2>

        <?php if ($result->num_rows === 0) : ?>
            <p>No record found.</p>
        <?php else : ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>School Year</th>
                        <th>Semester</th>
                        <th>Paid</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $row['student_id']; ?></td>
                        <td><?php echo $row['school_year']; ?></td>
                        <td><?php echo $row['semester']; ?></td>
                        <td><?php echo $row['paid']; ?></td>
                        <td><?php echo $row['timestamp']; ?></td>
                    </tr>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <?php
    mysqli_close($con);
    ?>
    <section>
</body>
<div class="container my-5">
    <!-- ...existing code... -->

    <!-- Button to redirect to info.php -->
    <a href="StudentInfo.php" class="btn btn-primary">Back to student page</a>
</div>

</html>
