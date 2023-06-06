<?php
$con = mysqli_connect("localhost", "root", "", "school_db");
$book_id = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["book_id"])) {
        header("location: bookCRUD.php");
        exit;
    }
    $book_id = $_GET["book_id"];

    $sql = "SELECT * FROM books WHERE book_id = '$book_id';";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    if (!$row) {
        header("location: bookCRUD.php");
        exit;
    }
    $book_id = $row["book_id"];
    $book_name = $row["book_name"];
    $author = $row["author"];
    $book_price = $row["book_price"];
} else {
    $book_id = $_POST["book_id"];
    $book_name = $_POST["book_name"];
    $author = $_POST["author"];
    $book_price = $_POST["book_price"];

    do {
        $sql = "UPDATE books SET book_name = '$book_name', author = '$author', book_price = '$book_price' WHERE book_id = '$book_id';";
        $result = $con->query($sql);
        if (!$result) {
            $errorMessage = "Invalid query: " . $con->error;
            break;
        }

        $successMessage = "Book updated correctly";
        header("location: bookCRUD.php");
        exit;
    } while (false);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/School/css/InsertStyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Edit Book</h2>
        <form method="POST">
            <label for="book_id">Book ID:</label>
            <input type="text" name="book_id" id="book_id" value="<?php echo $book_id; ?>" required readonly>
            <br>
            <label for="book_name">Book Name:</label>
            <input type="text" name="book_name" id="book_name" value="<?php echo $book_name; ?>" required>
            <br>
            <label for="author">Author:</label>
            <input type="text" name="author" id="author" value="<?php echo $author; ?>" required>
            <br>
            <label for="book_price">Price:</label>
            <input type="text" name="book_price" id="book_price" value="<?php echo $book_price; ?>" required>
            <br>
            <input type="submit" value="Edit">
        </form>
    </div>
</body>
</html>