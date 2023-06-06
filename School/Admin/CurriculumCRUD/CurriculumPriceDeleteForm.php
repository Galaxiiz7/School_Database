<?php
if(isset($_GET['curriculum_id'])) {
    $con = mysqli_connect("localhost", "root", "", "school_db");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    $curriculum_id = $_GET["curriculum_id"];
    $school_year = $_GET["school_year"];
    
    $sql = "DELETE FROM curriculum_prices WHERE curriculum_id = '$curriculum_id' AND school_year = $school_year";
    $con->query($sql);
}

header("location:CurriculumCRUD.php");
exit;
?>
