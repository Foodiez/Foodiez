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
<?php
if (isset($_session['add']))
{
	echo $_session['add'];
}
?>
<div style="padding: 20px;">
<button class="bg-gray-400 hover:bg-gray-500 text-black font-bold py-2 px-4 rounded-full">
	<a href="add-admin.php"> 
  		Add new
    </a>
</button>
</div>
<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
      <tr>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
          Name
        </th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
          username
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
			$sql = "SELECT * FROM admin";
			$result = mysqli_query($conn,$sql);
			if($result==TRUE)
			{
				if ($result->num_rows > 0) 
				{
					while($row = $result->fetch_assoc())
					{
						$id=$row['id'];
						$fullname=$row['fullname'];
						$username=$row['username'];
					
					?>
						<tr>
        					<td class="px-6 py-4 whitespace-nowrap">
          						<div class="flex items-center">
            						<div class="ml-4">
              							<div class="text-sm font-medium text-gray-900">
                							<?php echo $fullname;
											?>
              							</div>
              					    </div>
          						</div>
        					</td>
        					<td class="px-6 py-4 whitespace-nowrap">
								<div class="text-sm font-medium text-gray-900">
                					<?php echo $username;
									?>
              					</div>
							</td>
        					<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
         				 		<a href="http://localhost/Foodiez/admin/update-admin.php?id=<?php echo $id; ?>" class="text-indigo-600 hover:text-indigo-900">Update</a>
        					</td>
							<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
          						<a href="http://localhost/Foodiez/admin/delete-admin.php?id=<?php echo $id; ?>" class="text-indigo-600 hover:text-indigo-900">Delete</a>
        					</td>
							<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
          						<a href="http://localhost/Foodiez/admin/change-password.php?id=<?php echo $id; ?>" class="text-indigo-600 hover:text-indigo-900">Change password</a>
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




