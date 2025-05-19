<?php
    include "connection.php";
    include "adnav.php";
    $fetch="select * from feedback ";
    $q=mysqli_query($con,$fetch);
    if(mysqli_num_rows($q)>0)
    {
        echo "<div class='container' style='margin-top: 50px'>";
        echo "<table class='table table-bordered table-striped'>";
        echo"<thead class='table-dark'>";
          echo"<tr>";
            echo"<th scope='col' style='background-color: #030140; color: white;'>Id</th>";
            echo"<th scope='col' style='background-color: #030140; color: white;'>Email</th>";
            echo"<th scope='col' style='background-color: #030140; color: white;'>Feedback</th>";
          echo"</tr>";
        echo"</thead>";
        echo"<tbody>";
        while($row=mysqli_fetch_assoc($q))
        {  
        echo"<tr>";
            echo"<th scope='row' class='table-'>".$row['id']."</th>";
            echo"<td>".$row['email']."</td>";
            echo"<td>".$row['feedback']."</td>";
        echo"</tr>";
        }
        echo"</tbody>";
        echo"</table>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedbacks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
</html>