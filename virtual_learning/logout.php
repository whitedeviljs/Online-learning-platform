<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['unm']);
session_destroy();
header("Location:index.php");
?>