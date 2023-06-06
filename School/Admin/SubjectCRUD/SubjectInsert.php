<?php
$con = mysqli_connect("localhost", "root", "", "school_db");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subject_id = mysqli_real_escape_string($con, $_POST['subject_id']);
    $subject_name = mysqli_real_escape_string($con, $_POST['subject_name']);
    $school_year = mysqli_real_escape_string($con, $_POST['school_year']);
    $semester = mysqli_real_escape_string($con, $_POST['semester']);
    $credit = mysqli_real_escape_string($con, $_POST['credit']);
    $learning_group = mysqli_real_escape_string($con, $_POST['learning_group']);
    $teacher_ids = $_POST['teacher_id'];
    $classrooms = $_POST['classroom'];

    $insert_query = "INSERT INTO subjects (subject_id, school_year, semester, subject_name, learning_group, credit) 
                     VALUES ('$subject_id', '$school_year', '$semester', '$subject_name', '$learning_group', '$credit')";

    if (mysqli_query($con, $insert_query)) {
        $classrooms = $_POST['classroom'];
        foreach ($classrooms as $classroom) {
            $classroom = mysqli_real_escape_string($con, $classroom);
            $insert_classroom_subject_query = "INSERT INTO classroom_subjects (classroom, school_year, semester, subject_id) 
            VALUES ('$classroom', '$school_year', '$semester', '$subject_id')";
            mysqli_query($con, $insert_classroom_subject_query);

            $student_ids_query = "SELECT student_id FROM student_classrooms WHERE school_year = '$school_year' AND student_classroom = '$classroom'";
            $student_ids_result = mysqli_query($con, $student_ids_query);

            if ($student_ids_result) {
                while ($row = mysqli_fetch_assoc($student_ids_result)) {
                    $student_id = $row['student_id'];

                    // Check if the subject is already added for the student
                    $existing_subject_query = "SELECT * FROM student_subjects WHERE student_id = '$student_id' AND subject_id = '$subject_id' AND school_year = '$school_year' AND semester = '$semester'";
                    $existing_subject_result = mysqli_query($con, $existing_subject_query);

                    if (mysqli_num_rows($existing_subject_result) === 0) {
                        // Insert the subject for the student
                        $insert_student_subject_query = "INSERT INTO student_subjects (student_id, subject_id, school_year, semester) 
                                                         VALUES ('$student_id', '$subject_id', '$school_year', '$semester')";

                        mysqli_query($con, $insert_student_subject_query);
                    }
                }
            }
        }
            
        // Insert teachers into teacher_subjects table
        foreach ($teacher_ids as $teacher_id) {
            $teacher_id = mysqli_real_escape_string($con, $teacher_id);

            $insert_teacher_subject_query = "INSERT INTO teacher_subjects (subject_id, school_year, semester, teacher_id) 
                                            VALUES ('$subject_id', '$school_year', '$semester', '$teacher_id')";
            mysqli_query($con, $insert_teacher_subject_query);
        }

        echo "<script>alert('Success'); window.location.href = 'SubjectCRUD.php';</script>";
    } else {
        echo "Error inserting subject: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>
<form name="inpfrm" method="post" action="SubjectCRUD.php">
<table border='0' align='center' class='table table-hover'>
<tr>
    <input name="reset" type="submit" id="Back" value="Back"/></td>
</tr>
</table>
