<?php
$con=mysqli_connect("localhost","root","","school_db");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $student_id = $_GET["student_id"];
    $school_year = $_GET["school_year"];
    $semester = $_GET["semester"];

    $sql = "SELECT * FROM student_payments WHERE student_id = '$student_id' AND school_year = '$school_year' AND semester = '$semester';";

    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    if (!$row) {
        header("location:StudentPaymentCRUD.php");
        exit;
    }

    $student_id = $row["student_id"];
    $school_year = $row["school_year"];
    $semester = $row["semester"];
    $paid = $row["paid"];
    $timestamp = $row["timestamp"];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student Payment</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/School/css/InsertStyle.css">
</head>
<body>
    <div class="container">
        <h2>Edit Student Payment</h2>
        <form method="POST" action="StudentPaymentEdit.php?student_id=<?php echo $row['student_id']; ?>&school_year=<?php echo $row['school_year']; ?>&semester=<?php echo $row['semester']; ?>">
            <label for="student_id">Student ID:</label>
            <input type="text" name="student_id" id="student_id" value="<?php echo $student_id;?>" required readonly>
            <br>
            <label for="school_year">School Year:</label>
            <input type="text" name="school_year" id="school_year" value="<?php echo $school_year;?>" required readonly>
            <br>
            <label for="semester">Semester:</label>
            <input type="text" name="semester" id="semester" value="<?php echo $semester;?>" required readonly>
            <br>
            <label for="paid">Paid:</label>
            <input type="text" name="paid" id="paid" value="<?php echo $paid;?>" required>
            <br>
            <input type="submit" value="Edit">
        </form>
    </div>
</body>
</html>
