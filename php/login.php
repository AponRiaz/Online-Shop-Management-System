<?php

include 'connection.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$password'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){

      $row = mysqli_fetch_assoc($select_users);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_fname'] = $row['fname'];
         $_SESSION['admin_lname'] = $row['lname'];
         $_SESSION['admin_email'] = $row['email'];
         $_SESSION['admin_pnumber'] = $row['pnumber'];
         $_SESSION['admin_address'] = $row['address'];
         $_SESSION['admin_id'] = $row['id'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_fname'] = $row['fname'];
         $_SESSION['user_lname'] = $row['lname'];
         $_SESSION['user_email'] = $row['email'];
         $_SESSION['user_pnumber'] = $row['pnumber'];
         $_SESSION['user_address'] = $row['address'];
         $_SESSION['user_id'] = $row['id'];
         header('location:home.php');

      }elseif($row['user_type'] == 'seller'){

        $_SESSION['seller_fname'] = $row['fname'];
         $_SESSION['seller_lname'] = $row['lname'];
         $_SESSION['seller_email'] = $row['email'];
         $_SESSION['seller_pnumber'] = $row['pnumber'];
         $_SESSION['seller_address'] = $row['address'];
         $_SESSION['seller_id'] = $row['id'];
         header('location:seller_page.php');

      }

      elseif($row['user_type'] == 'manager'){

         $_SESSION['manager_fname'] = $row['fname'];
          $_SESSION['manager_lname'] = $row['lname'];
          $_SESSION['manager_email'] = $row['email'];
          $_SESSION['manager_pnumber'] = $row['pnumber'];
          $_SESSION['manager_address'] = $row['address'];
          $_SESSION['manager_id'] = $row['id'];
          header('location:manager_page.php');
 
       }

   }else{
      $message[] = 'incorrect email or password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">

</head>
<body>

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
   <?php include 'signup_header.php'; ?>
<div class="form-container">

   <form action="" method="post" class="Loginform" id="Loginform" autocomplete="off" onsubmit="return loginvalidate()">
      <h3>login now</h3>
      <input type="email" name="email" placeholder="enter your email" id="email" class="box"><div id="loginEmail"></div>
      <input type="password" name="password" placeholder="enter your password" id="password" class="box"><div id="loginPass"></div>
      <input type="submit" name="submit" value="login now" class="btn">
      <p>Don't have an account? <a href="register.php">Register now</a></p>
   </form>

</div>
<script src="../js/script.js"></script>
<?php include 'footer.php'; ?>

</body>
</html>