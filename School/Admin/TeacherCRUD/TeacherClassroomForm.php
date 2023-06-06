<?php
$con=mysqli_connect("localhost","root","","school_db");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Teacher</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/School/css/InsertStyle.css">
</head>
<body>
    <div class="container">
        <h2>Create New Teacher</h2>
        <form method="POST" action="TeacherClassroom.php">
            <label for="teacher_id1">Teacher ID 1:</label>
            <input type="text" name="teacher_id1" id="teacher_id1" required>
            <br>
            <label for="teacher_id2">Teacher ID 2:</label>
            <input type="text" name="teacher_id2" id="teacher_id2" required>
            <br>
            <label for="school_year">School Year:</label>
            <select name="school_year" id="school_year">
                <option value="">- Select School Year -</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
            </select>
            <br>
            <label for="teacher_classroom">Classroom:</label>
            <select name="teacher_classroom" id="teacher_classroom" required>
                <option value="">- Select Classroom -</option>
                <?php
                $classrooms_sql = "SELECT classroom, curriculum_id FROM classrooms";
                $classrooms_result = $con->query($classrooms_sql);
                if ($classrooms_result->num_rows > 0) {
                    while ($row = $classrooms_result->fetch_assoc()) {
                        echo "<option value='" . $row['classroom'] . "'>" . $row['classroom'] . " - " . $row['curriculum_id'] . "</option>";
                    }
                }
                ?>
            </select>
            <br>
            <input type="submit" value="Register">
        </form>
    </div>
</body>
</html>
