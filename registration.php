 
<?php
$servername="localhost";
$username="root";
$password="";
$database="books";

$conn=new mysqli($servername,$username,$password,$database);
if($conn->connect_error){
	die("Connection Failed: ".$conn->connect_error);
}
echo "Connected successfully";
$username=$_POST['name'];
if($_POST['pass']==$_POST['c_pass']){
	$password=$_POST['pass'];
}else{
        echo "Re-enter password";
}
$email=$_POST['email'];
$phone=$_POST['p_no'];

$query= "INSERT into registration (name,email,phone_no,password) values ('$username','$email','$phone','$password')";

        $result   = mysqli_query($conn, $query);
        if($result){
        	header("Location: login_signup.html");

        }
        else
        {
        	echo "Incoorect query"; 
        }


?>

