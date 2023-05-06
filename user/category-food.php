<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Category-Food</title>
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.16/tailwind.min.css">
</head>
<body class="bg-gray-100">
    <?php
        include 'navbar.php';
    ?>
    <section class="px-6 py-12">
        <div class="container mx-auto">
        <?php 
            $cid=$_GET['id'];
            $sql2="SELECT * FROM category WHERE id=$cid";
            $result2= mysqli_query($conn,$sql2);
            if($result2==TRUE)
		    {
			    if ($result2->num_rows > 0) 
			    {
			        while($row2 = $result2->fetch_assoc())
				    {
                        $title_category=$row2['title'];
                        ?>
                            <h1 class="text-4xl font-bold mb-8">Showing results for <?php echo $title_category; ?></h1>
                        <?php
                    }
                }
            }
            ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <?php
            $sql = "SELECT * FROM food where category_id=$cid";
			$result = mysqli_query($conn,$sql);
			if($result==TRUE)
			{
                
				if ($result->num_rows > 0) 
				{
					while($row = $result->fetch_assoc())
					{
                        
						$id=$row['food_id'];
						$title=$row['title'];
						$price = $row['price'];
						$description=$row['description'];
                        $image_name=$row['image_name'];
                        $featured=$row['featured'];
						$active=$row['active'];
						$category_id = $row['category_id'];
                        if($active=="Yes")
                        {
                            ?>
                            <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300 relative">
                            <?php 
                            if($image_name!="")
                            {
                                ?>
                                <img src="http://localhost/Foodiez/images/food/<?php echo $image_name; ?>" width="500" height="300"  alt="Category 1" class="w-full h-48 object-cover">
                                <?php
                            }
                            else
                            {
                                echo "No image available.";
                            }
						    ?>
                            
                            <div class="px-4 py-2">
                            <h3 class="text-lg font-semibold mb-2"><?php echo $title; ?></h3>
                            <p class="text-gray-600">
                                <?php 
									$text = substr($description, 0, 50) . "...";
									$desc = wordwrap($text, 40, "<br>");
									echo $desc;
								?>
                            </p>
                            <div class="flex items-center justify-between mt-4">
                            <span class="font-bold text-lg">Rs. <?php echo $price; ?></span>
                            <div class="absolute top-0 left-0 w-full h-300 p-4 bg-gray-900 bg-opacity-75 text-white opacity-0 hover:opacity-100 transition-opacity duration-300">
                            <h3 class="text-lg font-semibold mb-2"><?php echo $title; ?></h3>
                            <p class="text-gray-100"><?php echo $description; ?></p>
                            </div>
                            <button class="px-4 py-2 bg-yellow-500 text-white font-semibold rounded-full hover:bg-blue-600">Add to cart</button>
                            </div>
                            </div>
                            </div>
                            <?php
                        }
        
                    }
                }
                else
                {
                    header("location:http://localhost/Foodiez/user/error.php");
                
                }
            }

        ?>
        
        </div>
</div>
</section>
</body>
</html>