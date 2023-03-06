<?php
include 'header.php'; 
?>
<?php 
 include 'connect.php';
 if(isset($_GET['id'])){
  $id=mysqli_real_escape_string($conn,$_GET['id']);

  $sql="select * from products where id=$id";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  mysqli_close($conn);
 }

?>

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
<style>
  .grid-container {
    margin-left: 20px;
    display: grid;
    grid-template-columns: 330px 1fr;
    grid-gap: 5px;
}
  .grid-container2 {
    display: grid;
    grid-template-columns: 200px 100px;

    grid-gap: 400px;
}
#grid-container2 form input{
  background-color: white;
  border: none;
  color: #f44245;
  padding: 10px 22px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
  margin: 4px 2px;
  cursor: pointer;
}


</style>
<body>
 
<div class="grid-container">

    <div class="grid-child purple">
         <div class="outer">
        <?php echo '<img src="data:image/jpg;base64,'.base64_encode( $row['image'] ).'"alt="backpack images" style="width:300px; height:220px;"/>';?>
    
       
    </div>

    </div>

    <div class="grid-child green">
          <h1  ><?php echo $row['head'];?></h1>
<h3 >

<?php echo $row['details'];?><br><br>
</h3>
<h3 ><?php echo "Rs.".$row['price'];?></h3><br><br>
<div class="grid-container2">

   <div class="grid-child purple">
           <form action ="cart.php?action=add&id=<?php echo $row['id'];?>" method="post">
            Quantity:<input type="text" name="quantity" value="1" >
          
    </div>

    <div class="grid-child green">
        
        <input type="submit" value="Add to Cart" style="color: #f44245; font-size: 20px; background-color: white;">
    </div>
  
  
</div>

</div>
  
</div>
     
 <br>
 <br>
 <br>
 <br>
 <br>


<!-- listing-area Area End -->

</body>
<script src="js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
</html>
<?php
 include 'footer.php';
?>