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
    <title>Book Subjects</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/School/css/InsertStyle.css">
</head>

<body>
    <div class="container">
        <h2>Create New Book For Subjects</h2>
        <form method="POST" action="book_subjects_Insert.php">
        <label for="book">Book:</label>
        <select name="book_id" id="book">
            <option value="">- Select Book -</option>
            <?php
            $books_sql = "SELECT book_id FROM books";
            $books_result = $con->query($books_sql);
            if ($books_result->num_rows > 0) {
                while ($row = $books_result->fetch_assoc()) {
                    echo "<option value='" . $row['book_id'] . "'>" . $row['book_id'] . "</option>";
                }
            }
            ?>
        </select>


            <br>
            <label for="subject_id">Subject ID:</label>
            <select name="subject_id" id="subject_id" required>
                <option value="">- Select Subject ID -</option>
                <?php
                $subjects_sql = "SELECT DISTINCT subject_id FROM subjects";
                $subjects_result = $con->query($subjects_sql);
                if ($subjects_result->num_rows > 0) {
                    while ($row = $subjects_result->fetch_assoc()) {
                        echo "<option value='" . $row['subject_id'] . "'>" . $row['subject_id'] . "</option>";
                    }
                }
                ?>
            </select>
            <br>
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
            <input type="submit" value="Register">
        </form>
    </div>
</body>
</html>
