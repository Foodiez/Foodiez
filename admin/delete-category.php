<?php
    include ('../config/constants.php');
    $id=$_GET['id'];
    $sql="DELETE FROM category where id=$id";
    $res=mysqli_query($conn, $sql);
    if($res==TRUE)
{
  header("location:http://localhost/Foodiez/admin/display_message_1.php");
}
else
{
  header("location:http://localhost/Foodiez/admin/display_message_2.php");
}
?>