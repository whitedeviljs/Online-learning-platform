<?php
include "connection.php";
$fetch = "select * from course";
$ex = mysqli_query($con, $fetch);
if (isset($_POST['submit'])) {
    $filename = $_FILES['pdf']['name'];
    $tmpname = $_FILES['pdf']['tmp_name'];
    $path = 'material/' . $filename;
    move_uploaded_file($tmpname, $path);
    $course_id = $_POST['course_id'];
    $add = "insert into material(course_id,file)values('$course_id','$filename')";
    $q = mysqli_query($con, $add);
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
            margin: 100px auto;
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

        input[type="text"],
        input[type="file"],
        select {
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

        p {
            margin-left: 5px;
            font-size: 20px;
            font-family: serif;
        }

        input[type="file"] {
            padding: 5px;
        }
    </style>
<body>
    <a href="admindash.php"><img src="images/backimg.png" alt='back' height="35px"></a>
    <p>Back</p>
    <div class="container">
        </a>
        <h2>Material Form</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="course_id">Select Course:</label>
                <select name="course_id" required>
                    <option>Select subject</option>
                    <?php
                    while ($row = mysqli_fetch_assoc($ex)) {
                        echo '<option value="' . $row['course_id'] . '">' . $row['title'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="pdf">Upload Material:</label>
                <input type="file" name="pdf" required>
            </div>
            <input type="submit" name="submit" value="Add Material">
        </form>
    </div>
</body>

</html>