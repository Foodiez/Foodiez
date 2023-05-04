<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add category</title>
</head>
<body>
    <?php 
        include 'navbar.php'
    ?>
<div style="padding: 20px;" class="max-w-md mx-auto">
  <form action="" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">
    <div class="mb-4">
      <label class="block text-gray-700 font-bold mb-2" for="title">
        Title
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" name="title" type="text" placeholder="Enter title">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 font-bold mb-2" for="image">
        Select Image
      </label>
      <input type="file"  name="image">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 font-bold mb-2" for="featured">
        Featured
      </label>
      <input type="radio" value="Yes" name="featured" class="form-radio h-4 w-4 text-indigo-600">
      <label class="ml-2 text-gray-700">Yes</label>
      <input type="radio" value="No" name="featured" class="form-radio h-4 w-4 text-indigo-600">
      <label class="ml-2 text-gray-700">No</label>
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 font-bold mb-2" for="active">
        Active
      </label>
      <input type="radio" value="Yes" name="active" class="form-radio h-4 w-4 text-indigo-600">
      <label class="ml-2 text-gray-700">Yes</label>
      <input type="radio" value="No" name="active" class="form-radio h-4 w-4 text-indigo-600">
      <label class="ml-2 text-gray-700">No</label>
    </div>
    <div class="flex items-center justify-between">
        <button type="submit" name="submit" class="bg-gray-400 hover:bg-gray-500 text-black font-bold py-2 px-4 rounded-full">
  		    Submit
        </button>
    </div>
  </form>
</div>
</body>
</html>

<?php

if (isset($_POST['submit'])) {
 // Get form data
$title = $_POST['title'];



if (isset($_POST['featured']))
{
  $featured = $_POST['featured'];
}
else
{
  $featured = "No";
}
if (isset($_FILES['image']['name']))
{
  $image_name=$_FILES['image']['name'];
  $source_path=$_FILES['image']['tmp_name'];
  $destination_path="";
}
else
{
  $image_name="";
}

{
  $active = $_POST['active'];
}

if (isset($_POST['active']))
{
  $active = $_POST['active'];
}
else
{
  $active = "No";
}

$sql = "INSERT INTO category (title, featured, active) VALUES ('$title', '$featured', '$active')";

$res=mysqli_query($conn, $sql) or die(mysqli_error());


if ($res==TRUE) {
  header("location:http://localhost/Foodiez/admin/display_message_1.php");
  } else {
    header("location:http://localhost/Foodiez/admin/display_message_2.php");
  }
}

?>