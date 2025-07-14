<!-- <?php 
// // Include your database connection file
// include 'config.php';

// // Check if the request is a POST request
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Get professional ID and rating from the request
//     $professionalId = isset($_POST['professionalId']) ? intval($_POST['professionalId']) : 0;
//     $rating = isset($_POST['rating']) ? intval($_POST['rating']) : 0;

//     // Validate professional ID and rating
//     if ($professionalId > 0 && $rating > 0 && $rating <= 5) {
//         // Update the rating in the database
//         $updateQuery = "UPDATE prof SET rating = $rating WHERE pro_id = $professionalId";

//         if (mysqli_query($conn, $updateQuery)) {
//             // Return a success response
//             $response = array('status' => 'success', 'message' => 'Rating updated successfully');
//             echo json_encode($response);
//             exit;
//         } else {
//             // Return an error response
//             $response = array('status' => 'error', 'message' => 'Error updating rating');
//             echo json_encode($response);
//             exit;
//         }
//     }
// }

// // Return an error response if the request is invalid
// $response = array('status' => 'error', 'message' => 'Invalid request');
// echo json_encode($response);
// exit;
?> -->

<!-- <?php 
// // Include your database connection file
// include 'config.php';

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Get the professional ID and rating from the POST data
//     $professionalId = $_POST['professional_id'];
//     $rating = $_POST['rating'];

//     // Update the rating in the database
//     $updateQuery = "UPDATE prof SET rating = $rating WHERE pro_id = $professionalId";
//     $result = mysqli_query($conn, $updateQuery);

//     if ($result) {
//         // Send a success response
//         echo 'Rating updated successfully';
//     } else {
//         // Send an error response
//         echo 'Error updating rating: ' . mysqli_error($conn);
//     }
// }

// // Close the database connection
// mysqli_close($conn);
?> -->

<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $professionalId = $_POST['professionalId'];
    $rating = $_POST['rating'];

    // Perform the database update based on the received data
    // Modify the following code based on your database structure and update logic
    $updateQuery = "UPDATE prof SET rating = $rating WHERE pro_id = $professionalId";
    $result = mysqli_query($conn, $updateQuery);

    if ($result) {
        echo 'Rating updated successfully!';
    } else {
        echo 'Error updating rating: ' . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo 'Invalid request.';
}
?>




