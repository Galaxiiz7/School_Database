<?php
$con=mysqli_connect("localhost","root","","school_db");
// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else{
	//esc//ape variables for security
	$book_id = mysqli_real_escape_string($con, $_POST['book_id']);
	$book_name = mysqli_real_escape_string($con, $_POST['book_name']);
	$author = mysqli_real_escape_string($con, $_POST['author']);
	$book_price = mysqli_real_escape_string($con, $_POST['book_price']);

	$sql="INSERT INTO books
    VALUES ('$book_id','$book_name', '$author', '$book_price')";
	if (!mysqli_query($con,$sql)) {
	die('Error: ' . mysqli_error($con));
	}
	echo "<script>alert('Success'); window.location.href = 'BookCRUD.php';</script>"; ;
}

mysqli_close($con);
?>

<form name="inpfrm" method="post" action="BookCRUD.php">
<table border='0' align='center' class='table table-hover'>
<tr>
    <input name="reset" type="submit" id="Back" value="Back"/></td>
</tr>
</table>