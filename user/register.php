<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add user</title>
</head>
<body>
    <?php 
        include 'navbar.php'
    ?>
<div style="padding: 20px;" class="max-w-md mx-auto">
  <form action="" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <div class="mb-4">
      <label class="block text-gray-700 font-bold mb-2" for="fullname">
        Full name
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="fullname" name="fullname" type="text" placeholder="Enter full name">
    </div>
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
    <div class="mb-4">
      <label class="block text-gray-700 font-bold mb-2" for="Address">
        Address
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="address" name="address" type="text" placeholder="Enter address">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 font-bold mb-2" for="contact">
        Contact number
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="contact" name="contact" type="number">
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
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$password = $_POST['password'];
$contact = $_POST['contact'];
$address = $_POST['address'];


$sql = "INSERT INTO customer (fullname, username, password, contact, address) VALUES ('$fullname', '$username', '$password', '$contact', '$address')";

$res=mysqli_query($conn, $sql) or die(mysqli_error($conn));


if ($res==TRUE) {
    $sql1 = "SELECT * FROM customer WHERE username='$username' AND password='$password'";
    $res1=mysqli_query($conn, $sql1) or die(mysqli_error());
    if ($res1==TRUE) {
        $count=mysqli_num_rows($res1);
        if($count==1)
        {
            $row = $res1->fetch_assoc();
            session_start();
            $id=$row['id'];
            $_SESSION['user_id']=$id;
            header("location: http://localhost/Foodiez/user/home.php?");
        }
  } else {
    header("location:http://localhost/Foodiez/user/register.php");
  }
}
}
?>