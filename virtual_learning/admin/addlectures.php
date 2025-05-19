<?php
    include "connection.php";
    $fetch = "select * from course";
    $ex = mysqli_query($con, $fetch);
?>

<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f2f2f2;
            }
            .container {
                max-width: 50%;
                margin: 40px auto;
                background-image: url("bg.jpg");
                color: white;
                padding: 20px;
                border: 1px solid #dddddd;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            .form-group {
                margin-bottom: 20px;
            }
            .form-group label {
                display: block;
                margin-bottom: 10px;
            }
            input[type="text"], input[type="file"], select {
                width: 100%;
                height: 40px;
                padding: 10px;
                border: 1px solid #cccccc;
                border-radius: 5px;
            }
            input[type="submit"] {
                background-color: white;
                color: #030140;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }
            input[type="submit"]:hover {
                background-color: #01005A;
                color: white;
            }

            input[type="file"] {
            padding: 5px;
        }
        p{
            padding-left: 5px;
            font-size: 20px;
            font-family: serif;
        }
        </style>
    </head>
    <body>
    <a href="admindash.php"><img src="images/backimg.png" alt='back' height="35px"></a>
    <p>Back</p>
        <div class="container">
            <h2>Lecture Form</h2>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Select Course:</label>
                    <select name="course_id" required>
                        <option>Select subject</option>
                        <?php
                        while ($row = mysqli_fetch_assoc($ex))
                        {
                            echo '<option value="' . $row['course_id'] . '">' . $row['title'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Upload Video:</label>
                    <input type="file" name="lectures" required>
                </div>
                <div class="form-group">
                    <label>Title:</label>
                    <input type="text" name="title" value="Add Title" required>
                </div>
                <input type="submit" name="submit" value="Add Lecture">
                <?php
                if (isset($_POST['submit'])) {
                    $filename = $_FILES['lectures']['name'];
                    $tmpname = $_FILES['lectures']['tmp_name'];
                    $filesize=$_FILES['lectures']['size'];
                    $maxsize=104857600;
                    $filetype=strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                    if($filetype ==='mp4')
                    {
                        if($filesize<=$maxsize)
                        {
                            $path = 'lectures/' . $filename;
                            move_uploaded_file($tmpname, $path);
                            $course_id=$_POST['course_id'];
                            $add = "insert into lectures(course_id,title,path)values('$course_id','".$_POST['title']."','$filename')";
                            $q = mysqli_query($con, $add);
                        }
                        else
                        {
                            echo"file size exceeds the maximum limit.";
                        }
                    }
                    else
                    {
                        echo "Only mp4 video type is allowed";
                    }
                }
                ?>
            </form>
        </div>
    </body>
</html>