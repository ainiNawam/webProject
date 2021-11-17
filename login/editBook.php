
<?php
include 'db_con.php';



$query = "SELECT * from book where book_id='".$book_id."'"; 
$result = mysqli_query($conn, $query) or die ( mysqli_error($conn));
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">

<h1>Update Book</h1>

<div>
<form name="form" method="post" action="updateBook.php"> 
<input type="hidden" name="new" value="1" />
<input name="book_id" type="hidden" value="<?php echo $row['book_id'];?>" />
<p><input type="text" name="book_title" value="<?php echo $row['book_title'];?>" /></p>
<p><input type="text" name="book_category" value="<?php echo $row['book_category'];?>" /></p>
<p><input type="text" name="book_author" value="<?php echo $row['book_author'];?>" /></p>
<p><input type="text" name="qty" value="<?php echo $row['qty'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>

</div>
</div>
</body>
</html>