<html>
<head>
  <title>Manage Book</title>
</head>

<body style="background-color: burlywood; padding: 150px;">

  <h3 align="center">Books List</h3>
  <script>
      // The function below will start the confirmation dialog
      function deleteProfile(i) {

    if (confirm("Do you really want to delete your profile?")) {
        location.href = 'deleteBook.php?book_id=+i';
    }
</script>
<?php
  include 'db_con.php';

  //create and execute query
  $sql = "SELECT * FROM book";
  $result = $conn->query($sql);

  //check if records were returned
  if ($result->num_rows > 0) {

     //create a table to display the record
     echo '<table cellpadding=10 cellspacing=0 border=1 align="center">';
     echo '<td align="center"><b>No </b></td>
     <td align="center"><b>Book Title</b></td>
     <td align="center"><b>Category</b></td>
     <td align="center"><b>Author</b></td>
     <td align="center"><b>Date Published</b></td>
     <td align="center"><b>Available</b></td>
     <td align="center"><b>Action</b></td></tr>';
     
     // output data of each row
     while($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td align="center">'.$row["book_id"].'</td>';
        echo '<td align="center">'.$row["book_title"].'</td>';
        echo '<td align="center">'.$row["book_category"].'</td>';
        echo '<td align="center">'.$row["book_author"].'</td>';
        echo '<td align="center">'.$row["date_publish"].'</td>';
        echo '<td align="center">'.$row["qty"].'</td>';
        ?>
        <td align="center" ><a href="deleteBook.php?book_id=<?php echo $row["book_id"];?>" onclick="return confirm('Are sure to delete data?')">REMOVE</a></td>
        <td><a href="editBook.php?book_id=<?php echo $row["book_id"];?>" onclick="return confirm('Are sure to update data?')">UPDATE</a></td>
       <?php
        echo '</tr>';
     }
  } 
  else {
    echo "0 results";  //if no record found in the database
  }

  //close connection 
  $conn->close();
  echo '<p><a href="adminMenu.php">Back to Main Menu</a></p>';
?>

</body>
</html>