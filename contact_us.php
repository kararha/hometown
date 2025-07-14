<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/php.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-GLhlTQ8iK9tG7e9NvP1CdGO9iKOTpp6Gc1xMz9CZ9GY5iJKFLQe/XaC/JmGAA2H" crossorigin="anonymous">
  <link rel="website icon" type="png"
    href="images/hoom.ico" </link>
  <title>Contact Us</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      min-height: 100vh;
      flex-direction: column;
      background-color: whitesmoke;
    }

    section {
      display: flex;
      flex: 1;
      justify-content: space-around;
      align-items: center;
      padding: 20px;
      margin-top: 10rem; /* Add margin between sections */
    }
  

    /* Apply box shadow to the box */
.content-con {
  float: left;
  padding-left: 10px;
  width: 35%;
  text-align: left;
  font-size: 25px;
  margin-top: 20px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.5); /* Adjust the shadow properties as needed */
  border-radius: 10px; /* Add border radius */
  font-family: 'Open Sans', sans-serif; /* Specify desired font family */
  font-weight: bold; /* Make the font bold */
  color: #333; /* Set font color */
  background-color: white; /* Set background color */
  padding: 20px; /* Add padding */
  transition: transform 0.3s ease;
}

/* Add glow effect on hover */
.content-con:hover {
  box-shadow: 0 0 20px rgba(173, 216, 230, 1); /* Light blue shadow with stronger intensity */
  transform: scale(1.09); /* Increase the size by 10% */
}

@media (max-width: 768px) {
  /* Adjust the width for smaller screens */
  .content-con {
    width: 100%;
  }
}


    .paintme {
      padding: 50px;
      width: 50%;
      border: none;
      border-radius: 10px;
      background-color: whitesmoke;
    }

    .colorful-form {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: lightblue; /* Light blue background color */
      box-shadow: 0 0 20px rgba(173, 216, 230, 0.5); /* Light blue glow shadow with stronger intensity */
      backdrop-filter: blur(15px); /* Add backdrop-filter property for blur effect */
      background: rgba(255, 255, 255, 0.5);
      border-radius: 10px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
      color: #333;
    }

    .form-input {
      width: 100%;
      padding: 10px;
      border: none;
      background-color: white;
      color: #333;
      border-radius: 5px;
    }

    textarea.form-input {
      height: 100px;
    }
   
/* CSS for success message */
.success-message {
      position: absolute;
      top: 25%; /* Center vertically */
      left: 50%; /* Center horizontally */
      transform: translate(-50%, -50%); /* Center horizontally and vertically */
      width: 500px;
      max-width: 90%; /* Adjust max-width as needed */
      background-color: lightblue; /* Change the background color as needed */
      text-align: center;
      padding: 20px;
     box-shadow: 0 0 20px rgba(0, 0, 139, 0.5); /* Dark blue glow shadow with stronger intensity */ 
   }

    /* Close button styles */
    .close-button {
      float: right;
      font-size: 20px;
      font-weight: bold;
      cursor: pointer;
    }
    /* Clearfix to ensure proper spacing */
    .clearfix::after {
      content: "";
      clear: both;
      display: table;
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
            <li><a href="login.php">Login</a></li>
    
            <li class="services">
              <a href="findPro.php">Find Profisstional</a>
    
              <!-- DROPDOWN MENU -->
              <ul class="dropdown">
                <li><a href="findPro.html">Contracting company </a></li>
                <li><a href="findPro.html">Contractor</a></li>
              </ul>
    
            </li>
    
            <li><a href="contact_us.php">Contact us</a></li>
            <li><a href="about_us.html">About</a></li>
          </div>
        </ul>
      </nav>

            <!-- Success message will appear here -->
    <?php
    if (isset($_GET['success']) && $_GET['success'] === "true") {
      // Display success message with the submitted name
      echo '<div class="success-message">' .
        'Thank you, ' . htmlspecialchars($_GET['name']) . '! We will answer you as soon as possible.' .
        '<span class="close-button" onclick="closeSuccessMessage()">&times;</span>' . // Added onclick event
        '</div>';
    }
    ?>

  <!-- Contact Information Section -->
  <section>
   

  <div class="content-con glow-box">
  <p>Here you can get answers <br> to your questions and problems that<br> need solutions or you have comments to develop our site.<br> Just fill out the requirements on the right of the screen.</p>
  </div>

  
   <!-- Contact Form Section -->
<div class="paintme">
  <form class="colorful-form" method="post" action="handl-contact.php">
    <div class="form-group">
      <label class="form-label" for="name">Name:</label>
      <input required="" placeholder="Enter your name" class="form-input" type="text" name="name">
    </div>
    <div class="form-group">
      <label class="form-label" for="phone">Phone:</label>
      <input required="" placeholder="Enter your phone number" class="form-input" type="text" name="phone">
    </div>
    <div class="form-group">
      <label class="form-label" for="email">Email:</label>
      <input required="" placeholder="Enter your email" class="form-input" name="email" id="email" type="email">
    </div>
    <div class="form-group">
      <label class="form-label" for="message">Message:</label>
      <textarea required="" placeholder="Leave your message" class="form-input" name="message" id="message"></textarea>
    </div>
    <center>
      <button class="button-pro" type="submit" style="color: black;">Submit</button>
    </center>
  </form>
</div>

  </section>




  <footer class="page-footer">
    <p class="copyright-text">Copyright &copy;  HomTown | designed by sakina</p>
  </footer>

    <!-- Script to close the success message -->
    <script>
    function closeSuccessMessage() {
      var successMessage = document.querySelector('.success-message');
      successMessage.style.display = 'none';
    }
  </script>
</body>
</html>
