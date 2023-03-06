<!doctype html>


<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Book HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="css/responsive.css" rel="stylesheet" />
   </head>
<?php
// session_start();
include 'header.php';
require_once 'connect.php';
$sql="select * from registration where id=".$_SESSION['id'];
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

if($_SESSION['total_price']!=null)
{
    
    $tax=0.18*$_SESSION['total_price'];
    $payable=$_SESSION['total_price']+$tax;
    $bill=$row['Wallet']-$payable;
    if($bill>=0)
    {
?>
        <h2> <?php echo "Total Price:".$_SESSION['total_price'];echo "<br>Taxable amount:".$tax; echo "<br>Payable amount:".$payable; ?><br>
        <form  method="post">
          <input type="button" value="Confirm Payment" onclick=
          'document.getElementById("here").innerHTML="<center><table><tr><th>Transaction Succesfull</th></tr><tr><th>Order Placed</th></tr><tr><th>Amount Debited:</th><td><?php echo $payable ?></td></tr><tr><th>Remaining Balance: </th><td><?php echo $bill ?> </td></tr></table></center><br><br>"'>
        </form>
          <section id=here>
      </section>
        <?php
                 $mysql="UPDATE registration SET Wallet='$bill' WHERE id= ".$_SESSION['id'];
                $result2=mysqli_query($conn,$mysql);
    }
   else
   {
    ?>
    <h3>Transaction Failed</h3>
    <?php
   }
}
?>
<?php
include 'footer.php';
?>