<?php
    define('URL_1','http://localhost/Foodiez/admin/manage-admin.php');
    $conn = mysqli_connect('localhost','root','') or die(mysqli_error());
    $db_select=mysqli_select_db($conn, 'food-order') or die(mysqli_error());
?>