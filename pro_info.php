<?php
// Start the session at the very beginning of your PHP script
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css" />
  <link rel="website icon" type="png"
    href="images/hoom.ico" </link>
  <title>Professional Profile</title>
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin-top: 5.5rem;
      padding: 0;
      background-color: #f4f4f4;
      display: flex;
      flex-direction: column;
      margin-top: 10rem;
    }

    header {
      background-color: #333;
      color: #fff;
      text-align: center;
      padding: 10px;
    }

    .ads-section {
      margin-top: 10px;
      text-align: center;
      padding: 20px;
      background-color: #e6e6e6;
    }

    .swiper-container {
      width: 100%;
      height: 300px; /* Adjust the height as needed */
    }

    .swiper-slide {
      background-size: cover;
      background-position: center;
    }

    .container {
      width: 100%;
      max-width: 1200px; /* Adjust the max-width as needed */
      margin: 0 auto;
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
    }

    .professional-section {
      width: 65%; /* Adjust the width as needed */
      margin-top: 19px;
      margin-right: 10px;

    }

    .profile-section {
      background-color: #fff;
      border: 1px solid aqua;
      border-radius: 10px;
      margin-bottom: 20px;
      padding: 20px;
    }

    .profile-header {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }

    .profile-image {
      margin-right: 20px;
    }

    .profile-image img {
      height: 100px;
      width: 100px;
      border-radius: 50%;
    }

    .job-title {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .rating {
      display: flex;
      align-items: center;
    }

    .star {
      color: #ffcc00;
      font-size: 20px;
      margin-right: 5px;
    }

    .description {
      border: 2px solid #ccc;
      padding: 10px;
      border-radius: 10px;
      width: 100%;
      resize: none;
      margin-bottom: 20px;
    }

    .navigation-bar {
      display: flex;
      justify-content: space-around;
      background-color: rgba(255, 255, 255, 0.8); /* Adjust the alpha (last value) for transparency */
      backdrop-filter: blur(10px); /* Adjust the blur intensity as needed */
      color: #333;
      padding: 10px;
      border-radius: 10px;
      border-bottom: 1px solid #000; /* Add a black line under the navigation bar */
    }

    .navigation-bar a {
      text-decoration: none;
      color: #333;
      font-weight: bold;
      font-size: 16px;
    }

    .navigation-bar a:hover {
      text-decoration: underline;
    }

    .projects {
      margin-top: 20px;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-around;
    }

    .project {
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 10px;
      margin: 10px;
      padding: 10px;
      width: 200px;
      text-align: center;
    }

    .project img {
      width: 100px;
      border-radius: 50%;
      margin-bottom: 10px;
    }

    .form-section {
      width: 30%; /* Adjust the width as needed */
      position: sticky;
      top: 10px; /* Adjust the distance from the top */
      padding: 10px;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 10px;
    }

    form {
      display: flex;
      flex-direction: column;
    }

    label {
      margin-top: 10px;
    }

    input, textarea {
      margin-bottom: 10px;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 5px;
      width: 100%;
    }

    button {
      background-color: #333;
      color: #fff;
      padding: 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    
    .reviews-section {
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 10px;
      margin-bottom: 20px;
      padding: 20px;
    }

    .review {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }

    .review-image {
      margin-right: 20px;
    }

    .review-image img {
      height: 100px;
      width: 100px;
      border-radius: 50%;
    }

    .review-details {
      flex-grow: 1;
    }

    .review-name {
      font-weight: bold;
      margin-bottom: 5px;
    }

    .review-rating {
      color: #ffcc00;
      font-size: 20px;
      margin-bottom: 5px;
    }

    .review-content {
      border-top: 1px solid #ccc;
      padding-top: 10px;
    }


    /* Add additional styling as needed */
  </style>
</head>
<body>

  <nav class="navbar">
    <!-- LOGO -->
    <div class="logo"><img width="100px" height="100px" src="images/hoom.png"></div>

    <!-- NAVIGATION MENU -->
    <ul class="nav-links">

      <!-- USING CHECKBOX HACK -->
      <input type="checkbox" id="checkbox_toggle" />
      <label for="checkbox_toggle" class="hamburger">&#9776;</label>

      <!-- NAVIGATION MENUS -->
      <div class="menu">

        <li><a href="index.php">Home</a></li>
        <li><a href="login.html">Login</a></li>

        <li class="services">
          <a href="findPro.php">Find Profisstional</a>

          <!-- DROPDOWN MENU -->
          <ul class="dropdown">
            <li><a href="findPro.php">Contracting company </a></li>
            <li><a href="findPro.php">Contractor</a></li>
          </ul>

        </li>

        <li><a href="contact_us.php">Contact us</a></li>
        <li><a href="about_us.html">About</a></li>
      </div>
    </ul>
  </nav>



  <div class="ads-section">
    <!-- Swiper -->
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <!-- Slides -->
        <div class="swiper-slide" style="background-image:url('images/cat.png')"></div>
        <div class="swiper-slide" style="background-image:url('images/wide.jpg')"></div>
        <div class="swiper-slide" style="background-image:url('images/Purpose.jpg')"></div>
        <!-- Add more slides as needed -->
      </div>
      <!-- Add Pagination -->
      <div class="swiper-pagination"></div>
    </div>
  </div>

  <div class="container">

  <?php
// Include your database connection file
include 'config.php';

// Check if the professional ID is provided in the URL
if (isset($_GET['pro_id'])) {
    $professional_id = $_GET['pro_id'];

    // Fetch the specific user's information from the database based on the professional ID
    $query = "SELECT * FROM prof WHERE pro_id = $professional_id";
    $result = mysqli_query($conn, $query);

    // Check if there are rows in the result set
    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the user's information
        $row = mysqli_fetch_assoc($result);

        // Display the user's information
        echo '<div class="profile-section">';
        echo '<div class="profile-header">';
        echo '<div class="profile-image">';
        echo '<img src="' . $row['profile_image'] . '" alt="' . $row['name'] . '">';
        echo '</div>';
        echo '<div>';
        echo '<div class="job-title">' . $row['job_tit'] . '</div>';
        echo '</div>';
        echo '</div>';
        echo '<div class="description">' . $row['description'] . '</div>';
        // Display other user information as needed

        // Display projects section
        echo '<div id="projects" class="projects">';
        // Assuming you have a separate table for projects associated with each professional
        $projects_query = "SELECT * FROM prof WHERE pro_id = $professional_id";
        $projects_result = mysqli_query($conn, $projects_query);
        if ($projects_result && mysqli_num_rows($projects_result) > 0) {
            while ($project_row = mysqli_fetch_assoc($projects_result)) {
                echo '<div class="project">';
                echo '<img src="' . $project_row['profile_image'] . '" alt="' . $project_row['name'] . '">';
                echo '<p>' . $project_row['name'] . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p>No projects found for this professional.</p>';
        }
        echo '</div>';

    // Fetch the review information along with the reviewer's details from the database
    $query = "SELECT reviews.id, reviews.review_content, user_form.name AS reviewer_name, user_form.image AS reviewer_image
              FROM reviews
              JOIN user_form ON reviews.review_id = user_form.id";
    $result = mysqli_query($conn, $query);
    
    // Check if there are rows in the result set
    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch and display each review and reviewer's information
        while ($review_row = mysqli_fetch_assoc($result)) {
            // Display the reviewer's image and name
            echo '<div class="review">';
            echo '<div class="review-image">';
            echo '<img src="' . $review_row['reviewer_image'] . '" alt="' . $review_row['reviewer_name'] . '">';
            echo '</div>';
            // Display the review content
            echo '<div class="review-details">';
            echo '<div class="review-name">' . $review_row['reviewer_name'] . '</div>';
            echo '<div class="review-rating">&#9733; &#9733; &#9733; &#9733; &#9734;</div>';
                  // Check if the user is logged in
                if (isset($_SESSION['user_id'])) {
                  $user_id = $_SESSION['user_id'];
                  
                  // Check if the user has already submitted a review
                  $check_review_query = "SELECT * FROM reviews WHERE id = $user_id";
                  $check_review_result = mysqli_query($conn, $check_review_query);

                  if ($check_review_result && mysqli_num_rows($check_review_result) > 0) {
                      // If the user has already submitted a review, don't display the form
                      echo "<p>You have already submitted a review.</p>";
                  } else {
                      // If the user hasn't submitted a review, display the form
                      echo '<form action="add_review.php" method="POST">';
                      echo '<input type="hidden" name="pro_id" value="' . $professional_id . '">';
                      echo '<label for="message">Your Review:</label>';
                      echo '<textarea id="message" name="review_content" rows="4" required></textarea>';
                      echo '<button type="submit" name="submit_review">Submit Review</button>';
                      echo '</form>';
                  }
              } else {
                  // If the user is not logged in, prompt them to log in
                  echo "<p>Please log in to submit a review.</p>";
              }
            echo '<div class="review-content">'  . $review_row['review_content'] . '</div>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        // Handle the case where no reviews are found
        echo '<p>No reviews found.</p>';
    }
  }
} else {
    // Handle the case where no professional ID is provided in the URL
    echo '<p>No professional ID provided.</p>';
}
// Close the database connection
mysqli_close($conn);
?>

    </div>

    <div class="form-section">
      <form>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="4" required></textarea>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>

        <label for="dealTime">Deal Time:</label>
        <input type="text" id="dealTime" name="dealTime" required>

        <label for="problemType">What Kind of Problem:</label>
        <input type="text" id="problemType" name="problemType" required>

        <button type="submit">Deal</button>
      </form>
    </div>

  </div>

  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script>
    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 1,
      spaceBetween: 10,
      loop: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      autoplay: {
        delay: 2000, // milliseconds
        disableOnInteraction: false,
      },
    });
  </script>

</body>
</html>
