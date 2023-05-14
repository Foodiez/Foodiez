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

  <!-- Hero section -->
  <section class="px-6 py-24 bg-white-800 text-black">
    <div class="container mx-auto">
        
        <?php 
            session_start();
            $uid=$_SESSION['user_id'];
            $sql="SELECT * FROM customer WHERE id=$uid";
            $result= mysqli_query($conn,$sql);
            if($result==TRUE)
		    {
			    if ($result->num_rows > 0) 
			    {
			        while($row = $result->fetch_assoc())
				    {
                        $username=$row['username'];
                        ?>
                            <h1 class="text-5xl font-bold mb-6">Welcome, <?php echo $username; ?></h1>
                        <?php
                    }
                }
            }
        ?>
        <form action="search.php" method="GET" class="flex">
            <input type="text" name="search" placeholder="Search..." class="w-64 border border-gray-300 rounded-l px-4 py-2 focus:outline-none focus:border-blue-500">
            <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-r">Search</button>
        </form>
    </div>
  </section>
  <?php
  $sql1 = "SELECT category_id, COUNT(*) AS count FROM orders GROUP BY category_id ORDER BY count DESC LIMIT 1";
  $result1 = mysqli_query($conn, $sql1);
  if ($result1) {
    $row1 = mysqli_fetch_assoc($result1);
    $groupValue = $row1['category_id'];
    $maxCount = $row1['count'];
    $sql2= "SELECT * FROM category where id=$groupValue";
    
		$result2 = mysqli_query($conn,$sql2);
			if($result2==TRUE)
			{
				if ($result2->num_rows > 0) 
				{
					while($row = $result2->fetch_assoc())
					{
            $id=$row['id'];
						$title=$row['title'];
            $image_name=$row['image_name'];
						$active=$row['active'];
            if($active=="Yes")
            {
              ?>
              <section class="px-6 py-16 bg-white">
              <div class="container mx-auto">
              <h2 class="text-3xl font-semibold mb-8">Top category</h2>
              <div class="grid grid-cols-1 sm:grid-cols-2">
              <div class="bg-gray-200 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300">
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
              <div class="px-4 py-2">
              <h3 class="text-lg font-semibold mb-2"><?php echo $title; ?></h3>
              <a href="http://localhost/Foodiez/user/category-food.php?id=<?php echo $id; ?>"><button class="px-4 py-2 bg-yellow-500 text-white font-semibold rounded-full hover:bg-yellow-600 mt-4">View more</button></a>
              </div>
              </div>
              </div>
              </div>
              </section>
              <?php
            }
          }
        }
      }
  }

  ?>

<?php
  $sql3 = "SELECT food_id, COUNT(*) AS count FROM orders GROUP BY food_id ORDER BY count DESC LIMIT 1";
  $result3 = mysqli_query($conn, $sql3);
  if ($result3) {
    $row3 = mysqli_fetch_assoc($result3);
    $groupValue = $row3['food_id'];
    $maxCount = $row3['count'];
    $sql4= "SELECT * FROM food where food_id=$groupValue";
    
		$result4 = mysqli_query($conn,$sql4);
			if($result4==TRUE)
			{
				if ($result4->num_rows > 0) 
				{
					while($row = $result4->fetch_assoc())
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
              <section class="px-6 py-16 bg-white">
              <div class="container mx-auto">
              <h2 class="text-3xl font-semibold mb-8">Top dish</h2>
              <div class="grid grid-cols-1 sm:grid-cols-2">
              <div class="bg-gray-200 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300">
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
									$text = substr($description, 0, 100) . "...";
									$desc = wordwrap($text, 90, "<br>");
									echo $desc;
								?>
              </p>
              <div class="flex items-center justify-between mt-4">
              <span class="font-bold text-lg">Rs. <?php echo $price; ?></span>
              <a href='http://localhost/Foodiez/user/cart.php?id=<?php echo $id; ?>'><button class="px-4 py-2 bg-yellow-500 text-white font-semibold rounded-full hover:bg-blue-600">Add to cart</button></a>
              </div>
              </div>
              </div>
              </div>
              </section>
              <?php
            }
          }
        }
      }
  }

  ?>

<?php
  $sql = "SELECT category_id, COUNT(*) AS count FROM orders WHERE user_id=$uid GROUP BY category_id ORDER BY count DESC LIMIT 1 WHERE user_id=$uid ";
  $result1 = mysqli_query($conn, $sql1);
  if ($result1) {
    $row1 = mysqli_fetch_assoc($result1);
    $groupValue = $row1['category_id'];
    $maxCount = $row1['count'];
    $sql2= "SELECT * FROM category where id=$groupValue";
    
		$result2 = mysqli_query($conn,$sql2);
			if($result2==TRUE)
			{
				if ($result2->num_rows > 0) 
				{
					while($row = $result2->fetch_assoc())
					{
            $id=$row['id'];
						$title=$row['title'];
            $image_name=$row['image_name'];
						$active=$row['active'];
            if($active=="Yes")
            {
              ?>
              <section class="px-6 py-16 bg-white">
              <div class="container mx-auto">
              <h2 class="text-3xl font-semibold mb-8">Your favorite category</h2>
              <div class="grid grid-cols-1 sm:grid-cols-2">
              <div class="bg-gray-200 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300">
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
              <div class="px-4 py-2">
              <h3 class="text-lg font-semibold mb-2"><?php echo $title; ?></h3>
              <a href="http://localhost/Foodiez/user/category-food.php?id=<?php echo $id; ?>"><button class="px-4 py-2 bg-yellow-500 text-white font-semibold rounded-full hover:bg-yellow-600 mt-4">View more</button></a>
              </div>
              </div>
              </div>
              </div>
              </section>
              <?php
            }
          }
        }
      }
  }

  ?>

<?php
  $sql3 = "SELECT food_id, COUNT(*) AS count FROM orders WHERE user_id=$uid GROUP BY food_id ORDER BY count DESC LIMIT 1";
  $result3 = mysqli_query($conn, $sql3);
  if ($result3) {
    $row3 = mysqli_fetch_assoc($result3);
    $groupValue = $row3['food_id'];
    $maxCount = $row3['count'];
    $sql4= "SELECT * FROM food where food_id=$groupValue";
    
		$result4 = mysqli_query($conn,$sql4);
			if($result4==TRUE)
			{
				if ($result4->num_rows > 0) 
				{
					while($row = $result4->fetch_assoc())
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
              <section class="px-6 py-16 bg-white">
              <div class="container mx-auto">
              <h2 class="text-3xl font-semibold mb-8">Your favorite dish</h2>
              <div class="grid grid-cols-1 sm:grid-cols-2">
              <div class="bg-gray-200 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300">
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
									$text = substr($description, 0, 100) . "...";
									$desc = wordwrap($text, 90, "<br>");
									echo $desc;
								?>
              </p>
              <div class="flex items-center justify-between mt-4">
              <span class="font-bold text-lg">Rs. <?php echo $price; ?></span>
              <a href='http://localhost/Foodiez/user/cart.php?id=<?php echo $id; ?>'><button class="px-4 py-2 bg-yellow-500 text-white font-semibold rounded-full hover:bg-blue-600">Add to cart</button></a>
              </div>
              </div>
              </div>
              </div>
              </section>
              <?php
            }
          }
        }
      }
  }

  ?>
 
</body>
</html>
