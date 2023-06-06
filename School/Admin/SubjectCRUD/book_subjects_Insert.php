<?php
$con = mysqli_connect("localhost", "root", "", "school_db");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $book_id = mysqli_real_escape_string($con, $_POST['book_id']);
    $subject_id = mysqli_real_escape_string($con, $_POST['subject_id']);
    $school_year = mysqli_real_escape_string($con, $_POST['school_year']);
    $semester = mysqli_real_escape_string($con, $_POST['semester']);

    $insert_query = "INSERT INTO book_subjects (book_id, subject_id, school_year, semester) 
                     VALUES ('$book_id', '$subject_id', '$school_year', '$semester')";

    if (mysqli_query($con, $insert_query)) {
        echo "<script>alert('Success'); window.location.href = 'SubjectCRUD.php';</script>";;
    } else {
        echo "Error inserting book subject: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>

<form name="inpfrm" method="post" action="book_subjects_InsertForm.php">
<table border='0' align='center' class='table table-hover'>
<tr>
    <input name="reset" type="submit" id="Back" value="Back"/></td>
</tr>
</table>
