<?php
$con = mysqli_connect("localhost", "root", "", "school_db");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Write the SQL query to fetch the report data
$sql = "SELECT 
            teacher_learning_group AS learning_group,
            COUNT(teacher_id) AS teacher_count,
            SUM(teacher_salary) * 12 AS sum_salary
        FROM
            teachers
        GROUP BY
            teacher_learning_group";

$result = $con->query($sql);

// Generate HTML markup dynamically
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["learning_group"] . "</td>";
        echo "<td>" . $row["teacher_count"] . "</td>";
        echo "<td>" . $row["sum_salary"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>No data found.</td></tr>";
}

$con->close();
?>
