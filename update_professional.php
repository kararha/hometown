<?php
session_start();
include 'config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'professional') {
    header('location: login.php');
    exit();
}

// Get the professional's ID from the session
$pro_id = $_SESSION['user_id'];

// Check if the form is submitted for updating profile image
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['profile_image']) && !empty($_FILES['profile_image']['name'])) {
    $profile_image = $_FILES['profile_image'];
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

        // Update the professional's profile image in the database
        $update_image_query = "UPDATE prof SET profile_image = '$image_destination' WHERE pro_id = $pro_id";
        mysqli_query($conn, $update_image_query);
    }

    } else {
        // If the form is submitted for updating other professional information
        $name = $_POST['name'];
        $email = $_POST['email'];
        $job_tit = $_POST['job_tit'];
        $description = $_POST['description'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];

        // Update other professional information
        $update_query = "UPDATE prof SET 
                            name = '$name',
                            email = '$email',
                            job_tit = '$job_tit',
                            description = '$description',
                            address = '$address',
                            phone = '$phone'
                        WHERE pro_id = $pro_id";
        mysqli_query($conn, $update_query);

        // Redirect back to the dashboard after updating
        header('location: professional_dashboard.php');
        exit();
    }
// If the request is not POST, redirect back to the dashboard
header('location: professional_dashboard.php');
exit();
?>
