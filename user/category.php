<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Food Order App</title>
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.16/tailwind.min.css">
</head>
<body class="bg-gray-100">

    <?php 
        include 'navbar.php'
    ?>
    <section class="px-6 py-12">
    <div class="container mx-auto">
      <h1 class="text-4xl font-bold mb-8">Categories</h1>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
      <?php
			$sql = "SELECT * FROM category";
			$result = mysqli_query($conn,$sql);
			if($result==TRUE)
			{
				if ($result->num_rows > 0) 
				{
					while($row = $result->fetch_assoc())
					{
                        $id=$row['id'];
						$title=$row['title'];
                        $image_name=$row['image_name'];
						$active=$row['active'];
                        if($active=="Yes")
                        {
					    ?>
                        <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300">
                        <?php 
                            if($image_name!="")
                            {
                                ?>
                                <img src="http://localhost/Foodiez/images/category/<?php echo $image_name; ?>" width="500" height="300"  alt="Category 1" class="w-full h-48 object-cover">
                                <?php
                            }
                            else
                            {
                                echo "No image available.";
                            }
						?>
                        <div class="px-6 py-2">
                        <h3 class="text-lg font-semibold mb-2"><?php echo $title; ?></h3>
                        <a href="http://localhost/Foodiez/user/category-food.php?id=<?php echo $id; ?>" class="text-blue-500 hover:underline mt-4">View Items ></a>
                        </div>
                        </div>
                    <?php
                    }
                }
                }
            }
        ?>
        
    </div>
</body>
</html>