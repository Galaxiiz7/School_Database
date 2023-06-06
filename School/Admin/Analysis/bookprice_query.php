<?php
$con = mysqli_connect("localhost", "root", "", "school_db");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Retrieve selected year, semester, and classroom from form submission
if (isset($_POST['year']) && isset($_POST['semester']) && isset($_POST['classroom'])) {
    $selectedYear = $_POST['year'];
    $selectedSemester = $_POST['semester'];
    $selectedClassroom = $_POST['classroom'];
    
    // Write the SQL query to fetch the report data
    $sql = "SELECT 
                cl.curriculum_id,
                bs.school_year,
                bs.semester,
                COUNT(DISTINCT bs.book_id) AS book_count,
                ROUND(SUM(b.book_price), 2) AS book_price_per_student,
                ROUND(SUM(b.book_price) * sc.student_count, 2) AS sum_book_price
            FROM classrooms cl
            JOIN classroom_subjects cs ON cl.classroom = cs.classroom AND cl.classroom = '$selectedClassroom'
            JOIN book_subjects bs ON cs.subject_id = bs.subject_id AND bs.school_year = '$selectedYear' AND bs.semester = '$selectedSemester'
            JOIN books b ON bs.book_id = b.book_id
            JOIN (
                SELECT
                    sc.student_classroom,
                    sc.school_year,
                    COUNT(*) AS student_count
                FROM student_classrooms sc
                WHERE sc.student_classroom = '$selectedClassroom' AND sc.school_year = '$selectedYear'
                GROUP BY sc.student_classroom, sc.school_year
            ) sc ON cl.classroom = sc.student_classroom AND bs.school_year = sc.school_year";

    $result = $con->query($sql);

    // Generate HTML markup dynamically
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["curriculum_id"] . "</td>";
            echo "<td>" . $row["school_year"] . "</td>";
            echo "<td>" . $row["semester"] . "</td>";
            echo "<td>" . $row["book_count"] . "</td>";
            echo "<td>" . $row["book_price_per_student"] . "</td>";
            echo "<td>" . $row["sum_book_price"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No data found.</td></tr>";
    }

    $con->close();
}
?>
