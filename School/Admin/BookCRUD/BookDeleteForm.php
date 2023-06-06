<?php
if(isset($_GET['book_id']))
{
    $con=mysqli_connect("localhost","root","","school_db");
    // Check connection
    if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $student_id = $_GET["book_id"];
    $sql = "DELETE FROM books WHERE book_id = $student_id;";
    $con->query($sql);
}

header("location:BookCRUD.php");
exit;
?>