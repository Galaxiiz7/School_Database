<?php
$con=mysqli_connect("localhost","root","","school_db");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["curriculum_id"]) || !isset($_GET["school_year"])) {
        header("location:CurriculumCRUD.php");
        exit;
    }
    $curriculum_id = $_GET["curriculum_id"];
    $school_year = $_GET["school_year"];

    $sql = "SELECT * FROM curriculum_prices WHERE curriculum_id = '$curriculum_id' AND school_year = '$school_year';";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    if (!$row) {
        header("location:CurriculumCRUD.php");
        exit;
    }
    $curriculum_id = $row["curriculum_id"];
    $school_year = $row["school_year"];
    $curriculum_price = $row["curriculum_price"];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Curriculum Price</title>
    <link rel="stylesheet" type="text/css" href="/School/css/InsertStyle.css">
</head>
<body>
    <div class="container">
        <h2>Edit Curriculum Price</h2>
        <form method="POST" action="CurriculumEdit.php?curriculum_id=<?php echo $row['curriculum_id']; ?>&school_year=<?php echo $row['school_year']; ?>">
            <label for="curriculum_id">Curriculum ID:</label>
            <input type="text" name="curriculum_id" id="curriculum_id" value="<?php echo $curriculum_id; ?>" required readonly>
            <br>
            <label for="school_year">School Year:</label>
            <input type="text" name="school_year" id="school_year" value="<?php echo $school_year; ?>" required readonly>
            <br>
            <label for="curriculum_price">Curriculum Price:</label>
            <input type="text" name="curriculum_price" id="curriculum_price" value="<?php echo $curriculum_price; ?>" required>
            <br>
            <input type="submit" value="Edit">
        </form>
    </div>
</body>
</html>
