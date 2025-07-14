<?php
// Include database configuration
include 'config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Prepare and execute SQL statement to insert data into the contacts table
    $sql = "INSERT INTO contacts (name, phone, email, message) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $phone, $email, $message);
    $stmt->execute();

    // Check if data is inserted successfully
    if ($stmt->affected_rows > 0) {
        // Redirect back to the contact page with success message
        header("Location: contact_us.php?success=true&name=" . urlencode($_POST['name']));
        exit();
    } else {
        echo "Error: Unable to insert data.";
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();
}
?>
