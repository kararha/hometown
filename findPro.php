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
  <title>Find Professionals</title>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }

    section {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-around;
      padding: 20px;
    }

    .advert {
      text-align: center;
      margin-top: 7.2rem;
      padding: 100px;
      background-color: #e6e6e6;

    }

    .search-box {
      display: flex;
      justify-content: center; /* Align items to the right */
      padding: 20px;
      
    }

    .search-form {
      display: flex;
      align-items: center;
      
    }

    .input[type = "text"] {
        display: block;
        color: rgb(34, 34, 34);
        background: linear-gradient(142.99deg, rgba(217, 217, 217, 0.63) 15.53%, rgba(243, 243, 243, 0.63) 88.19%);
        box-shadow: 0px 12px 24px -1px rgba(0, 0, 0,0.18);
        border-color: rgba(7, 4, 14, 0);
        border-radius: 50px;
        block-size: 20px;
        margin: 7px auto;
        padding: 18px 15px;
        outline: none;
        text-align: center;
        width: 200px;
        transition: 0.5s;
      }

      .input[type = "text"]:hover {
        width: 240px;
      }

      .input[type = "text"]:focus {
        width: 280px;
      }

        button {
          float: right;
          margin-left: 1rem;
          position: relative;
          padding: 10px 20px;
          border-radius: 7px;
          border: 1px solid rgb(61, 106, 255);
          font-size: 14px;
          text-transform: uppercase;
          font-weight: 600;
          letter-spacing: 2px;
          background: transparent;
          color: #fff;
          overflow: hidden;
          box-shadow: 0 0 0 0 transparent;
          -webkit-transition: all 0.2s ease-in;
          -moz-transition: all 0.2s ease-in;
          transition: all 0.2s ease-in;
        }

        button:hover {
          background: rgb(61, 106, 255);
          box-shadow: 0 0 30px 5px rgba(0, 142, 236, 0.815);
          -webkit-transition: all 0.2s ease-out;
          -moz-transition: all 0.2s ease-out;
          transition: all 0.2s ease-out;
        }

        button:hover::before {
          -webkit-animation: sh02 0.5s 0s linear;
          -moz-animation: sh02 0.5s 0s linear;
          animation: sh02 0.5s 0s linear;
        }

        button::before {
          content: '';
          display: block;
          width: 0px;
          height: 86%;
          position: absolute;
          top: 7%;
          left: 0%;
          opacity: 0;
          background: #fff;
          box-shadow: 0 0 50px 30px #fff;
          -webkit-transform: skewX(-20deg);
          -moz-transform: skewX(-20deg);
          -ms-transform: skewX(-20deg);
          -o-transform: skewX(-20deg);
          transform: skewX(-20deg);
        }

        @keyframes sh02 {
          from {
            opacity: 0;
            left: 0%;
          }

          50% {
            opacity: 1;
          }

          to {
            opacity: 0;
            left: 100%;
          }
        }

        button:active {
          box-shadow: 0 0 0 0 transparent;
          -webkit-transition: box-shadow 0.2s ease-in;
          -moz-transition: box-shadow 0.2s ease-in;
          transition: box-shadow 0.2s ease-in;
        }



    .professional {
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 10px;
      margin: 10px;
      padding: 20px;
      width: 200px;
      text-align: center;
      transition: transform 0.2s;
      text-decoration: none; /* Added style to remove underlines */
      color: inherit; /* Added style to inherit the color from the parent */
    }

    .professional:hover {
      transform: scale(1.05);
    }

    .professional img {
      width: 100px;
      height: 100px; /* Set a fixed height */
      border-radius: 50%;
      object-fit: cover;
}


      .rating {
        display: inline-block;
      }

      .rating input {
        display: none;
      }

      .rating label {
        float: right;
        cursor: pointer;
        color: #ccc;
        transition: color 0.3s;
      }

      .rating label:before {
        content: '\2605';
        font-size: 30px;
      }

      .rating input:checked ~ label,
      .rating label:hover,
      .rating label:hover ~ label {
        color: #6f00ff;
        transition: color 0.3s;
      }

      /* Add this style to your existing styles or in a separate CSS file */
      .rating input:checked ~ label,
      .rating label:hover,
      .rating label:hover ~ label {
        color: #6f00ff;
        transition: color 0.3s;
      }

      .rating input:checked ~ label:before,
      .rating label:hover:before,
      .rating label:hover ~ label:before {
        color: #6f00ff;
        transition: color 0.3s;
      }

      /* Add a style for selected stars */
      .rating input.selected ~ label,
      .rating input.selected ~ label:before {
        color: #6f00ff;
      }


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
                <li><a href="findPro.html">Contracting company </a></li>
                <li><a href="findPro.html">contractor</a></li>
              </ul>
    
            </li>
    
            <li><a href="contact_us.php">Contact us</a></li>
            <li><a href="about_us.html">About</a></li>
          </div>
        </ul>
      </nav>

  <div class="advert">
    <p>Advertisement Here</p>
  </div>

<!-- Search Box -->
<div class="search-box">
  <form action="" method="get" class="search-form">
    <div class="form__group_one">
      <input type="text" name="text" placeholder="Search by name, job title, or address" class="input">
    </div>
    <button type="submit">Search</button>
  </form>
</div>

