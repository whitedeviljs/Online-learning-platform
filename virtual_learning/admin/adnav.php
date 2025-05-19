<?php
session_start();
$current_page = basename($_SERVER['PHP_SELF']);
?>
<html>
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
  p{
    color:white;  
    margin-top:5px;
    font-style:italic;
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
<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="admindash.php"><img src="images/logo.png" alt="logo" height="40px"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end bg-dark" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <img src="logo.png" height="40px" style="border-radius:50%" alt="logo">
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link <?php if ($current_page == 'admindash.php') echo 'active'; ?>" aria-current="page" href="admindash.php">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if ($current_page == 'addsubj.php') echo 'active'; ?>" href="addsubj.php">Courses</a>
          </li>        
          <li class="nav-item">
            <a class="nav-link <?php if ($current_page == 'showfeedback.php') echo 'active'; ?>" href="showfeedback.php">Feedback</a>
          </li>
        </ul>
        <?php
          if(isset($_SESSION['id'])){
            ?>
            <p>Welcome &nbsp;<b><?php echo $_SESSION['unm'];?></b></p>
              <a href="logout.php">Logout</a>
            <?php
          }
          
        ?>
        <!-- <button class="btn btn-primary d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasResponsive" aria-controls="offcanvasResponsive">Toggle offcanvas</button> -->
        <!-- <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Profile</button>-->
      </div>
    </div>
  </div>
</nav>
</html>