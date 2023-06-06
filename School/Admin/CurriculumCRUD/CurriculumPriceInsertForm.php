<!DOCTYPE html>
<html>
<head>
    <title>Create Curriculum Price</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/School/css/InsertStyle.css">
</head>
<body>
    <div class="container">
        <h2>Create Curriculum Price</h2>
        <form method="POST" action="CurriculumPriceInsert.php">
            <label for="curriculum_id">Curriculum ID:</label>
            <select name="curriculum_id" id="curriculum_id" required>
                <option value="">Select Curriculum ID</option>
                <?php
                 $con = mysqli_connect("localhost", "root", "", "school_db");
                  if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                  }

                  $sql = "SELECT curriculum_id, curriculum_name FROM curriculums";
                  $result = $con->query($sql);

                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      echo "<option value='" . $row['curriculum_id'] . "'>" . $row['curriculum_id'] . " - " . $row['curriculum_name'] . "</option>";
                    }
                  }

                  $con->close();
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
            <label for="curriculum_price">Curriculum Price:</label>
            <input type="text" name="curriculum_price" id="curriculum_price" required>
            <br>
            <input type="submit" value="Insert Curriculum Price">
        </form>
        <br>
        <a class="btn btn-primary" href="CurriculumCRUD.php">Back</a>
    </div>
</body>
</html>