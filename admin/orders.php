<!DOCTYPE html>
<html>
<head>
  <title>Admin Panel - Food Order Website</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css">
</head>
<body class="bg-gray-100">
    <?php 
        include 'navbar.php'
    ?>
</div>
<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
      <tr>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
          Customer ID
        </th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
          Food name
        </th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
          Category name
        </th>
      </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
		<?php
			$sql = "SELECT * FROM orders ORDER BY user_id";
			$result = mysqli_query($conn,$sql);
			if($result==TRUE)
			{
				if ($result->num_rows > 0) 
				{
					while($row = $result->fetch_assoc())
					{
						$user_id=$row['user_id'];
						$food_id=$row['food_id'];
						$category_id=$row['category_id'];
                        $sql1 = "SELECT * FROM food where food_id=$food_id";
			            $result1 = mysqli_query($conn,$sql1);
                        $sql2 = "SELECT * FROM category where id=$category_id";
			            $result2 = mysqli_query($conn,$sql2);
                        
                        if($result1==TRUE)
			            {
				            if ($result1->num_rows > 0) 
				            {
					            while($row1 = $result1->fetch_assoc())
                                {
                                    $food_name=$row1['title'];
                                }
                            }
                        }
                        if($result2==TRUE)
			            {
				            if ($result2->num_rows > 0) 
				            {
					            while($row2 = $result2->fetch_assoc())
                                {
                                    $category_name=$row2['title'];
                                }
                            }
                        }
					
					?>
						<tr>
        					<td class="px-6 py-4 whitespace-nowrap">
          						<div class="flex items-center">
            						<div class="ml-4">
              							<div class="text-sm font-medium text-gray-900">
                							<a href='http://localhost/Foodiez/admin/userdetails.php?id=<?php echo $user_id?>'><?php echo $user_id;?></a>
              							</div>
              					    </div>
          						</div>
        					</td>
        					<td class="px-6 py-4 whitespace-nowrap">
								<div class="text-sm font-medium text-gray-900">
                					<?php echo $food_name;
									?>
              					</div>
							</td>
                            <td class="px-6 py-4 whitespace-nowrap">
								<div class="text-sm font-medium text-gray-900">
                					<?php echo $category_name;
									?>
              					</div>
							</td>
        				</tr>
					<?php
    			}
			}

			}
		?>
      
  </table>
</body>
</html>




