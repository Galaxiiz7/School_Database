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
    <title>Update Classroom</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/School/css/InsertStyle.css">
</head>

<body>

    <div class="container">
        <h2>Update Classroom</h2>
        <form method="POST" action="UpdateClassroom.php">
            <label for="old_classroom">Old Classroom:</label>
            <input type="text" name="old_classroom" id="old_classroom" required>
            <br>
            <label for="old_school_year">Old School year:</label>
            <input type="text" name="old_school_year" id="old_school_year" required>
            <br>
            <label for="update_classroom">Update Classroom:</label>
            <input type="text" name="update_classroom" id="update_classroom" required>
            <br>
            <label for="update_school_year">Update School Year:</label>
            <input type="text" name="update_school_year" id="update_school_year" required>
            <br>
            <input type="submit" value="Update">
        </form>
    </div>
</body>
</html>
