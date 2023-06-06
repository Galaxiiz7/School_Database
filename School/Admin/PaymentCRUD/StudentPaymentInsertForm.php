<!DOCTYPE html>
<html>
<head>
    <title>Add New Student Payment</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/School/css/InsertStyle.css">
</head>
<body>
    <div class="container">
        <h2>Add New Student Payment</h2>
        <form method="POST" action="StudentPaymentInsert.php">
            <label for="student_id">Student ID:</label>
            <input type="text" name="student_id" id="student_id" required>
            <br>
            <label for="school_year">School Year:</label>
            <input type="text" name="school_year" id="school_year" required>
            <br>
            <label for="semester">Semester:</label>
            <select name="semester" id="semester" required>
                <option value="" selected disabled>- Select Semester -</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
            <br>
            <label for="paid">Paid:</label>
            <select name="paid" id="paid" required>
                <option value="" selected disabled>- Select Paid -</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
            <br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
