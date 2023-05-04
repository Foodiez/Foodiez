<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change password</title>
</head>
<body>
    <?php 
        include 'navbar.php';
        $id=$_GET['id'];    
    ?>
<div style="padding: 20px;" class="max-w-md mx-auto">
  <form action="" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <div class="mb-4">
      <label class="block text-gray-700 font-bold mb-2" for="current_password">
        Current password
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="current_password" name="current_password" type="password" placeholder="current password">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 font-bold mb-2" for="new_password">
        New password
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="new_password" name="new_password" type="password" placeholder="new password">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 font-bold mb-2" for="confirm_password">
        Confirm password
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="confirm_password" name="confirm_password" type="password" placeholder="confirm password">
    </div>
    <div class="flex items-center justify-between">
        <input type='hidden' name='id' value='<?php echo $id; ?>'>
        <button type="submit" name="submit" class="bg-gray-400 hover:bg-gray-500 text-black font-bold py-2 px-4 rounded-full">
  		    Change password
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
$current_password= $_POST['current_password'];
$new_password= $_POST['new_password'];
$confirm_password= $_POST['confirm_password'];

$sql="SELECT * FROM admin where id=$id AND password='$current_password'";
$res=mysqli_query($conn, $sql);

if($res==TRUE)
{
    $count=mysqli_num_rows($res);  
    if($count==1)
          {
             if($new_password==$confirm_password)
             {
                $sql2="UPDATE admin SET password='$new_password' where id='$id'";
                $res2=mysqli_query($conn, $sql);
                if($res2==TRUE)
                {
                  header("location:http://localhost/Foodiez/admin/display_message_1.php");
                }
                else
                {
                  header("location:http://localhost/Foodiez/admin/display_message_2.php");
                }
             }
             else
             {
              header("location:http://localhost/Foodiez/admin/display_message_2.php");
             }
          }
          else
          {
            header("location:http://localhost/Foodiez/admin/display_message_2.php");
          }
}


  
}

?>