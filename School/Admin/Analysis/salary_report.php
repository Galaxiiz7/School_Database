<!DOCTYPE html>
<html>
<head>
    <title>Teacher Salary Report</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body>
    <h1>Teacher Salary Report</h1>
    
    <!-- Table to display the report data -->
    <table>
        <thead>
            <tr>
                <th>Learning Group</th>
                <th>Teacher Count</th>
                <th>Sum Salary</th>
            </tr>
        </thead>
        <tbody>
            <!-- PHP code to include the report data -->
            <?php include('salary_query.php'); ?>
        </tbody>
    </table>
</body>
<div class="container my-5">
    <a href="../MainPage.php" class="btn btn-primary">Back to main page</a>
</div>
</html>
