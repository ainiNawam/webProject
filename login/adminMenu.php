<?php 
session_start();

if(empty($_SESSION['uname'])):
 header('Location:login.html');
endif;
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="project.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>


.header {
  background-image:url('lib.jpg') ;
  padding: 30px;
  text-align: center;
}

#navbar {
  overflow: hidden;
  background-color: #333;
}

#navbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

#navbar a:hover, .dropdown:hover .dropbtn {
  background-color: #ddd;
  color: black;
}

#navbar a.active {
  background-color: #aa3904;
  color: white;
}

.content {
  padding: 16px;
  background-color: rgb(223, 171, 147);
}

.sticky {
  position: fixed;
  top: 0;
  width: 100%;
}

.sticky + .content {
  padding-top: 60px;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: rgba(253, 249, 246, 0.602);
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #b8481c;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
</head>
<body>

<div class="header">
  <h2>SN eLIBRARY</h2>
  <p>Welcome to Virtual Library</p>
</div>

<div id="navbar">
  <a href="adminMenu.php"><i class="fa fa-fw fa-home"></i> Home</a> 
  <a href="searchBook.html"><i class="fa fa-fw fa-search"></i> Search Book</a> 
  <a href="snbook.php"><i class="fa fa-fw fa-envelope"></i> Add New Book</a> 
  <a href="logout.php"><i class="fa fa-fw fa-user"></i> logout</a>
</div>
<div class="content">
<p>Account for</p>
  <?php echo $_SESSION['uname']?>

  <h3 align="center">Books List</h3>
  <script>
      // The function below will start the confirmation dialog
      function deleteProfile(i) {

    if (confirm("Do you really want to delete the book?")) {
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
?>
</div>
<script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
</script>

</body>
</html>
