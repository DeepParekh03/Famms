<?php
$servername = "localhost";
$username = "root"; // username
$password = ""; // password
$database="books";
// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error)  //if (!$conn) {}
{
  die("Connection failed: " . $conn->connect_error);
}

/*$conn->close();
// OR mysqli_close($conn);*/
?>