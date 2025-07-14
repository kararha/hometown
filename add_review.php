<?php
// Start the session at the very beginning of your PHP script
session_start();

// Include your database connection file
include 'config.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if the user is not logged in
    header('Location: login.php');
    exit();
}

// Get the user's ID from the session
$user_id = $_SESSION['user_id'];

// Check if the form is submitted and the submit button is clicked
if (isset($_POST['submit_review'])) {
    // Get the professional ID and review content from the form
    $pro_id = $_POST['pro_id'];
    $review_content = $_POST['review_content'];

    // You may want to validate the input data here

    // Insert the review into the database
    $insert_review_query = "INSERT INTO reviews (pro_id, id, review_content) VALUES ('$pro_id', '$user_id', '$review_content')";

    if (mysqli_query($conn, $insert_review_query)) {
        // If the review is inserted successfully, redirect back to the professional's profile page
        header('Location: pro_info.php?pro_id=' . $pro_id);
        exit();
    } else {
        // If an error occurs during insertion, you can handle it accordingly
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // If the form is not submitted properly, redirect back to the professional's profile page
    header('Location: professional_profile.php');
    exit();
}

// Close the database connection
mysqli_close($conn);
?>
