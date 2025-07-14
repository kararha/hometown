<?php
include('config.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if required fields are set
    $required_fields = ['firstname', 'lastname', 'email', 'username', 'password', 'confirm_password'];
    foreach ($required_fields as $field) {
        if (!isset($_POST[$field]) || empty($_POST[$field])) {
            echo "Error: Required field '{$field}' is missing.";
            exit;
        }
    }

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO user_form (name, email, username, password, image,user_type) VALUES (?, ?, ?, ?, Null,'user')");
    $stmt->bind_param("ssss", $name, $email, $username, $hashed_password);
    
    // Set parameters and execute
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $name = $firstname . " " . $lastname;
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "Error: Passwords do not match.";
        exit; // Exit the script if passwords do not match
    }
    
    // Hash the password securely
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    if ($stmt->execute()) {
        // Registration successful
        // echo "Registration successful.";
        header('location: login.html');  // Redirect user to home page 
    } else {
        // Registration failed
        echo "Error: " . $stmt->error;
    }
    
    // Close statement
    $stmt->close();
}
?>
