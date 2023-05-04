<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update admin</title>
</head>
<body>
    <?php 
        include 'navbar.php';
        $id=$_GET['id'];
        $sql="SELECT * FROM admin where id=$id";
        $res=mysqli_query($conn, $sql);
        if($res==TRUE)
        {
          $count=mysqli_num_rows($res);
          if($count==1)
          {
            $row=mysqli_fetch_assoc($res);
            $fullname=$row['fullname'];
            $username=$row['username'];
          }
          else
          {
            header("location:".URL_1);
          }

        }
        
    ?>
<div style="padding: 20px;" class="max-w-md mx-auto">
  <form action="" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <div class="mb-4">
      <label class="block text-gray-700 font-bold mb-2" for="fullname">
        Full name
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="fullname" name="fullname" type="text" value='<?php echo $fullname?>'>
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 font-bold mb-2" for="username">
        Username
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" name="username" type="text" value='<?php echo $username?>'>
    </div>
    <div class="flex items-center justify-between">
        <input type='hidden' name='id' value='<?php echo $id; ?>'>
        <button type="submit" name="submit" class="bg-gray-400 hover:bg-gray-500 text-black font-bold py-2 px-4 rounded-full">
  		    Update
        </button>
    </div>
  </form>
</div>
</body>
</html>

<?php

if (isset($_POST['submit'])) {
 // Get form data
$id = $_POST['id']; 
$fullname = $_POST['fullname'];
$username = $_POST['username'];


$sql = "UPDATE admin SET username='$username', fullname='$fullname' WHERE id='$id'";

$res=mysqli_query($conn, $sql);
if($res==TRUE)
{
  header("location:http://localhost/Foodiez/admin/display_message_1.php");
}
else
{
  header("location:http://localhost/Foodiez/admin/display_message_2.php");
}
}

?>