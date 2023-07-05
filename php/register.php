<?php

include 'connection.php';

if(isset($_POST['submit'])){
    $fname = mysqli_real_escape_string($conn,$_POST['fname']);
    $lname = mysqli_real_escape_string($conn,$_POST['lname']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pnumber = mysqli_real_escape_string($conn,$_POST['pnumber']);
    $address = mysqli_real_escape_string($conn,$_POST['address']);
    $password = mysqli_real_escape_string($conn,md5($_POST['password']));
    $cpassword = mysqli_real_escape_string($conn,md5($_POST['cpassword']));
    $user_type = $_POST['user_type'];

    $select_users = mysqli_query($conn,"SELECT * FROM users WHERE email = '$email' AND password = '$password'") or die('query failed');

    if(mysqli_num_rows($select_users) > 0){
        $message[] = 'User already exist!';
    }
    else{
        if($password!=$cpassword){
            $message[] = 'Confirm password does not matched!*';
        }
        else{
            mysqli_query($conn,"INSERT INTO users(fname,lname,email,pnumber,address,password,user_type) VALUES('$fname','$lname','$email','$pnumber','$address','$password','$user_type')") or die('query failed');

            // header('location:login.php');
            $message[] = 'Registered successfully';  
        }
    }
    
    header('location:login.php');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- link for font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    <!-- link for css file -->
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>



<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message">
      <span>'.$message.'</span>
      <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
   </div>';
   }
}
?>
<?php include 'signup_header.php'; ?>
    <div class="form-container">
    

        <form action="" method="POST" class="form" id="form" autocomplete="off" onsubmit="return validate()">
        <h3>Register Now</h3>
               
            <div class="form-control">
                <input type="text" name="fname" id="fname" maxlength="20" placeholder = "Enter your first name" class="box"></div><div id="p"></div>
                <!-- <i class ="fas fa-check-circle"></i>
                <i class ="fas fa-exclamation-circle"></i>
                <small>Error message</small> -->
              

            <div class="form-control">
                <input type="text" name="lname" maxlength="20" placeholder = "Enter your last name" id="lname" class="box"><div id="a"></div>
                <!-- <i class ="fas fa-check-circle"></i>
                <i class ="fas fa-exclamation-circle"></i>
                <small>Error message</small>  -->
            </div>    

        
            <div class="form-control">
                <input type="email" name="email" maxlength="100" placeholder = "Enter your email address" class = "box" id="email"><div id="r"></div>
                <!-- <i class ="fas fa-check-circle"></i>
                <i class ="fas fa-exclamation-circle"></i>
                <small>Error message</small> -->
            </div>     

        
            <div class="form-control">
                <input type="text" name="pnumber" maxlength="11" placeholder = "Enter your phone number" class = "box" id="pnumber"><div id="t"></div>
                <!-- <i class ="fas fa-check-circle"></i>
                <i class ="fas fa-exclamation-circle"></i>
                <small>Error message</small> -->
            </div>     

        
            <div class="form-control">
                <input type="text" name="address" maxlength="100" placeholder = "Enter your address" class = "box" id="address"><div id="h"></div>
                <!-- <i class ="fas fa-check-circle"></i>
                <i class ="fas fa-check-circle"></i>
                <i class ="fas fa-exclamation-circle"></i>
                <small>Error message</small>  -->
            </div>    
        
            <div class="form-control">
                <input type="password" name="password" maxlength="100" placeholder = "Enter password" class = "box" id="password"><div id="eemail"></div>
                <!-- <i class ="fas fa-check-circle"></i>
                <i class ="fas fa-check-circle"></i>
                <i class ="fas fa-exclamation-circle"></i>
                <small>Error message</small> -->
            </div>    
            
        
            <div class="form-control">
                <input type="password" name="cpassword" maxlength="100" placeholder = "Confirm password" class = "box" id="cpassword"><div id="doba"></div>
                <!-- <i class ="fas fa-check-circle"></i>
                <i class ="fas fa-exclamation-circle"></i>
                <small>Error message</small> -->
            </div>    
            
        
            <div class="form-control">
                <select name="user_type" class="box" id="utype">
                    
                    <option value="user">Normal User</option>
                    <!-- <option value="admin">Admin</option> -->
                    <option value="seller">Seller</option>
                </select>
                <!-- <i class ="fas fa-check-circle"></i>
                <i class ="fas fa-exclamation-circle"></i>
                <small>Error message</small> -->
            </div>    
             
        
        <div>
            <input type="submit" value="Register Now" name="submit"  class="btn">

            <p>Already have an account? <a href="login.php">Login now</a></p>
        </div>

        </form>
    </div>
    <script src="../js/script.js"></script>
    <?php include 'footer.php'; ?>
</body>
</html>