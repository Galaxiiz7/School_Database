<!DOCTYPE html>
<html>
<head>
    <title>Add new book</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="ex.css">
</head>
<body>
    <section>
    <div class="container my-5">
        <h2>List of book</h2>
        <a class="btn btn-primary" href="BookInsertForm.php" role="button">New book</a>
        <br>

        <table class="table">
        <thead>
                <tr>
                    <th>book ID</th>
                    <th>book Name</th>
                    <th>Author</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $con = mysqli_connect("localhost", "root", "", "school_db");
                if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
                $sql = "SELECT books.* FROM books";
               $result = $con->query($sql);

                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }

                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>$row[book_id]</td>
                        <td>$row[book_name]</td>
                        <td>$row[author]</td>
                        <td>$row[book_price]</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='BookEditForm.php?book_id=$row[book_id]'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='BookDeleteForm.php?book_id=$row[book_id]'>Delete</a>
                        </td>
                    </tr>";
                }
                mysqli_close($con);
                ?>
            </tbody>
        </table>
    </div>
    <section>
</body>
<div class="container my-5">
    <a href="../MainPage.php" class="btn btn-primary">Back to main page</a>
</div>
</html>
