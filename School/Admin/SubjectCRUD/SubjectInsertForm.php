<?php
$con = mysqli_connect("localhost", "root", "", "school_db");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Create New Subject</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/School/css/InsertStyle.css">
    <style>
        .checkbox-column {
            column-count: 3;
            column-gap: 20px;
        }

        .checkbox-inline {
            display: inline-block;
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Create New Subject</h2>
        <form method="POST" action="SubjectInsert.php">
            <label for="subject_id">Subject ID:</label>
            <input type="text" name="subject_id" id="subject_id" required>
            <br>
            <label for="subject_name">Subject Name:</label>
            <input type="text" name="subject_name" id="subject_name" required>
            <br>
            <label for="classroom">Classroom:</label>
            <?php
            $classrooms_sql = "SELECT classroom, curriculum_id FROM classrooms";
            $classrooms_result = $con->query($classrooms_sql);
            if ($classrooms_result->num_rows > 0) {
                echo "<div class='checkbox-column'>";
                while ($row = $classrooms_result->fetch_assoc()) {
                    echo "<label class='checkbox-inline'><input type='checkbox' name='classroom[]' value='" . $row['classroom'] . "' id='" . $row['classroom'] . "'>";
                    echo "<span>" . $row['classroom'] . " - " . $row['curriculum_id'] . "</span></label>";
                }
                echo "</div>";
            }
            ?>

            <label for="school_year">Select School Year:</label>
            <select name="school_year" id="school_year">
                <option value="">- Select School Year -</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
            </select>
            <br>
            <label for="semester">Semester:</label>
            <select name="semester" id="semester" required>
                <option value="" selected disabled>- Select Semester -</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
            <br>
            <label for="credit">Credit:</label>
            <select name="credit" id="credit">
                <option value="">- Select Credit -</option>
                <option value="0.5">0.5</option>
                <option value="1">1</option>
                <option value="1.5">1.5</option>
                <option value="2">2</option>
            </select>
            <br>
            <label for="learning_group">Learning Group:</label>
            <select name="learning_group" id="learning_group">
                <option value="">- Select Learning Group -</option>
                <option value="Thai Language Department">Thai Language Department</option>
                <option value="Foreign Languages Department">Foreign Languages Department</option>
                <option value="Science Department">Science Department</option>
                <option value="Mathematics Department">Mathematics Department</option>
                <option value="Health and Physical Education Department">Health and Physical Education Department
                </option>
                <option value="Arts Department">Arts Department</option>
                <option value="Social studies, Religion and Culture Department">Social studies, Religion and Culture
                    Department</option>
                <option value="Career and Technology Department">Career and Technology Department</option>
            </select>
            <br>
            <div id="teacher_ids">
                <label for="teacher_id">Teacher ID:</label>
                <input type="text" name="teacher_id[]" class="teacher-input" required>
            </div>
            <button type="button" onclick="addTeacherInput()">Add Teacher ID</button>
            <br>
            <input type="submit" value="Register">
        </form>
    </div>
    <script>
        function addTeacherInput() {
            var teacherIdsContainer = document.getElementById('teacher_ids');
            var input = document.createElement('input');
            input.type = 'text';
            input.name = 'teacher_id[]';
            input.classList.add('teacher-input');
            input.required = true;
            teacherIdsContainer.appendChild(input);
        }
    </script>

</body>

</html>