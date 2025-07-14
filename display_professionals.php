<!-- display_professionals.php -->

<?php
include 'config.php';

// Fetch data from the 'prof' table
$query = "SELECT * FROM prof";
$result = mysqli_query($conn, $query);

// Check if there are rows in the result set
if ($result) {
    // Start the professionals section
    echo '<section class="professionals-section">';

    while ($row = mysqli_fetch_assoc($result)) {
        // Output HTML for each professional
        echo '<div class="professional">';
        echo '<div class="professional-content" data-professional-id="' . $row['pro_id'] . '">';
        echo '<h3>' . $row['name'] . '</h3>';
        echo '<p><b>Email:</b> ' . $row['email'] . '</p>';
        echo '<p><b>Job Title:</b> ' . $row['job_tit'] . '</p>';
        echo '<p><b>Description:</b> ' . $row['description'] . '</p>';
        echo '<p><b>Address:</b> ' . $row['address'] . '</p>';
        echo '<p><b>Phone:</b> ' . $row['phone'] . '</p>';
        echo '<a href="update_prof.php?pro_id=' . $row['pro_id'] . '">Update</a>';
        echo '</div>';
        echo '</div>';
    }

    // End the professionals section
    echo '</section>';
} else {
    // Handle the case where there is an error in the query
    echo 'Error: ' . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
