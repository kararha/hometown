<?php
session_start();
include 'config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('location: login.php');
    exit();
}

// Get the user's ID from the session
$user_id = $_SESSION['user_id'];

// Check if the form is submitted for updating profile image
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
    $profile_image = $_FILES['image'];
    $image_name = $profile_image['name'];
    $image_tmp = $profile_image['tmp_name'];

    // Check for image file type
    $image_ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
    $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');

    if (in_array($image_ext, $allowed_extensions)) {
        // Generate a unique name for the image
        $image_new_name = uniqid('', true) . '.' . $image_ext;
        $image_destination = 'uploads/' . $image_new_name;

        // Move the uploaded image to the destination folder
        move_uploaded_file($image_tmp, $image_destination);

        // Update the user's profile image in the database
        $update_image_query = "UPDATE user_form SET image = '$image_destination' WHERE id = $user_id";
        mysqli_query($conn, $update_image_query);
    }
} else {
    // If the form is submitted for updating other user information
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];

    // Update other user information
    $update_query = "UPDATE user_form SET 
                        name = '$name',
                        email = '$email',
                        username = '$username'
                    WHERE id = $user_id";
    mysqli_query($conn, $update_query);

    // Redirect back to the dashboard after updating
    header('location: nor_user_dashboard.php');
    exit();
}

// If the request is not POST or image is not provided, redirect back to the dashboard
header('location: nor_user_dashboard.php');
exit();
?>
