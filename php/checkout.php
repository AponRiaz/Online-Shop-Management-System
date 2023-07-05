<?php

include 'connection.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['order_btn'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $number = $_POST['number'];
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $method = mysqli_real_escape_string($conn, $_POST['method']);
   $address = mysqli_real_escape_string($conn, 'flat no. '. $_POST['flat'].', '. $_POST['street'].', '. $_POST['city'].', '. $_POST['country'].' - '. $_POST['pin_code']);
   $placed_on = date('d-M-Y');

   $cart_total = 0;
   $cart_products[] = '';

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   if(mysqli_num_rows($cart_query) > 0){
      while($cart_item = mysqli_fetch_assoc($cart_query)){
         $cart_products[] = $cart_item['name'].' ('.$cart_item['quantity'].') ';
         $sub_total = ($cart_item['price'] * $cart_item['quantity']);
         $cart_total += $sub_total;
      }
   }

   $total_products = implode(', ',$cart_products);

   $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND email = '$email' AND method = '$method' AND address = '$address' AND total_products = '$total_products' AND total_price = '$cart_total'") or die('query failed');

   if($cart_total == 0){
      $message[] = 'Your cart is empty';
   }else{
      if(mysqli_num_rows($order_query) > 0){
         $message[] = 'Order already placed!'; 
      }else{
         mysqli_query($conn, "INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price, placed_on) VALUES('$user_id', '$name', '$number', '$email', '$method', '$address', '$total_products', '$cart_total', '$placed_on')") or die('query failed');
         $message[] = 'Order placed successfully!';
         mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      }
   }
   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>Checkout</h3>
   <p> <a href="home.php" style="text-decoration: none;">Home</a> / Checkout </p>
</div>

<section class="display-order">

   <?php  
      $grand_total = 0;
      $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_cart) > 0){
         while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total += $total_price;
   ?>
   <p> <?php echo $fetch_cart['name']; ?> <span>(<?php echo '$'.$fetch_cart['price'].'/-'.' x '. $fetch_cart['quantity']; ?>)</span> </p>
   <?php
      }
   }else{
      echo '<p class="empty">Your cart is empty</p>';
   }
   ?>
   <div class="grand-total"> Grand total : <span>$<?php echo $grand_total; ?>/-</span> </div>

</section>

<section class="checkout">

   <form action="" method="post" class="checkoutform" id="checkoutform" autocomplete="off" onsubmit="return checkoutvalidate()">
      <h3>Place your order</h3>
      <div class="flex">
         <div class="inputBox">
            <span>Your name :</span>
            <input type="text" name="name" id="name" placeholder="enter your name"><div id="nam"></div>
         </div>
         <div class="inputBox">
            <span>Your phone number :</span>
            <input type="number" name="number" id="number" placeholder="enter your number"><div id="pnum"></div>
         </div>
         <div class="inputBox">
            <span>Your E-mail :</span>
            <input type="email" name="email" id="email" placeholder="enter your email"><div id="checkoutMail"></div>
         </div>
         <div class="inputBox">
            <span>Payment method :</span>
            <select name="method" id="method">
               <option value="cash on delivery">Cash on delivery</option>
               <option value="credit card">Credit card</option>
               <option value="paypal">Paypal</option>
               <option value="paytm">Paytm</option>
            </select><div id="pmethod"></div>
         </div>
         <div class="inputBox">
            <span>Address(House no) :</span>
            <input type="number" min="0" name="flat" id="flat" placeholder="House no"><div id="checkoutflat"></div>
         </div>
         <div class="inputBox">
            <span>Address(Road no) :</span>
            <input type="text" name="street" id="street" placeholder="Road no"><div id="checkoutstreet"></div>
         </div>
         <div class="inputBox">
            <span>City :</span>
            <input type="text" name="city" id="city" placeholder="city"><div id="checkoutcity"></div>
         </div>
         
         <div class="inputBox">
            <span>Country :</span>
            <input type="text" name="country" id="country" placeholder="Bangladesh"><div id="checkoutcountry"></div>
         </div>
         <div class="inputBox">
            <span>Post code :</span>
            <input type="number" min="0" name="pin_code" id="pin_code" placeholder="123456"><div id="checkoutpin"></div>
         </div>
      </div>
      <input type="submit" value="Order now" class="btn" name="order_btn">
   </form>

</section>




<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="../js/script.js"></script>

</body>
</html>