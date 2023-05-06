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
<div style="padding: 20px;">
<button class="bg-gray-400 hover:bg-gray-500 text-black font-bold py-2 px-4 rounded-full">
	<a href="add-food.php"> 
  		Add new
    </a>
</button>
</div>
<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
      <tr>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
          Title
        </th>
		<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
          Description
        </th>
		<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
          Price
        </th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
          Image
        </th>
		<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
          Category
        </th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
          Featured
        </th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
          Active
        </th>
        <th scope="col" class="relative px-6 py-3">
          <span class="sr-only">Update</span>
        </th>
		<th scope="col" class="relative px-6 py-3">
          <span class="sr-only">Delete</span>
        </th>
      </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
		<?php
			$sql = "SELECT * FROM food";
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
					?>
						<tr>
        					<td class="px-6 py-4 whitespace-nowrap">
          						<div class="flex items-center">
            						<div class="ml-4">
              							<div class="text-sm font-medium text-gray-900">
                							<?php echo $title;
											?>
              							</div>
              					    </div>
          						</div>
        					</td>
							<td class="px-6 py-4 whitespace-nowrap">
          						<div class="flex items-center">
            						<div class="ml-4">
              							<div class="text-sm font-medium text-gray-900">
                							<?php 
												$text = substr($description, 0, 100) . "...";
												$desc = wordwrap($text, 30, "<br>");
												echo $desc;
											?>
              							</div>
              					    </div>
          						</div>
        					</td>
        					<td class="px-6 py-4 whitespace-nowrap">
          						<div class="flex items-center">
            						<div class="ml-4">
              							<div class="text-sm font-medium text-gray-900">
                							<?php echo $price;
											?>
              							</div>
              					    </div>
          						</div>
        					</td>
                            <td class="px-6 py-4 whitespace-nowrap">
          						<div class="flex items-center">
            						<div class="ml-4">
              							<div class="text-sm font-medium text-gray-900">
                							<?php 
                                                if($image_name!="")
                                                {
                                                    ?>
                                                    <img src="http://localhost/Foodiez/images/food/<?php echo $image_name; ?>" width="150" height="150">
                                                    <?php
                                                }
                                                else
                                                {
                                                    echo "No image available.";
                                                }
											?>
              							</div>
              					    </div>
          						</div>
        					</td>
							<?php
								$sql2 = "SELECT * FROM category WHERE id='$category_id'";
								$result2 = mysqli_query($conn,$sql2);
								if($result2->num_rows > 0) 
            					{
                					while($row2 = $result2->fetch_assoc())
									{
										?>
										<td class="px-6 py-4 whitespace-nowrap">
          									<div class="flex items-center">
            									<div class="ml-4">
              										<div class="text-sm font-medium text-gray-900">
                										<?php 
															$title=$row2['title'];
															echo $title;
														?>
              										</div>
              					    			</div>
          									</div>
        								</td>
										<?php
									}
								}
							?>
							<td class="px-6 py-4 whitespace-nowrap">
          						<div class="flex items-center">
            						<div class="ml-4">
              							<div class="text-sm font-medium text-gray-900">
                							<?php echo $featured;
											?>
              							</div>
              					    </div>
          						</div>
        					</td>
                            <td class="px-6 py-4 whitespace-nowrap">
          						<div class="flex items-center">
            						<div class="ml-4">
              							<div class="text-sm font-medium text-gray-900">
                							<?php echo $active;
											?>
              							</div>
              					    </div>
          						</div>
        					</td>
        					<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
         				 		<a href="http://localhost/Foodiez/admin/update-food.php?id=<?php echo $id; ?>" class="text-indigo-600 hover:text-indigo-900">Update</a>
        					</td>
							<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
          						<a href="http://localhost/Foodiez/admin/delete-food.php?id=<?php echo $id; ?>" class="text-indigo-600 hover:text-indigo-900">Delete</a>
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




