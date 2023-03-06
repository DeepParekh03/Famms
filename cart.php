<?php

include 'header.php';
include 'connect.php';

// add, remove, empty
if (!empty($_GET['action'])) {
    switch ($_GET['action']) {
        // add product to cart
        case 'add':
            if (!empty($_POST['quantity'])) {

                $id = $_GET['id'];
                $query = "SELECT * FROM products WHERE id='$id'" ;
                $result = mysqli_query($conn, $query);
                while ($product = mysqli_fetch_array($result)) {
                    $itemArray = [
                        $product['id'] => [
                            'name' => $product['head'],
                            'id' => $product['id'],
                            'quantity' => $_POST['quantity'],
                            'price' => $product['price'],
                            'image' => $product['image']

                            
                        ]
                    ];
                    if (isset($_SESSION['cart_item']) &&!empty($_SESSION['cart_item'])) {
                        if (in_array($product['id'], array_keys($_SESSION['cart_item']))) {
                            foreach ($_SESSION['cart_item'] as $key => $value) {
                                if ($product['id'] == $key) {
                                    if (empty($_SESSION['cart_item'][$key]["quantity"])) {
                                        $_SESSION['cart_item'][$key]['quantity'] = 0;
                                    }
                                    $_SESSION['cart_item'][$key]['quantity'] += $_POST['quantity'];
                                }
                            }
                        } else {
                            
                            $_SESSION['cart_item'] += $itemArray;
                        }
                    } else {
                        $_SESSION['cart_item'] = $itemArray;
                    }
                }
            }
            break;
        case 'remove':
            if (!empty($_SESSION['cart_item'])) {
                foreach ($_SESSION['cart_item'] as $key => $value) {
                    if ($_GET['id'] == $key) {
                        unset($_SESSION['cart_item'][$key]);
                    }
                    if (empty($_SESSION['cart_item'])) {
                        unset($_SESSION['cart_item']);
                    }
                }
            }
            break;
        case 'empty':
            unset($_SESSION['cart_item']);
            break;
    }
}


?>

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
<html lang="en">

<style>
hr.new4 {
  border: 1px solid red;
}

table td:nth-child(1){
    width: 170px;
}

 table td:nth-child(2){
    width: 300px;
 }
 table td:nth-child(3){
    width: 50px;
}
table td:nth-child(4){
    width: 50px;
}
table td:nth-child(5),
table td:nth-child(6){
    width: 100px;
}
table tbody img{
    width: 100px;
    height: 80px;
    object-fit: cover;
}
table ,tbody, tr,td{
    text-align: center;
    vertical-align: middle;
    border-collapse: collapse;
    background-color: white;
    color: black;
    padding: 20px , 0;
    border: 1px solid black;
}
table ,thead, tr,th{
      text-align: center;
    vertical-align: middle;
    background-color: orange;
    color: black;
    padding: 6px , 0;
    border: 1px solid black;
}

</style>
<body>
   

<div class="container py-5">
   
        <h1>Shopping Cart</h1>
        <hr class="new4">
        <div class="a-right">
        <a class="brand-text" href="cart.php?action=empty" style="color:#f44245 ">Empty Cart</a><br><br>
        </div>
    <div class="row">
        <?php
            $total_quantity = 0;
            $total_price = 0;
        ?>
        <table class="table">
            <thead>
            <tr>
                <th class="text-left">Image</th>
                <th class="text-left">Name</th>
  
                <th class="text-right">Quantity</th>
                <th class="text-right">Item price</th>
                <th class="text-right">Price</th>
                <th class="text-center">Remove</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_SESSION['cart_item']) && !empty($_SESSION['cart_item'])){
                foreach ($_SESSION['cart_item'] as $item) {
                    $item_price = $item['quantity'] * $item['price'];
                    ?>
                    <tr><center>
                        <td><?php echo '<img src="data:image/jpg;base64,'.base64_encode( $item['image'] ).'"alt="images" >';?></td>
                        <td class="text-left">
                            <?php echo $item['name'] ?>
                        </td>
                        <td class="text-center"><?php echo $item['quantity'] ?></td>
                        <td class="text-center">₹<?php echo number_format($item['price'], 2) ?></td>
                        <td class="text-center">₹<?php echo number_format($item_price, 2) ?></td>
                        <td class="text-center">
                            <a href="   cart.php?action=remove&id=<?= $item['id']; ?>" style="color: black;">X</a>
                        </td></center>
                    </tr>

                    <?php
                    $total_quantity += $item["quantity"];
                    $total_price += ($item["price"]*$item["quantity"]);
                }
                
            }

            if (isset($_SESSION['cart_item']) && !empty($_SESSION['cart_item'])){
                ?>
                <tr>
                    <td colspan="2" align="right">Total:</td>
                    <td align="right"><strong><?= $total_quantity ?></strong></td>
                    <td></td>
                    <td align="right"><strong>₹<?= number_format($total_price, 2); ?></strong></td>
                    <td></td>
                </tr>

            <?php }
            $_SESSION['total_price']=$total_price;

                ?>
            </tbody>
        </table>
        <br>
        <br>

<a class="brand-text" href="book_checkout.php" style="color:#f44245 ">Checkout</a><br><br>
    </div>



</body>
</html>

<?php
include 'footer.php';
?>