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
        include 'navbar.php';
        $uid=$_GET['id'];//food id 
        $sql="SELECT * FROM customer WHERE id=$uid";
        $result= mysqli_query($conn,$sql);
        $sql1 = "SELECT user_id, COUNT(*) AS count FROM orders GROUP BY user_id";
        $result1 = mysqli_query($conn, $sql1);
        if($result==TRUE)
		{
		    if ($result->num_rows > 0) 
			{
			    while($row = $result->fetch_assoc())
			    {
                    $username=$row['username'];
                    $fullname=$row['fullname'];
                    $contact=$row['contact'];
                    $add=$row['address'];
                    $amount=$row['total_amt'];
                        
                    }
                }
            }
    ?>
    <div class="flex justify-center items-center h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg">
    <div class="text-2xl font-semibold mb-4">Username:</div>
    <div class="text-gray-600"><?php echo $username; ?></div>
    <div class="text-2xl font-semibold mb-4">Fullname:</div>
    <div class="text-gray-600"><?php echo $fullname; ?></div>   
    <div class="text-2xl font-semibold mb-4">Contact number:</div>
    <div class="text-gray-600"><?php echo $contact; ?></div>
    <div class="text-2xl font-semibold mb-4">Address:</div>
    <div class="text-gray-600"><?php echo $add; ?></div>   
    <div class="text-2xl font-semibold mb-4">Amount:</div>
    <div class="text-gray-600"><?php echo $amount; ?></div>   
    </div>
    </div>
</body>
</html>