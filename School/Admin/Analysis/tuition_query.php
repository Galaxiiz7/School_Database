<?php
$con = mysqli_connect("localhost", "root", "", "school_db");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Retrieve selected year and semester from form submission
if(isset($_POST['year']) && isset($_POST['semester'])){
    $selectedYear = $_POST['year'];
    $selectedSemester = $_POST['semester'];
    
    // Write the SQL query to fetch the report data
    $sql = "SELECT 
                sp.school_year,
                sp.semester,
                c.curriculum_name AS curriculum,
                SUM(CASE WHEN sp.paid = 1 THEN 1 ELSE 0 END) AS count_students_paid,
                SUM(CASE WHEN sp.paid = 1 THEN cp.curriculum_price ELSE 0 END) AS total_amount_paid,
                SUM(CASE WHEN sp.paid = 0 THEN 1 ELSE 0 END) AS count_students_not_paid,
                SUM(CASE WHEN sp.paid = 0 THEN cp.curriculum_price ELSE 0 END) AS total_amount_not_paid
            FROM
                student_payments sp
                JOIN students s ON sp.student_id = s.student_id
                JOIN curriculums c ON s.student_curriculum_id = c.curriculum_id
                JOIN curriculum_prices cp ON c.curriculum_id = cp.curriculum_id AND sp.school_year = cp.school_year
            WHERE
                sp.school_year = '$selectedYear' AND sp.semester = '$selectedSemester'
            GROUP BY
                sp.school_year,
                sp.semester,
                c.curriculum_id";

    $result = $con->query($sql);

    // Generate HTML markup dynamically
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["school_year"] . "</td>";
            echo "<td>" . $row["semester"] . "</td>";
            echo "<td>" . $row["curriculum"] . "</td>";
            echo "<td>" . $row["count_students_paid"] . "</td>";
            echo "<td>" . $row["total_amount_paid"] . "</td>";
            echo "<td>" . $row["count_students_not_paid"] . "</td>";
            echo "<td>" . $row["total_amount_not_paid"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No data found.</td></tr>";
    }

    $con->close();
}
?>
