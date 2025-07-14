<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/php.css" />
  <link rel="icon" type="image/png" href="images/hoom.ico">
  <title>User Register</title>
  <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Bebas+Neue&family=Flow+Circular&family=Great+Vibes&family=Kablammo&family=Kanit:ital,wght@0,400;1,300;1,400;1,500&family=Lobster&family=Merriweather+Sans:wght@700&family=Philosopher:wght@700&family=Roboto:wght@100;700&display=swap" rel="stylesheet">
  <style>
    body {
      height: 110vh;
    }
    .base-div {
      display: flex;
      flex-direction: column;
      width: 500px;
      height: 600px;
      margin-top: 90px;
      margin-left: auto;
      margin-right: auto;
      align-items: center;
    }
    .logo-div {
      width: 50%;
      margin-top: 30px;
      padding-top: 10px;
      margin-bottom: 10px;
    }
    .Hometown-text {
      width: 200px;
      font-family: Lobster;
      font-size: 40px;
      font-weight: 600px;
      letter-spacing: 2px;
      color: #b2b3b3;
      margin-left: auto;
      margin-right: auto;
      margin-top: 0%;
    }
    .singup-detels {
      width: 100%;
      margin: 0%;
      padding-top: 10px;
      display: grid;
      grid-template-columns: 1fr;
      row-gap: 18px;
      margin-bottom: 20px;
    }
    .text-input {
      padding: 15px;
      padding-left: 10px;
      background: transparent;
      max-width: 100%;
      border-color: #60777F;
      border-style: solid;
      border-radius: 25px;
    }
    .button-singup {
      padding: 12px;
      font-family: Lobster;
      border: none;
      border-radius: 60px;
      background-color: teal;
      cursor: pointer;
      transition: background-color 0.15s;
      width: 50%;
      margin-left: 25%;
    }
    .button-singup:hover {
      background-color: #52aeae;
    }
    .login {
      text-align: center;
    }
    .input-name {
      width: 49%;
      padding: 15px;
      padding-left: 10px;
      background: transparent;
      max-width: 100%;
      border-color: #60777F;
      border-style: solid;
      border-radius: 25px;
    }
    .registration-text a {
      text-decoration: none;
      color: rgb(8, 8, 8);
      font-family: Arial;
      text-align: center;
    }
    .registration-text a:hover {
      text-decoration: underline;
    }

   .pra {
    font-family: cursive;
    font-size: 20px;
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
          <a href="findPro.php">Find Professional</a>
          <!-- DROPDOWN MENU -->
          <ul class="dropdown">
            <li><a href="findPro.html">Contracting Company</a></li>
            <li><a href="findPro.html">Contractor</a></li>
          </ul>
        </li>
        <li><a href="contact_us.html">Contact Us</a></li>
        <li><a href="about_us.html">About</a></li>
      </div>
    </ul>
  </nav>
  <div class="base-div">
    <div class="logo-div">
      <div><p class="Hometown-text">HomTown</p> </div>
    </div>
    <form class="singup-detels" action="user_rej.php" method="POST" aria-autocomplete="on">
      <div style="display: flex;flex-direction: row;justify-content: space-between;">
      <input class="input-name" type="text" name="firstname" placeholder="Firstname">
      <input class="input-name" type="text" name="lastname" placeholder="Lastname">

      </div>
      <input class="text-input" type="text" name="username" placeholder="Username">
      <input class="text-input" type="email" name="email" placeholder="E-Mail">
      <input class="text-input" type="password" name="password" placeholder="Password">
      <input class="text-input" type="password" name="confirm_password" placeholder="Confirm Password" required>
      <button class="button-singup" type="submit">Sign Up</button>
    </form>
    <p class="login">Already a member? <a style="color: rgb(255, 0, 0); font-family: Arial;" href="login.html">Login</a></p>
  </div>
  <div class="registration-link">
    <center>
    <p class="pra">If you want to enroll as a professional:</p>
      <button class="button-pro">
        <a href="pro_regaster.php">As Pro</a>
      </button>
    </center>
  </div>
  <footer class="page-footer">
    <p class="copyright-text">Copyright &copy; HomTown | designed by sakina</p>
  </footer>
</body>
</html>
