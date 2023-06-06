<?php
$con=mysqli_connect("localhost","root","","school_db");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $student_id = $_GET["student_id"];
    $subject_id = $_GET["subject_id"];
    $school_year = $_GET["school_year"];
    $semester = $_GET["semester"];

    $sql = "SELECT * FROM student_subjects WHERE student_id = '$student_id' AND subject_id = '$subject_id' AND school_year = '$school_year' AND semester = '$semester';";

    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    if (!$row) {
        header("location:ScoreCRUD.php");
        exit;
    }

    $student_id = $row["student_id"];
    $subject_id = $row["subject_id"];
    $school_year = $row["school_year"];
    $semester = $row["semester"];
    $score = $row["score"];

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/School/css/InsertStyle.css">
</head>
<body>
    <div class="container">
        <h2>Edit Student</h2>
        <form method="POST" action="ScoreEdit.php?student_id=<?php echo $row['student_id']; ?>&subject_id=<?php echo $row['subject_id']; ?>&school_year=<?php echo $row['school_year']; ?>&semester=<?php echo $row['semester']; ?>">
            <label for="student_id">Student ID:</label>
            <input type="text" name="student_id" id="student_id" value="<?php echo $student_id;?>" required readonly>
            <br>
            <label for="student_id">Subject ID:</label>
            <input type="text" name="subject_id" id="subject_id" value="<?php echo $subject_id;?>" required readonly>
            <br>
            <label for="student_id">School Year:</label>
            <input type="text" name="school_year" id="school_year" value="<?php echo $school_year;?>" required readonly>
            <br>
            <label for="student_id">Semester:</label>
            <input type="text" name="semester" id="semester" value="<?php echo $semester;?>" required readonly>
            <br>
            <label for="student_id">Score:</label>
            <input type="text" name="score" id="score" value="<?php echo $score;?>" required>
            <br>
            <input type="submit" value="Edit">
        </form>
    </div>
</body>
</html>