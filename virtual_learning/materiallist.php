<?php
include "connection.php";
// session_start();
if (isset($_GET['course_id'])) {
    $id = $_GET['course_id'];
    $q="SELECT * FROM material WHERE course_id=$id";
    $r=mysqli_query($con,$q);
}
?>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php
if(mysqli_num_rows($r)>0)
{
    echo"<table class='table' class='table-striped'>";
    echo"<thead class='table-dark'>";
    echo"<tr>";
    echo"<th scope='col'>Unit</th>";
    echo"<th scope='col'>Preview</th>";
    echo"<th scope='col'>Download</th>";
    echo"</tr>";
    echo"</thead>";
    echo"<tbody>";
    while($row=mysqli_fetch_assoc($r))
    {
        echo"<tr>";
        echo"<td>".$row['file']."</td>";
        echo"<td><a href='admin/material/".$row['file']."' target='_blank'><button>Preview</button></a></td>";
        echo"<td><a href='admin/material/".$row['file']."' download><button>Download</button></a></td>";
        echo"</tr>";
    }
    echo"</tbody>";
    echo"</table>";
}
?>
</body>
</html>
