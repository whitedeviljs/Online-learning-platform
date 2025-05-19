<?php
    include "connection.php";
    include "adnav.php";
    if(isset($_POST['submit']))
    {
        $file=$_FILES['file']['name'];
        $ins="insert into course(title,image,description)values('".$_POST['subnm']."','$file','".$_POST['subinfo']."')";
        $q=mysqli_query($con,$ins);
    }
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
            input[type="text"], input[type="file"] {
                width: 100%;
                height: 40px;
                padding: 10px;
                border: 1px solid #cccccc;
                border-radius: 5px;
            }
            input[type="submit"], button[type="button"] {
                background-color: white;
                color: #030140;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }
            input[type="submit"]:hover, button[type="button"]:hover {
                background-color: #01005A;
                color: white;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2>Course Form</h2>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="file">Select File:</label>
                    <input type="file" name="file" required>
                </div>
                <div class="form-group">
                    <label for="subnm">Enter Name:</label>
                    <input type="text" name="subnm" placeholder="Enter name" required>
                </div>
                <div class="form-group">
                    <label for="subinfo">Enter Description:</label>
                    <input type="text" placeholder="Enter description" name="subinfo">
                </div>
                <input type="submit" name="submit" value="Submit"><br><br>
                <button type="button"><a href='addlectures.php' style="text-decoration: none;">Add lectures</a></button>
                <button type="button"><a href='addmaterial.php' style="text-decoration: none;">Add material</a></button>
            </form>
        </div>
    </body>
</html> 