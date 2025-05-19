<?php
session_start();
include "connection.php";

if (!isset($_SESSION['id'])) {
   header("Location:index.php");
}
if (isset($_GET['course_id'])) {
   $course_id = $_GET['course_id'];
   $userid = $_SESSION['id'];
   $newq = "SELECT * FROM course_enroll WHERE courseid={$course_id} and userid={$userid}";
   $r = mysqli_query($con, $newq);
   if (mysqli_num_rows($r) > 0) {
      $fetch = "select * from lectures where course_id=$course_id";
      $q = mysqli_query($con, $fetch);
   } else {
      $enroll = "insert into course_enroll(userid,courseid,enrollment_date)values($userid,$course_id,now())";
      $f = mysqli_query($con, $enroll);

      $chck = "SELECT * FROM course_enroll WHERE courseid={$course_id} and userid={$userid}";
      $j = mysqli_query($con, $chck);
      if (mysqli_num_rows($j) == 0) {
?>
         <script>
            window.location.href = "userdash.php";
         </script>
<?php
      }
   }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Lectures</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
   <!-- custom css file link  -->
   <link rel="stylesheet" href="lcss/style.css">

</head>

<body>
   <a href="userdash.php"><img src="images/backimg.png" alt='back' height="45px"></a>
   <p>Back</p>
   <div class="container">
      <?php
      echo "<div class='main-video-container'>";
      $lec = "select * from lectures where course_id=$course_id";
      $d = mysqli_query($con, $lec);
      if (mysqli_num_rows($d) > 0) {
         $row = mysqli_fetch_assoc($d);
         echo "<video src='admin/lectures/$row[path]' loop controls class='main-video'></video>";
         echo "<h3 class='main-vid-title'>$row[title]</h3>";
         echo "</div>";
         mysqli_data_seek($d, 0);
         echo "<div class='video-list-container'>";
         while ($row = mysqli_fetch_assoc($d)) {
            echo "<div class='list'>";
            echo "<video src='admin/lectures/$row[path]' class='list-video'></video>";
            echo "<h3 class='list-title'>$row[title]</h3>";
            echo "</div>";
         }
         echo "</div>";
      }
      ?>
      <a href='materiallist.php?course_id=<?php echo $course_id; ?>'><button>Click here for material</button></a>
   </div>
   <!-- custom js file link  -->
   <script src="ljs/script.js"></script>
</body>

</html>