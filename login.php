<?php
$servername="localhost";
$username="root";
$password="";
$database="books";

session_start();

$conn=new mysqli($servername,$username,$password,$database);
if($conn->connect_error){
	die("Connection Failed: ".$conn->connect_error);
}
echo "Connected successfully";
$user=$_POST['email'];
$pass=$_POST['password'];
	$sql="SELECT * FROM registration where email='$user' and password='$pass'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
          $_SESSION['id']=$row['id'];
          $_SESSION['email']=$row['email'];
         $_SESSION['username']=$row['name'];

         header("location: index.php");
      }else{
		
    $message = 'Wrong Email or Password';

    echo "<SCRIPT> 
        alert('$message')
        window.location.replace('login_signup.html');
    </SCRIPT>";
    mysql_close();

		
	}
?>