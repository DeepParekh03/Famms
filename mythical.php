<?php
include 'header.php';
?>

<!DOCTYPE html>
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


   <!-- product section -->
      <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Mythical <span>Category</span>
               </h2>
            </div>
            <div class="row">
               <?php
                     include 'connect.php';
                            $query = "select * from products WHERE category='Mythical'";
                            $query_run=mysqli_query($conn,$query);
                            $check=mysqli_num_rows($query_run)>0;
                            if($check)
                            {
                                while($row=mysqli_fetch_assoc($query_run)){                     
                     ?>
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box" style="height: 35rem;" >
                     <div class="option_container">
                        <div class="options">
                           <a href="cart.html" class="option1">
                           Add to cart
                           </a>
                           
                        </div>
                     </div>
                     
                     <div class="img-box">
                        <?php echo '<center><img src="data:image/jpg;base64,'.base64_encode( $row['image'] ).'"alt="books images" style="width:180px; height:220px;">';?>
                     </div>
                     <div class="detail-box" >
                        <h3>
                           <?php 
                        echo $row['head'];
                        ?>
                        </h3>
                        <br>
                        <h5>
                           <?php 
                        echo "Rs.".$row['price'];
                        ?>
                        </h5>
                     </div>
                  </div>
               </div>
               <?php
            }
         }
            else{
               echo 'no products';
            }
               ?>
               
         </div>
      </div>

      </section>
      <!-- end product section -->

   
      
<?php
include 'footer.php';
?>
      <!-- jQery -->
      <script src="js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
   </body>
</html>