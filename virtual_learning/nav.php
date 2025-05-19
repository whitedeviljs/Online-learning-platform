<?php
  $current_page = basename($_SERVER['PHP_SELF']);
?>
<html>
<head>
<style>
  .sbtn {
    background-color: transparent;
    border: 2px solid cyan;
    border-radius: 10px;
    color: white;
    padding: 5px;
  }

  .sbtn:hover {
    box-shadow: 0 0 15px cyan;
    text-shadow: 0 0 10px cyan;
    color: cyan;
  }

  .navbar {
    background-color: #030140;
    font-size: 18px;
  }

  .nav-link:hover {
    color: cyan;
    text-shadow: 0 0 20px cyan;
  }

  .nav-link.active {
    color: cyan !important;
  }
</style>
</head> 
<header>
<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="logo" height="40px"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end bg-dark" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
      <img src="logo.png" height="40px" style="border-radius:50%" alt="logo">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link <?php if ($current_page == 'index.php') echo 'active'; ?>" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if ($current_page == 'course.php') echo 'active'; ?>" class="course" href="course.php">Courses</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if ($current_page == 'about.php') echo 'active'; ?>"" href="about.php">About us</a>
          </li>
        </ul>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <a href='Signup.php' class='sbtn'>Signup/Login</a>
        </form>
      </div>
    </div>
  </div>
</nav>
</header>
</html>