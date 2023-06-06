<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "school_db");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_id = mysqli_real_escape_string($con, $_POST["student_id"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);

    $sql = "SELECT * FROM students WHERE student_id = '$student_id' AND password ='$password'";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();

    if ($row) {
        // Successful login
        // Set the student ID in the session
        $_SESSION['student_id'] = $student_id;

        // Redirect to the desired page or perform any other actions
        header("Location: /School/Student/StudentInfo.php");
        exit();
    } else {
        // Invalid login credentials
        // Display an error message or redirect to the login page
        echo '<script>alert("Invalid login credentials!");
        window.location.href="StudentLoginForm.php";
        </script>';
       ;
    }
}
?>