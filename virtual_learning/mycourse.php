<?php
include "usernav.php";

if (!isset($_SESSION['id'])) {
  header("Location:index.php");
}

include "connection.php";


?>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .card {
      background-image: linear-gradient(#0c096b, #030140);
      color: white;
      border: 2px solid darkblue;
      border-radius: 20px;
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .button {
      background-color: #e61c0e;
      border: 2px solid darkblue;
      color: white;
    }

    .button:hover {
      background-color: darkblue;
      box-shadow: 0 0 18px #e61c0e;
      border: 2px solid #e61c0e;
    }

    .card img {
      height: auto;
      border-radius: 20px;
      display: block;
      margin: 1rem auto 0 auto;
    }

    .card-body {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      flex-grow: 1;
    }

    .card-text {
      flex-grow: 1;
    }

    h3 {
      border-bottom: 2px solid black;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row justify-content-center">
      <?php
      $sub = "select * from course";
      $result = mysqli_query($con, $sub);
      $userid = $_SESSION['id'];
      if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
          $course_id = $row['course_id'];
          $snm = $row['title'];
          $simg = $row['image'];
          $sinfo = $row['description'];

          echo "<div class='col-md-4 col-sm-12 mt-3 d-flex'>";
          echo "<div class='card p-4 h-100'>";
          echo "<img src='images/$simg' class='card-img-top img-responsive img-fluid' alt='$snm'>";
          echo "<div class='card-body'>";
          echo "<h5 class='card-title'>$snm</h5>";
          echo "<div class='card-text'>";
          echo "<p class='card-text'>$sinfo</p>";
          echo "</div>";
          echo "<form action='lectures.php' method='get'>";
          echo "<input type='hidden' name='course_id' value='$course_id'>";
          echo "<button class='btn btn-outline-primary button' name='enroll'><b>Enroll</b></button>";
          echo "</form>";
          echo "</div>";
          echo "</div>";
          echo "</div>";
        }
      }
      ?>
    </div>
  </div>
  <br><br><?php include "footer.php"; ?>
</body>

</html>