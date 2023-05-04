<?php include('../config/constants.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css">
</head>
<body>
<nav class="bg-gray-800 py-4">
    <div class="container mx-auto flex justify-between items-center px-4">
      <a href="#" class="text-white font-bold text-xl">FoodieZ</a>
    </div>
  </nav>
<div class="flex flex-col justify-center items-center min-h-screen">
<h1 class="text-3xl font-bold mb-6">Login to Your Account</h1>
<div style="padding: 20px;" class="max-w-md mx-auto">
  <form action="" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <div class="mb-4">
      <label class="block text-gray-700 font-bold mb-2" for="username">
        Username
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" name="username" type="text" placeholder="Enter username">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 font-bold mb-2" for="password">
        Password
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password" placeholder="Enter password">
    </div>
    <div class="flex items-center justify-between">
        <button type="submit" name="submit" class="bg-gray-400 hover:bg-gray-500 text-black font-bold py-2 px-4 rounded-full">
  		    Submit
        </button>
    </div>
  </form>
</div>
</div>
</body>
</html>

<?php

if (isset($_POST['submit'])) {
 // Get form data
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";

$res=mysqli_query($conn, $sql) or die(mysqli_error());


if ($res==TRUE) {
    $count=mysqli_num_rows($res);
    if($count==1)
    {
      header("location:http://localhost/Foodiez/admin/manage-admin.php");
    }
    else
    {
      header("location:http://localhost/Foodiez/admin/login.php");
    }
  }
}

?>
