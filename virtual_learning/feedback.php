<?php 
    include "connection.php";
    if(isset($_POST['submit']))
    {
      $q = "INSERT INTO Feedback (email, feedback) VALUES ('".$_POST['t2']."','".$_POST['t3']."')";
      if(mysqli_query($con, $q))
      {
        echo "<div class='alert alert-success'>Feedback submitted successfully!</div>";
      }
      else
      {
        echo "<div class='alert alert-danger'>Error: ". mysqli_error($con) ."</div>";
      }

      // Don't close the connection here, as it might be used elsewhere in the script
      // mysqli_close($con);
    }
 ?>
<!doctype html>
<html lang="en">
<head>
  <?php include "connection.php"?>
  <?php include "usernav.php"?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feedback</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f2f2f2;
      font-family: Arial, sans-serif;
    }
    .container {
      width: 50%;
      margin: 40px auto;
      padding: 20px;
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .form-group {
      margin-bottom: 20px;
    }
    label {
      font-weight: bold;
    }
    input[type="email"], textarea {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    input[type="submit"] {
      background-color: #002366;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #0000A0;
    }
    
    </style>
</head>
<body>
  <div class="container">
    <h2>FEEDBACK!!</h2>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
      <div class="form-group">
       <br> <label for="email">E-MAIL:</label>
        <input type="email" name="t2" placeholder="ENTER YOUR EMAIL:" required>
      </div>
      <div class="form-group">
        <label for="feedback">FEEDBACK:</label>
        <textarea name="t3" placeholder="ENTER YOUR FEEDBACK:" rows="3" cols="30" required></textarea>
      </div>
      <input type="submit" name="submit" value="Submit">
    </form>
  </div>
  <?php include "footer.php" ?>
</body>
</html>
