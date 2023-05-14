<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu</title>
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.16/tailwind.min.css">
</head>
<body class="bg-gray-100">
    <?php
        include 'navbar.php';
    ?>
    <div class="grid grid-cols-1">
        <?php
            $food_id=$_GET['id'];//food id 
            session_start();
            $user_id=$_SESSION['user_id'];//user id
            if($food_id != -1)
            {
            
            $sql1 = "SELECT * FROM food where food_id=$food_id";
			$result1 = mysqli_query($conn,$sql1);
            if($result1==TRUE)
			{
                if ($result1->num_rows > 0) 
				{
					while($row = $result1->fetch_assoc())
					{
                     
			        	$title=$row['title'];
						$price = $row['price'];//price
						$category_id = $row['category_id'];//category_id
                        $sql2 = "INSERT INTO orders (user_id, food_id, category_id, price) VALUES ('$user_id', '$food_id', '$category_id', '$price')";
                        $res=mysqli_query($conn, $sql2);
                    }
                }
            }
            }
            $sql3 = "SELECT food_id, count(*) AS count FROM orders where user_id=$user_id GROUP BY food_id";         
            $result3=mysqli_query($conn,$sql3);
            while($data=mysqli_fetch_assoc($result3))
            {
                $quantity=$data['count'];
                $food_id=$data['food_id'];
                $sql4 = "SELECT * FROM food where food_id=$food_id";
			    $result4 = mysqli_query($conn,$sql4);
                if($result4==TRUE)
			    {
                    if ($result4->num_rows > 0) 
				    {
					    while($row = $result4->fetch_assoc())
					    {
                            $title=$row['title'];
						    $price = $row['price'];
					        $category_id = $row['category_id'];
                            ?>
                            <div class="px-4 py-2">
                            <h3 class="text-lg font-semibold mb-2"><?php echo $title; ?></h3>
                            <div class="flex items-center justify-between mt-4">
                            <span class="font-bold text-lg">Rs. <?php echo $price; ?></span>
                            <span class="font-bold text-lg">Quantity- <?php echo $quantity; ?></span>
                            <a href='http://localhost/Foodiez/user/cart.php?id=<?php echo $food_id; ?>'><button class="px-4 py-2 bg-yellow-500 text-white font-semibold rounded-full hover:bg-blue-600">Add item</button></a>
                            <a href='http://localhost/Foodiez/user/remove.php?id=<?php echo $food_id; ?>'><button class="px-4 py-2 bg-yellow-500 text-white font-semibold rounded-full hover:bg-blue-600">Remove item</button></a>
                            </div>
                            </div>
                            </div>
                            <?php
                        }
                    }
                    $sql5 = "SELECT SUM(price) AS count FROM orders WHERE user_id=$user_id";
                    $res5=mysqli_query($conn, $sql5) or die(mysqli_error());
                    $total = 0;
                    $rec= $res5->fetch_assoc();
                    $total = $rec['count'];
                    ?>
                    <div class="px-4 py-2">
                    <p class="text-gray-700 text-4xl font-bold">Total amount is: Rs. <?php echo $total; ?></p>
                    <a href='http://localhost/Foodiez/user/payment.php?total=<?php echo $total; ?>'><button type="payment" name="payment" class="px-4 py-2 bg-yellow-500 text-white font-semibold rounded-full hover:bg-blue-600">Proceed to payment</button></a>
                    </div>
                    <?php
                }
                else
                {
                    ?>
                    <div class="flex justify-center items-center h-screen">
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                    <div class="text-2xl font-semibold mb-4">Your cart is empty.</div>
                    </div>
                    </div>
                    <?php
                }
            
            }
            
                
     
                

        ?>
    </div> 
</body>
</html>