<?php
session_start();
echo var_dump($_SESSION);
include 'config.php'; // Include your database configuration file

// Check if the form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the plan ID is set in the POST data
    if(isset($_POST['plan_id'])) {
        // Retrieve user ID from session
        if(isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            
            // Retrieve the selected plan ID from the form
            $plan_id = $_POST['plan_id'];
            
            // Insert a new row into the subscription table
            $subscription_sql = "INSERT INTO subscription (plan_id, prof_id) VALUES (?, ?)";
            $stmt = $conn->prepare($subscription_sql);
            $stmt->bind_param("ii", $plan_id, $user_id);
            
            // Execute the prepared statement
            if ($stmt->execute()) {
                // Subscription inserted successfully
                // Redirect to plans.html
                header('Location: login.html');
                exit(); // Ensure script execution stops after redirection
            } else {
                // Error inserting subscription
                echo "Error: " . $conn->error;
            }
            
            // Close the prepared statement
            $stmt->close();
        } else {
            // User ID not found in session
            echo "Error: User ID not found in session";
        }
    } else {
        // Plan ID not set in POST data
        echo "Error: No plan selected";
    }
} else {
    // Request method is not POST
    echo "Error: Invalid request method";
}

// Close Connection
$conn->close();
?>
