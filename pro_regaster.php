<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"> -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="website icon" type="png"
    href="images/hoom.ico" </link>
    <link rel="stylesheet" href="css/php.css">
    <title>register form</title>
    <style>
      body {
        height: 200vh;
      }
 .base-div{
  display: flex;
  flex-direction: column;
  width: 500px;
  height: 600px;
  margin-top: 90px;
  margin-left: auto;
  margin-right: auto;
  align-items: center;
}

.logo-div{
  width: 50%;
  margin-top: 30px;
  padding-top: 10px;
  margin-bottom: 10px;
}

.Hometown-text{
  width: 200px;
  font-family:Lobster;
  font-size: 40px;
  font-weight: 600px;
  letter-spacing: 2px;
  color:#b2b3b3;
  margin-left: auto;
  margin-right: auto;
  margin-top: 0%;
  
}

.singup-detels{
  width: 100%;
  margin: 0%;
  padding-top: 10px;
  display: grid;
  grid-template-columns: 1fr;
  row-gap: 18px;
  margin-bottom: 20px;

}



.text-input{
  padding: 15px;
  padding-left: 10px;
  background: transparent;
  max-width: 100%;
  border-color:   #60777F;
  border-style: solid;
  border-radius: 25px;
}


.button-singup{
  padding: 12px;
  font-family:Arial;
  border: none;
  border-radius: 60px;
  background-color:teal;
  cursor: pointer;
  transition: background-color 0.15s;
  width: 50%;
  margin-left: 25%;

}
.button-singup:hover{
  background-color: #52aeae;
}

.login{
  text-align: center;
}




.input-name{
  width: 49%;
  padding: 15px;
  padding-left: 10px;
  background: transparent;
  max-width: 100%;
  border-color:   #60777F;
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
        <li><a href="login_form.php">Login</a></li>

        <li class="services">
          <a href="findPro.php">Find Profisstional</a>

          <!-- DROPDOWN MENU -->
          <ul class="dropdown">
            <li><a href="/">Contracting company </a></li>
            <li><a href="/">Contractor</a></li>
          </ul>

        </li>

        <li><a href="contact_us.php">Contact us</a></li>
        <li><a href="about_us.html">About</a></li>
      </div>
    </ul>
  </nav>

  <div class="base-div" >
  <div class="logo-div" >
    <div ><p class="Hometown-text">HomeTown</p> </div>
  </div>
  
  <form action="pro_rej.php" method="post" enctype="multipart/form-data">
  <div class="singup-detels" >
   <div  style="display: flex;flex-direction: row;justify-content: space-between; ">
          <input class="input-name" type="text" name="firstname" placeholder="Firstname">
          <input class="input-name" type="text" name="lastname" placeholder="Listname">
    </div>
    <input class="text-input" type="text" name="username" placeholder="Username">
    <input class="text-input" type="password" name="password" required placeholder="enter your password">
    <input class="text-input" type="password" name="cpassword" required placeholder="confirm your password">
    <input class="text-input" type="text" name="job_name" placeholder="Job name">
    <input class="text-input" type="text" name="description" required placeholder=" your Description">
    <input class="text-input" type="text" name="company_name" placeholder="company name">
    <input class="text-input" type="text" name="address" required placeholder=" your address">
    <input class="text-input" type="email" name="email" required placeholder="enter your email">
    <input class="text-input" type="text" name="phone" required placeholder=" your Phone">
    <label for="profile_image">Profile Image:</label>
    <input class="text-input" type="file" name="profile_image" accept="image/*" required>
    <button class="button-singup" type="submit">Sgin Up</a></button>

    <p class="login">  I'm Already Member ? <a  style="color: rgb(255, 0, 0); font-family: Arial;"  href="login.html">Login</a></p>
    </form>
  </div>
<div class="registration-link">
   <p class="registration-text"><a href="#">Register as a regular user</a></p>
</div>
</div>
<!-- لهنا ينتهي -->
  <footer class="page-footer">
  <p class="copyright-text">Copyright &copy;  HomTown | designed by sakina</p>
</footer>
    

</body>
</html>