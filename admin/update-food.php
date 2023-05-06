<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update food</title>
</head>
<body>
<?php 
        include 'navbar.php';
        $id=$_GET['id'];
        $sql="SELECT * FROM food where food_id=$id";
        $res=mysqli_query($conn, $sql);
        if($res==TRUE)
        {
          $count=mysqli_num_rows($res);
          if($count==1)
          {
            $row=mysqli_fetch_assoc($res);
			$title=$row['title'];
            $image_name=$row['image_name'];
            $description=$row['description'];
            $price=$row['price'];
            $category_id=$row['category_id'];
            $featured=$row['featured'];
			$active=$row['active'];
          }
          else
          {
            header("location:".URL_1);
          }

        }
        
    ?>
<div style="padding: 20px;" class="max-w-md mx-auto">
  <form action="" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">
    <div class="mb-4">
      <label class="block text-gray-700 font-bold mb-2" for="title">
        Title
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" name="title" type="text" value='<?php echo $title?>'>
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 font-bold mb-2">
        Description
      </label>
      <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="description" cols="30" rows="10"><?php echo $description?></textarea>
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 font-bold mb-2">
        Price
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="price" type="number" value='<?php echo $price?>'>
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 font-bold mb-2" for="image">
        Select image
      </label>
      <input type="file"  name="image">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 font-bold mb-2">
        Category
      </label>
      <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="category">
        <?php
            $sql1='SELECT * FROM category WHERE active="Yes"';
            $result1 = mysqli_query($conn,$sql1);
            if($result1->num_rows > 0) 
            {
                while($row1 = $result1->fetch_assoc())
					{
						$id1=$row1['id'];
						$title1=$row1['title'];
                        ?>
                        <option value="<?php echo $id1; ?>"><?php echo $title1; ?></option>
                        <?php
                    }

            }
            else
            {
                ?>
                <option value='1'>No category found</option>
                <?php
            }
        
        ?>
      </select>
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
$title = $_POST['title'];
$description=$_POST['description'];
$price=$_POST['price'];
$category_id=$_POST['category'];
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
  $image = $_FILES['image'];
  $image_name=$image['name'];
  $destination_path="../images/food/".$image_name;
  $upload=move_uploaded_file($image['tmp_name'],$destination_path);
  if($upload==false)
  {
    die();
  }
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
$sql2 = "UPDATE food SET title='$title', description='$description', price='$price', image_name='$image_name',  category_id='$category_id', featured='$featured', active='$active' WHERE food_id='$id'";

$res2=mysqli_query($conn, $sql2) or die(mysqli_error());
}

?>