<?php
// Check if the search form is submitted
if (isset($_GET['text']) || isset($_GET['letter'])) {
    // Include your database connection file
    include 'config.php';

    // Initialize search conditions
    $conditions = array();

    // Check if the text search query is set
    if (!empty($_GET['text'])) {
        $search_query = mysqli_real_escape_string($conn, $_GET['text']);
        $conditions[] = "(name LIKE '%$search_query%' OR job_tit LIKE '%$search_query%' OR address LIKE '%$search_query%')";
    }

    // Check if the letter search query is set
    if (!empty($_GET['letter'])) {
        $letter = mysqli_real_escape_string($conn, $_GET['letter']);
        $conditions[] = "LEFT(name, 1) = '$letter'";
    }

    // Construct the WHERE clause for the SQL query
    $where_clause = implode(" AND ", $conditions);

    // Construct the SQL query to search for professionals
    $query = "SELECT * FROM prof";
    if (!empty($where_clause)) {
        $query .= " WHERE $where_clause";
    }

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if there are any results
    if (mysqli_num_rows($result) > 0) {
        // Display the search results in card-like format
        echo '<section class="professionals-section">';
        while ($row =d mysqli_fetch_assoc($result)) {
            echo '<a href="pro_info.php?pro_id=' . $row['pro_id'] . '" class="professional">';
            echo '<div class="professional-content" data-professional-id="' . $row['pro_id'] . '">';
            echo '<img src="' . $row['profile_image'] . '" alt="' . $row['name'] . '">';
            echo '<h3><b>Name:</b> ' . $row['name'] . '</h3>';
            echo '<p><b>Job Title:</b> ' . $row['job_tit'] . '</p>';
            echo '<p><b>Description:</b> ' . $row['description'] . '</p>';
            echo '<div class="rating" data-rating="' . $row['rating'] . '" data-professional-id="' . $row['pro_id'] . '">';
            // Include your rating functionality here
            echo '</div>';
            echo '</div>';
            echo '</a>';
        }
        echo '</section>';
    } else {
        // If no results are found, display a message
        echo '<p>No results found.</p>';
    }

    // Close the database connection
    mysqli_close($conn);
}
?>


<script>
  function searchProfessionals(event) {
    event.preventDefault(); // Prevent the form from submitting traditionally

    // Get search parameters
    var searchText = document.getElementById('searchText').value.trim();
    var searchLetter = document.getElementById('searchLetter').value.trim();

    // Make AJAX request to fetch search results
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'search.php?text=' + searchText + '&letter=' + searchLetter, true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        // Update search results container with response
        document.getElementById('searchResults').innerHTML = xhr.responseText;
      }
    };
    xhr.send();
  }
</script>

<?php
// Include your database connection file
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
        echo '<a href="pro_info.php?pro_id=' . $row['pro_id'] . '" class="professional">';
        echo '<div class="professional-content" data-professional-id="' . $row['pro_id'] . '">';
        echo '<img src="' . $row['profile_image'] . '" alt="' . $row['name'] . '">';
        echo '<h3><b>Name:</b> '  . $row['name'] . '</h3>';
        echo '<p><b>Job Title:</b> ' . $row['job_tit'] . '</p>';
        echo '<p><b>Description:</b> ' . $row['description'] . '</p>';
        echo '<div class="rating" data-rating="' . $row['rating'] . '" data-professional-id="' . $row['pro_id'] . '">';

        // Assuming the rating is stored in the database, modify this part accordingly
        for ($i = 5; $i >= 1; $i--) {
            echo '<input value="' . $i . '" name="rating" id="star' . $row['pro_id'] . '_' . $i . '" type="radio"';
            
            // Check if the current star is selected
            if ($i == $row['rating']) {
                echo ' checked';
            }
            
            echo '>';
            echo '<label for="star' . $row['pro_id'] . '_' . $i . '"></label>';
        }

        echo '</div>';

        // Display the "Update Rating" or "Submit Rating" button based on user's previous rating
        if ($row['rating']) {
            echo '<button class="update-rating">Update Rating</button>';
        } else {
            echo '<button class="submit-rating">Submit Rating</button>';
        }

        echo '</div>';
        echo '</a>';
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






<script>
  $(document).ready(function () {
    // Handler for clicking the "Submit Rating" button
    $('.submit-rating').on('click', function (e) {
      e.preventDefault();
      var professionalId = $(this).closest('.professional-content').data('professional-id');
      var selectedRating = $('input[name="rating"]:checked').val();

      // Make an AJAX request to update the rating in the database
      $.ajax({
        type: 'POST',
        url: 'update_rating.php',
        data: { professionalId: professionalId, rating: selectedRating },
        success: function (response) {
          // Update the UI or perform any additional actions
          console.log(response);

          // Reload the page after successful rating submission
          location.reload();
        },
        error: function (error) {
          console.error('Error:', error);
        }
      });
    });

    // Handler for clicking the "Update Rating" button
    $('.update-rating').on('click', function (e) {
      e.preventDefault();
      var professionalId = $(this).closest('.professional-content').data('professional-id');
      var selectedRating = $('input[name="rating"]:checked').val();

      // Make an AJAX request to update the rating in the database
      $.ajax({
        type: 'POST',
        url: 'update_rating.php',
        data: { professionalId: professionalId, rating: selectedRating },
        success: function (response) {
          // Update the UI or perform any additional actions
          console.log(response);

          // Reload the page after successful rating update
          location.reload();
        },
        error: function (error) {
          console.error('Error:', error);
        }
      });
    });
  });
</script>

</body>
</html>
