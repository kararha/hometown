<?php
// Start the session at the very beginning of your PHP script
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="auto">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/php.css" />
  <link rel="website icon" type="png"
    href="images/hoom.ico" </link>
  <title>Find Trusted Construction Professionals</title>
  <style>
  body {
    margin-top: 4.2rem;
  }

  .home-section-0,
  .home-section-1,
  .home-section-2,
  .home-section-3,
  .home-section-4 {
    
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 50px 0;
  }

  .container {
    width: 80%;
    max-width: 1200px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    margin-bottom: 50px; /* Added margin bottom for spacing between sections */
    transition: box-shadow 0.3s cubic-bezier(0.165, 0.84, 0.44, 1), transform 0.3s cubic-bezier(0.165, 0.84, 0.44, 1); /* Added cubic-bezier for smooth transition */
  }

  .container:hover {
    box-shadow: 0 0 20px rgba(120, 205, 233, 0.7); /* Light blue color */
    transform: scale(1.05); /* Expand the section by 5% */
  }

  .content {
    flex: 1;
    padding: 50px;
  }

  .content h2 {
    font-size: 2rem;
    color: #333;
    margin-bottom: 20px;
  }

  .content p {
    font-size: 1.1rem;
    line-height: 1.6;
    color: #666;
  }

  .image {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .image-box {
    width: 80%;
    max-width: 300px;
    border-radius: 10px;
    overflow: hidden;
    border: 2px solid #ccc;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  .image-box img {
    width: 100%;
    height: auto;
    border-radius: 10px;
  }

  .hi {
  font-size: 4vw;
  text-transform: uppercase;
  text-align: center;
  line-height: 1;
}

.fancy {
  @supports (background-clip: text) or (-webkit-background-clip: text) {
    background-image: 
      url("data:image/svg+xml,%3Csvg width='2250' height='900' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cg%3E%3Cpath fill='%2300A080' d='M0 0h2255v899H0z'/%3E%3Ccircle cx='366' cy='207' r='366' fill='%2300FDCF'/%3E%3Ccircle cx='1777.5' cy='318.5' r='477.5' fill='%2300FDCF'/%3E%3Ccircle cx='1215' cy='737' r='366' fill='%23008060'/%3E%3C/g%3E%3C/svg%3E%0A");
    background-size: 50% auto;
    background-position: center;
    color: transparent;
    -webkit-background-clip: text;
    background-clip: text;
  }
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
                <li><a href="findPro.html">Contractor</a></li>
              </ul>
    
            </li>
    
            <li><a href="contact_us.php">Contact us</a></li>
            <li><a href="about_us.html">About</a></li>
            <?php
              // Check if the user is logged in and if the image path is available in session
              if(isset($_SESSION['logged_in'])) {
                  // Check if the user is a professional user and if the image path is available in session
                  if(isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'professional' && isset($_SESSION['prof_image'])) {
                      echo '<li class="user-image"><a href="professional_dashboard.php"><img src="' . $_SESSION['prof_image'] . '" alt="User Image"></a></li>';
                  }
                  // Check if the user is a regular user and if the image path is available in session
                  elseif(isset($_SESSION['nor_image'])) {
                      echo '<li class="user-image"><a href="nor_user_dashboard.php"><img src="' . $_SESSION['nor_image'] . '" alt="User Image"></a></li>';
                  }
              }
              ?>

          </div>
        </ul>
      </nav>


  
<section class="home-section-0">
    <div class="container">
        <p class="hi">You are one step closer to <span class="fancy">finding your professional!</span></p>
    </div>
  </section>
<section class="home-section-1">
  <div class="container">
    <div class="content">
      <h2>Interior Design</h2>
      <p>Interior design is the art and science of enhancing the interior of a building to achieve a healthier and more aesthetically pleasing environment for the people using the space. An interior designer is someone who plans, researches, coordinates, and manages such enhancement projects.</p>
    </div>
    <div class="image">
      <div class="image-box">
        <img src="https://images.pexels.com/photos/1090638/pexels-photo-1090638.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Interior Design">
      </div>
    </div>
  </div>
</section>

<section class="home-section-2">
  <div class="container">
    <div class="content">
      <h2>Architects & Building Designers</h2>
      <p>Architects and building designers create the spaces in which we live, work, and play. They are responsible for designing buildings that are functional, safe, and aesthetically pleasing. Whether it's a home, office building, or public space, architects and building designers use their creativity and technical skills to bring their clients' visions to life.</p>
    </div>
    <div class="image">
      <div class="image-box">
        <img src="https://images.pexels.com/photos/4491459/pexels-photo-4491459.jpeg?auto=compress&cs=tinysrgb&w=600" alt="ولكممممم هذا مهندسسسس">
      </div>
    </div>
  </div>
</section>

<section class="home-section-3">
  <div class="container">
    <div class="content">
      <h2>Painters</h2>
      <p>Painters are artists who specialize in applying paint to various surfaces, such as walls, ceilings, and furniture. They use different techniques and tools to create beautiful and visually appealing finishes. Whether it's a residential or commercial project, painters play a crucial role in transforming spaces and enhancing their appearance.</p>
    </div>
    <div class="image">
      <div class="image-box">
        <img src="https://images.pexels.com/photos/5691471/pexels-photo-5691471.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Painters">
      </div>
    </div>
  </div>
</section>

<section class="home-section-4">
  <div class="container">
    <div class="content">
      <h2>Roofing & Gutters</h2>
      <p>Roofing and gutters are essential components of a building's structure, protecting it from water damage and other environmental elements. Roofing contractors specialize in installing and repairing roofs, while gutter contractors focus on maintaining and installing gutters to ensure proper drainage. Together, they help safeguard homes and buildings from potential damage.</p>
    </div>
    <div class="image">
      <div class="image-box">
        <img src="https://images.pexels.com/photos/8853521/pexels-photo-8853521.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Roofing & Gutters">
      </div>
    </div>
  </div>
</section>

<section class="home-section-4">
  <div class="container">
    <div class="content">
      <h2>what are you thinking about ?</h2>
      <p>Have you thought about your problem more than finding a good contractor or contracting company, or are you finding it difficult to find an interior designer, plumber, or painter? Do not worry, you are safe. Our website helps you find everything mentioned in the easiest ways possible.</p>
    </div>
    <div class="image">
      <!-- <div class="image-box"> -->
        <button style="margin-right: 5px;" class="button-pro"><a href="contact_us.php">contact us</a></button>
        <button class="button-pro"><a href="about_us.html">about us</a></button>
        <!-- <img src="images/wide.jpg" alt="Roofing & Gutters"> -->
      </div>
    </div>
  </div>
</section>



<footer class="page-footer">
  <p class="copyright-text">Copyright &copy;  HomTown | designed by sakina</p>
</footer>

</body>
</html>
