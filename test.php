<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <form action="test.php" method="post">
    <label for="name">ID: </label>
    <input type="number" id="name" name="user_id"><br><br>
    <label for="name">Name:</label>
    <input type="text" id="name" name="post_text"><br><br>
    <input type="submit">
 </form>

 <?php

$conn = mysqli_connect('localhost','root','','irish');
 if ($conn == true) { 
    echo "connect success yhw" . '<br>' . '<br>';
 }else{
    die("Connection failed: " . error_log(mysqli_connect_error())); 
 }


 if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user = $_POST[ 'user_id' ];
    $namee = $_POST['post_text'];
     $sql = "INSERT INTO query (user_id, post_text)
      VALUES ('$user','$namee')";

      if($conn->query($sql)== TRUE){
         echo "Record inserted successfully";
      }else {
        echo "Error" . $sql . '<br>' . $conn->error;
      }
 }
 ?>
 </legend>
</body>
</html>