<?php
session_start();
if(!$_SESSION['user_id']){
header("Location:signin.php");
}
if(isset($_POST['Logout'])){
    session_destroy();
    header("Location:signin.php");
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
   <title>Dash</title>
</head>

<body>
   <form action="" method="post">

      <div class="form-input">
         <button type="submit" name="Logout">Logout</button>
      </div>
   </form>

   <div id="wrapper">
      <img src="./upload/<?php echo $_SESSION['user_image'] ?>" alt="">
      <h1>hello <?php echo $_SESSION['user_name'] ?> </h1>
   </div>


</body>

</html>