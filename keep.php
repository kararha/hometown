<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];
    
       // Check in the prof table
       $profQuery = "SELECT * FROM prof WHERE email = ?";
       $stmt = $conn->prepare($profQuery);
       $stmt->bind_param("s", $email);
       $stmt->execute();
       $profResult = $stmt->get_result();
   
       if ($profResult && $profResult->num_rows > 0) {
           $profRow = $profResult->fetch_assoc();
   
           // Debug: Print hashed password from the database
          // echo "Hashed Password in Database: " . $profRow['password'] . "<br>";
   
           // Verify password hash
           if (password_verify($password, $profRow['password'])) {
               $_SESSION['user_id'] = $profRow['pro_id'];
               $_SESSION['user_type'] = 'professional';
               $_SESSION['logged_in'] = true;
               $_SESSION['prof_image'] = $profRow['profile_image'];
               // Unset user image session variable if set
                 unset($_SESSION['image']);
               // Redirect to index.php after successful login
               header('location: index.php');
               exit();
           } else {
               // Debug: 
               echo "Password verification failed.<br>";
           }
       } else {
           // Debug: Print error if no user found
           echo "User not found.<br>";
       }
    

    // Check in the user_form table
    $userQuery = "SELECT * FROM user_form WHERE email = ?";
    $stmt = $conn->prepare($userQuery);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $userResult = $stmt->get_result();

    if ($userResult && $userResult->num_rows > 0) {
        $userRow = $userResult->fetch_assoc();
        if (password_verify($password, $userRow['password'])) {
            $_SESSION['user_id'] = $userRow['id'];
            $_SESSION['user_type'] = $userRow['user_type'];
            $_SESSION['nor_image'] = $userRow['image'];
            
            // Unset professional image session variable if set
            unset($_SESSION['prof_image']);
            // Redirect to index.php after successful login
            header('location: index.php');
            exit();
        }
    }

    // If login fails, redirect back to login page with error message
    // header('location: keep.php?error=Invalid credentials');
    // exit();
} 
?>
