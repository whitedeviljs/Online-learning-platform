<?php
    if(isset($_POST['sl']))
    {
       header("location:Signup.php");
    }  
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="logo.png" rel="icon" type="image/png">
  <?php include "connection.php"?>
  <style>
    /* .carousel-inner
    {
        margin-left:300px;
    } */
  </style>
</head>
<body>
<header>
<?php include "nav.php"?>
</header>
<div class="container-fluid">
<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/clang.png" class="d-block w-100" alt="C">
    </div>
    <div class="carousel-item">
      <img src="images/cs.png" class="d-block w-100" alt="C++">
    </div>
    <div class="carousel-item">
      <img src="images/cplus.png" class="d-block w-100" alt="C#">
    </div>
  </div>
</div>
</div>
</body>
</html>
<?php include "footer.php"?> 


