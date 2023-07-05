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

   <div class="flex">

      <a href="seller_page.php" class="logo">Seller<span>Dashboard</span></a>

      <nav class="navbar">
         <a href="seller_page.php">Home</a>
         <a href="seller_product.php">Products</a>
         <a href="seller_orders.php">Orders</a>
         <!-- <a href="admin_users.php">Users</a> -->
         <a href="seller_contacts.php">Messages</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="account-box">
         <p>Username : <span><?php echo $_SESSION['seller_fname']." ".$_SESSION['seller_lname']; ?></span></p>
         <p>Email : <span><?php echo $_SESSION['seller_email']; ?></span></p>
         <a href="logout.php" class="delete-btn">Logout</a>
         <div>New <a href="login.php">Login</a> | <a href="register.php">Register</a></div>
      </div>

   </div>

</header>