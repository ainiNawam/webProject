<html>
<head>
  <title>SN eLIBRARY</title>
</head>
<body>

<?php
    include 'db_con.php';

    $book_id=$_REQUEST['book_id'];
  
    //get input value
  // $adName=$_POST['advisor_name'];

  // sql to delete a record
  $sql = "DELETE FROM book WHERE `book_id` = '$_REQUEST[book_id]'";
 

  if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
  } 
  else {
    echo "Error deleting record: " . $conn->error;
  }

  //close connection  
  $conn->close();
  echo '<p><a href="adminMenu.php">Back</a></p>';
?>
</body> 
</html>