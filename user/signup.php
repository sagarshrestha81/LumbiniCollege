<?php


include("../server.php");
$err=[];
if (isset($_POST['signup'])) {
   if($_POST['user_name'] == ''){
      $err['user_name']="Username is blank";
   }
   if($_POST['user_email'] == ''){
      $err['user_email']="Email is blank";
   }
   if($_POST['user_name']){
      $user_name = $_POST['user_name'];
   $user_email = $_POST['user_email'];
   $user_password = md5($_POST['user_password']);
   $user_bio = $_POST['user_bio'];
   $path="upload/";
   $file_name=basename($_FILES['user_image']['name']);
   
   $path_with_file_name=$path.$file_name;

   if(move_uploaded_file($_FILES['user_image']['tmp_name'],$path_with_file_name)){
      echo "file uploaded";
   }

   

  
   $sqlCheck="SELECT * FROM user WHERE user_email='$user_email'";
   $result=$conn->query($sqlCheck);
   if($result->num_rows > 0){
      echo "Already Exists";
   
   }else{
      $sql = "INSERT INTO user 
      (user_name,user_email,user_password,user_bio,user_image) 
      VALUES
      ('$user_name','$user_email','$user_password','$user_bio','$file_name')";
      if ($conn->query($sql) === TRUE) {
         echo "Signup successfully";
      } else {
         echo "Something went wrong! Pleasetry again";
      }
   }
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
         <h1>Signup</h1>
         <form action="" method="post" enctype="multipart/form-data">
            <div class="form-input">
               <label for="user_name">Fullname</label>
               <input type="text" id="user_name" name="user_name">
               <span><?php echo $err['user_name'] ?? "" ?></span>
            </div>
            <div class="form-input">
               <label for="user_email">Email</label>
               <input type="email" id="user_email" name="user_email">
               <span><?php echo $err['user_email'] ?? "" ?></span>
            </div>
            <div class="form-input">
               <label for="user_password">Password</label>
               <input type="password" id="user_password" name="user_password">
            </div>
            <div class="form-input">
               <label for="user_image">Image</label>
               <input type="file" id="user_image" name="user_image" accept=".docx">
            </div>
            <div class="form-input">
               <label for="user_bio">Bio</label>
               <textarea id="user_bio" name="user_bio"></textarea>
            </div>
            <div class="form-input">
               <button type="submit" name="signup">Signup</button>
            </div>
         </form>

      </div>
   </div>

</body>

</html>