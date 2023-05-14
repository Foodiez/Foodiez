<?php
    include ('../config/constants.php');
    $id=$_GET['id'];
    session_start();
    $user_id=$_SESSION['user_id'];//user id
    $sql="DELETE FROM orders where food_id=$id and user_id=$user_id";
    $res=mysqli_query($conn, $sql);
    header("location:http://localhost/Foodiez/user/cart.php?id=".-1);

?>