<?php


include("../server.php");
if (isset($_POST['signup'])) {
   $user_email = $_POST['user_email'];
   $user_password = md5($_POST['user_password']);

   $sqlCheck="SELECT * FROM user WHERE 
   user_email='$user_email' AND  user_password='$user_password'";
   $result=$conn->query($sqlCheck);
   if($result->num_rows > 0){
      $row=$result->fetch_assoc();
      session_start();
      $_SESSION['user_id']=$row['user_id'];
      $_SESSION['user_email']=$row['user_email'];
      $_SESSION['user_name']=$row['user_name'];
      $_SESSION['user_image']=$row['user_image'];

      header("Location:dashboard.php");
      
   }else{
      echo "User Doesn't Exists";

     
   }



}



?>

<!DOCTYPE html>
<html lang="en">

<head>
   <title>Signup</title>
</head>

<body>
   <style>
      .wrapper {
         text-align: center;
      }

      .from-wrapper {
         max-width: 300px;
         padding: 10px;
         border: 1px solid #00000044;

      }

      .form-input {
         display: flex;
         flex-direction: column;
         margin-top: 10px;
      }
   </style>

   <div id="wrapper">
      <div class="from-wrapper">
         <h1>Signin</h1>
         <form action="" method="post">
            <div class="form-input">
               <label for="user_email">Email</label>
               <input type="email" id="user_email" name="user_email">
            </div>
            <div class="form-input">
               <label for="user_password">Password</label>
               <input type="password" id="user_password" name="user_password">
            </div>
            <div class="form-input">
               <button type="submit" name="signup">Signup</button>
            </div>
         </form>

      </div>
   </div>

</body>

</html>