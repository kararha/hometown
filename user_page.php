<?php

@include 'config.php';
session_start();

if(!isset( $_SESSION['user_name'])) {
  header('location:login.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="stylesheet" href="style.css">
    <title>user page</title>
</head>
<body>
  <div class="container">
         <div class="content">
            <h3>hi <span>user</span></h3>
            <h3>welcome <span><?php echo $_SESSION['user_name'] ?></span></h3>
            <p>this an page user</p>
            <a href="login_form.php" class="btn">login</a>
            <a href="regester_page.php" class="btn">register</a>
            <a href="logout.php" class="btn">logout</a>
         </div>
  </div>  
</body>
</html>

