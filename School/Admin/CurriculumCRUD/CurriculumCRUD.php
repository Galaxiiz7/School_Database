<!DOCTYPE html>
<html>
<head>
    <title>List of Curriculum Prices</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="ex.css">
</head>
<body>
    <div class="container my-5">
        <h2>List of Curriculum Prices</h2>
        <a class="btn btn-primary" href="CurriculumPriceInsertForm.php" role="button">Add Price Of Curriculums</a>
        <br>

        <form method="POST" action="CurriculumCRUD.php">
            <label for="school_year">Select School Year:</label>
            <select name="school_year" id="school_year">
                <option value="">All</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
            </select>

            <button type="submit" class="btn btn-primary">Filter</button>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th>Curriculum ID</th>
                    <th>School Year</th>
                    <th>Curriculum Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $con = mysqli_connect("localhost", "root", "", "school_db");
                if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
                
                $whereClause = "";
                if (isset($_POST['school_year']) && !empty($_POST['school_year'])) {
                    $schoolYear = $_POST['school_year'];
                    $whereClause = "WHERE school_year = '$schoolYear'";
                }
                
                $sql = "SELECT * FROM curriculum_prices $whereClause";
                $result = $con->query($sql);
                
                if (!$result) {
                    die("Invalid query: " . $con->error);
                }
                
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>$row[curriculum_id]</td>
                        <td>$row[school_year]</td>
                        <td>$row[curriculum_price]</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='CurriculumEditForm.php?curriculum_id=$row[curriculum_id]&school_year=$row[school_year]'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='CurriculumPriceDeleteForm.php?curriculum_id=$row[curriculum_id]&school_year=$row[school_year]'>Delete</a>
                        </td>
                    </tr>";
                }
                
                mysqli_close($con);
                ?>
            </tbody>
        </table>
    </div>
</body>
<div class="container my-5">
    <a href="../MainPage.php" class="btn btn-primary">Back to main page</a>
</div>
</html>
	