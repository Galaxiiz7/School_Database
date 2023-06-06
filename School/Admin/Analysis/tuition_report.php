<!DOCTYPE html>
<html>
<head>
    <title>Tuition Fees Report</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
</head>
<body>
    <h1>Tuition Fees Report</h1>
    <form>
        <label for="year">Select Year:</label>
        <select name="year" id="year">
            <!-- Add options for the years you want to display -->
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <!-- Add more options as needed -->
        </select>
        
        <label for="semester">Select Semester:</label>
        <select name="semester" id="semester">
            <!-- Add options for the semesters you want to display -->
            <option value="1">Semester 1</option>
            <option value="2">Semester 2</option>
            <!-- Add more options as needed -->
        </select>
        
        <button type="submit">Generate Report</button>
    </form>
    
    <!-- Table to display the report data -->
    <table>
        <thead>
            <tr>
                <th>School Year</th>
                <th>Semester</th>
                <th>Curriculum</th>
                <th>Count Students Paid</th>
                <th>Total Amount Paid</th>
                <th>Count Students Not Paid</th>
                <th>Total Amount Not Paid</th>
            </tr>
        </thead>
        <tbody>
            <!-- Report data will be dynamically added here -->
        </tbody>
    </table>
</body>
<div class="container my-5">
    <a href="../MainPage.php" class="btn btn-primary">Back to main page</a>
</div>
</html>
