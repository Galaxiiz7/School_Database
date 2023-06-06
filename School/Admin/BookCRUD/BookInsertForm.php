<!DOCTYPE html>
<html>
<head>
    <title>Add new book</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/School/css/InsertStyle.css">
</head>
<body>
    <div class="container">
        <h2>Create New book</h2>
        <form method="POST" action="BookInsert.php">
            <label for="book_id">Book ID:</label>
            <input type="text" name="book_id" id="book_id" required>
            <br>
            <label for="book_name">Book Name:</label>
            <input type="text" name="book_name" id="book_name" required>
            <br>
            <label for="author">author:</label>
            <input type="text" name="author" id="author" required>
            <br>
            <label for="book_price">Price:</label>
            <input type="text" name="book_price" id="book_price" required>
            <br>
            <input type="submit" value="Register">
        </form>
    </div>
</body>
</html>