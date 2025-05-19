<?php
    // session_start();
    include "usernav.php";
    include "connection.php";
    $id=$_SESSION['id'];
    $fetch="select course_enroll.userid,course.title,course.course_id from course_enroll inner join course on course_enroll.userid={$id} and  course_enroll.courseid=course.course_id  ";
    $ex=mysqli_query($con,$fetch);  
?>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            .subjects
            {
                height:200px;
                width: 200px;
                background-color:lightcoral;
                border-color:2px solid coral;
                padding:auto;
                display:flex;
                align-items: center;
                justify-content: center;
                color:black;
                text-decoration: none;
            }
            .container
            {
                display:flex;
                align-items: center;
                justify-content: space-between;
            }
        </style>
    </head>
    <body>
        <div class="container">
             <?php
            while($row=mysqli_fetch_assoc($ex))
            {
                $course_id=$row['course_id'];
                    echo"<a href='materiallist.php?course_id=$course_id'><div class='subjects'>";
                    echo $row['title'];
                    echo"</div></a>";
            }   
            ?> 
        </div>
    </body>
</html>