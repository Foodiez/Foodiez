<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update category</title>
</head>
<body>
    <?php 
        include 'navbar.php';
        $id=$_GET['id'];
        $sql="SELECT * FROM category where id=$id";
        $res=mysqli_query($conn, $sql);
        if($res==TRUE)
        {
          $count=mysqli_num_rows($res);
          if($count==1)
          {
            $row=mysqli_fetch_assoc($res);
            $title=$row['title'];
          }
          else
          {
            header("location:http://localhost/Foodiez/admin");
          }

        }
        
    ?>
<div style="padding: 20px;" class="max-w-md mx-auto">
  <form action="" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <div class="mb-4">
      <label class="block text-gray-700 font-bold mb-2" for="title">
        Title
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" name="title" type="text" value='<?php echo $title?>'>
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
$title = $_POST['title'];


$sql = "UPDATE category SET title=$title WHERE id='$id'";

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