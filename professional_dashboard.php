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

// Query the prof table to retrieve professional's information
$query = "SELECT * FROM prof WHERE pro_id = $pro_id";
$result = mysqli_query($conn, $query);

// Check if query was successful and if professional was found
if ($result && mysqli_num_rows($result) > 0) {
    $professional = mysqli_fetch_assoc($result);
} else {
    echo "Error: Professional not found";
    exit();
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Dashboard</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Link to your CSS file for styling -->
    <link rel="stylesheet" href="css/hp.css"> <!-- Link to your CSS file for styling -->
    <link rel="website icon" type="png"
    href="images/hoom.ico" </link>
    <style>
        /* Global Styles */
        body {
          margin-top: 6.5rem;
          background-color: whitesmoke;
        }
        .dashboard-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }

        .dashboard-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }

        .profile-image-wrapper {
            position: relative;
            display: inline-block;
        }

        .profile-image-wrapper img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            cursor: pointer;
        }

        #imageInput {
            display: none;
        }

        .image-input-label {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 200px; /* Adjust width as needed */
            height: 100px; /* Adjust height as needed */
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent background */
            border: 2px solid #ccc;
            border-radius: 10px;
            padding: 10px;
            text-align: center;
            cursor: pointer;
            display: none;
            z-index: 1; /* Ensure label is above image */
            backdrop-filter: blur(5px); /* Apply blur effect to the background */
        }

        .label-text {
            text-align: center;
        }

        .label-text span {
            display: block;
        }

        #imageInput {
            display: none;
        }
.form-field-container {
    margin-top: 20px;
    display: flex;
    align-items: center;
    backdrop-filter: blur(10px);
}

.form-field-container label {
    width: 120px;
    text-align: right;
    margin-right: 20px;
    backdrop-filter: blur(10px);
}

.form-field-container input[type="text"],
.form-field-container input[type="email"],
.form-field-container textarea {
    width: 300px;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.update-button {
  
  margin-left: 15px;
  font-family: Arial, Helvetica, sans-serif;
  font-weight: bold;
  color: white;
  background-color: #171717;
  padding: 1em 2em;
  border: none;
  border-radius: .6rem;
  position: relative;
  cursor: pointer;
  overflow: hidden;
}

.update-button span:not(:nth-child(6)) {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  height: 30px;
  width: 30px;
  background-color: #0c66ed;
  border-radius: 50%;
  transition: .6s ease;
}

.update-button span:nth-child(6) {
  position: relative;
}

.update-button span:nth-child(1) {
  transform: translate(-3.3em, -4em);
}

.update-button span:nth-child(2) {
  transform: translate(-6em, 1.3em);
}

.update-button span:nth-child(3) {
  transform: translate(-.2em, 1.8em);
}

.update-button span:nth-child(4) {
  transform: translate(3.5em, 1.4em);
}

.update-button span:nth-child(5) {
  transform: translate(3.5em, -3.8em);
}

.update-button:hover span:not(:nth-child(6)) {
  transform: translate(-50%, -50%) scale(4);
  transition: 1.5s ease;
}

.off {
  width: 100%;
  height: 100%;
  background-image: conic-gradient(whitesmoke, grey);
  background-size: 100% 100%;
  background-repeat: no-repeat;
  background-color: royalblue;
  max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    text-align: center;
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
    
            <li><a href="Contact_us.php">Contact us</a></li>
            <li><a href="About_us.html">About</a></li>
            <?php     
            // Check if the user is logged in and if the image path is available in session
            if(isset($_SESSION['logged_in']) && isset($_SESSION['prof_image'])) {
                echo '<li class="user-image"><a href="professional_dashboard.php"><img src="' . $_SESSION['prof_image'] . '" alt="User Image"></a></li>';
            }
            ?>
          </div>
        </ul>
      </nav>
    <div class="off">
        <h1>Welcome, <?php echo $professional['name']; ?></h1>
           <!-- Profile Image Section -->
           <form id="updateForm" action="update_professional.php" method="post" enctype="multipart/form-data">
            <!-- Profile Image Section -->
            <div class="profile-image-wrapper">
                <?php if ($professional['profile_image']) : ?>
                    <img id="profileImage" src="<?php echo $professional['profile_image']; ?>" alt="Profile Image">
                <?php else: ?>
                    <p>No profile image available</p>
                <?php endif; ?>
                <!-- Label for file input -->
                <label id="imageInputLabel" for="imageInput" class="image-input-label">
                    <div class="label-text">
                        <span>Select new image: </span><br>
                        <span id="chooseFromDevice">Choose from your device</span>
                    </div>
                </label>
                <!-- File input -->
                <input type="file" id="imageInput" name="profile_image" style="display: none;">
            </div>

        <!-- Form Fields Section -->
        
            <div class="form-field-container">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $professional['name']; ?>">
                <button class="update-button">
                    <span class="circle1"></span>
                    <span class="circle2"></span>
                    <span class="circle3"></span>
                    <span class="circle4"></span>
                    <span class="circle5"></span>
                    <span class="text">update</span>
                </button>
            </div>
            <div class="form-field-container">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $professional['email']; ?>">
                <button class="update-button">
                    <span class="circle1"></span>
                    <span class="circle2"></span>
                    <span class="circle3"></span>
                    <span class="circle4"></span>
                    <span class="circle5"></span>
                    <span class="text">update</span>
                </button>
                
            </div>
            <div class="form-field-container">
                <label for="job_tit">Job Title:</label>
                <input type="text" id="job_tit" name="job_tit" value="<?php echo $professional['job_tit']; ?>">
                <button class="update-button">
                    <span class="circle1"></span>
                    <span class="circle2"></span>
                    <span class="circle3"></span>
                    <span class="circle4"></span>
                    <span class="circle5"></span>
                    <span class="text">update</span>
                </button>
              
            </div>
            <div class="form-field-container">
                <label for="description">Description:</label>
                <textarea id="description" name="description"><?php echo $professional['description']; ?></textarea>
                <button class="update-button">
                    <span class="circle1"></span>
                    <span class="circle2"></span>
                    <span class="circle3"></span>
                    <span class="circle4"></span>
                    <span class="circle5"></span>
                    <span class="text">update</span>
                </button>
              
            </div>
            <div class="form-field-container">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" value="<?php echo $professional['address']; ?>">
                <button class="update-button">
                    <span class="circle1"></span>
                    <span class="circle2"></span>
                    <span class="circle3"></span>
                    <span class="circle4"></span>
                    <span class="circle5"></span>
                    <span class="text">update</span>
                </button>
              
            </div>
            <div class="form-field-container">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" value="<?php echo $professional['phone']; ?>">
                <button class="update-button">
                    <span class="circle1"></span>
                    <span class="circle2"></span>
                    <span class="circle3"></span>
                    <span class="circle4"></span>
                    <span class="circle5"></span>
                    <span class="text">update</span>
                </button>
      
            </div>
        </form>
        <br><br>

        <center>
            <button class="update-button"><a href="logout.php">logout</a></button>
        </center>

   

        <script>
    // Function to show image input when clicking on the profile image
    document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('profileImage').addEventListener('click', function() {
                document.getElementById('imageInputLabel').style.display = 'block';
            });
        });
        </script>

<script>
        // Trigger file input click when clicking on "Choose from your device" text
        document.getElementById('chooseFromDevice').addEventListener('click', function() {
            document.getElementById('imageInput').click();
        });
    </script>
</body>
    
</html>
