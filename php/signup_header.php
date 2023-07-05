<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

   <div class="header-1">
      <div class="flex">
         <div class="share">
            <a href="#" style="text-decoration: none;" class="fab fa-facebook-f"></a>
            <a href="#" style="text-decoration: none;" class="fab fa-twitter"></a>
            <a href="#" style="text-decoration: none;" class="fab fa-instagram"></a>
            <a href="#" style="text-decoration: none;" class="fab fa-linkedin"></a>
         </div>
         <p> New <a href="login.php" style="text-decoration: none;">Login</a> | <a href="register.php" style="text-decoration: none;">Register</a> </p>
      </div>
   </div>

   <div class="header-2">
      <div class="flex">
         <a href="home.php" style="text-decoration: none;" class="logo">Online<span>Dokan</span></a>

         <nav class="navbar" >
            <a href="home.php" style="text-decoration: none;">Home</a>
            <a href="about.php" style="text-decoration: none;">About</a>
            <a href="shop.php" style="text-decoration: none;">Shop</a>
            <a href="contact.php" style="text-decoration: none;">Contact</a>
            <a href="orders.php" style="text-decoration: none;">Orders</a>
         </nav>

         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <a href="search_page.php" style="text-decoration: none;" class="fas fa-search"></a>
            <!-- <div id="user-btn" class="fas fa-user"></div> -->
            <!-- <?php
               $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
               $cart_rows_number = mysqli_num_rows($select_cart_number); 
            ?> -->
            <a href="cart.php" style="text-decoration: none;"> <i class="fas fa-shopping-cart"></i> <span>(<?php echo $cart_rows_number; ?>)</span> </a>
         </div>

         <!-- <div class="user-box">
            <?php
            $select_profile = mysqli_query($conn, "SELECT * FROM `users` where email='?'") or die('query failed');

            if(mysqli_num_rows($select_profile) > 0){
         
               $row2 = mysqli_fetch_assoc($select_profile);
            ?>
            <p>Username : <span><?php echo $_SESSION['user_fname']." ".$_SESSION['user_lname']; ?></span></p>
            <p>E-mail : <span><?php echo $_SESSION['user_email']; ?></span></p>
            <a href="logout.php" style="text-decoration: none;" class="delete-btn">Logout</a>
         <?php   
         } else{
         ?>
         <p>Please Login first!</p>
         <p> New <a href="login.php" style="text-decoration: none;">Login</a> | <a href="register.php" style="text-decoration: none;">Register</a> </p>
         <?php
         }
         ?> -->
         
         </div>
      </div>
   </div>

</header>