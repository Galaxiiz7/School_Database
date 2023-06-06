<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "school_db");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $teacher_id = mysqli_real_escape_string($con, $_POST["teacher_id"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);

    $sql = "SELECT * FROM teachers WHERE teacher_id = '$teacher_id' AND password ='$password'";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();

    if ($row) {
        // Successful login
        // Set the teacher ID in the session
        $_SESSION['teacher_id'] = $teacher_id;

        // Redirect to the desired page or perform any other actions
        header("Location: /School/Teacher/TeacherInfo.php");
        exit();
    } else {
        // Invalid login credentials
        // Display an error message or redirect to the login page
        echo '<script>alert("Invalid login credentials!");
        window.location.href="TeacherLoginForm.php";
        </script>';
       ;
    }
}
?>