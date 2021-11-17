<?php
session_start();

// Code to connect to database
include 'db_con.php';

// Define $myusername and $mypassword
$uname=$_POST['uname'];
$psw=$_POST['psw'];

$sql = "SELECT uname, psw FROM user WHERE uname='$uname' and psw='$psw'";
$result = $conn->query($sql);

$row=mysqli_fetch_array($result);


// Mysql_num_row is counting table row
if ($result->num_rows > 0) 
{
    $_SESSION['uname']=$row['uname'];

    //redirect to file "home.php"
    header("location:page.php");
}
else 
{
    echo "<p>Wrong Username or Password. Please try again.</p>";
}

$sql2 = "SELECT uname, psw FROM admin WHERE uname='$uname' and psw='$psw'";
$result = $conn->query($sql2);

$row=mysqli_fetch_array($result);


// Mysql_num_row is counting table row
if ($result->num_rows > 0) 
{
    $_SESSION['uname']=$row['uname'];

    //redirect to file "home.php"
    header("location:adminMenu.php");
}
else 
{
    echo "<p>Wrong Username or Password. Please try again.</p>";
}
$conn->close();
?>