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
  <div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Dashboard</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
      <div class="bg-white rounded-lg p-6">
        <h2 class="text-xl font-bold mb-4">Active categories</h2>
        <?php
        $sql = "SELECT active, count(*) AS count FROM category GROUP BY active";         
        $result=mysqli_query($conn,$sql);
        while($data=mysqli_fetch_assoc($result))
        {
            if($data['active']=="Yes")
            {
              ?>
              <p class="text-gray-700 text-4xl font-bold"><?php echo $data['count']; ?></p>
              <?php
            }
        }
        ?>
      </div>
      <div class="bg-white rounded-lg p-6">
        <h2 class="text-xl font-bold mb-4">Total users</h2>
        <?php
        $sql="select count(*) as total from customer";
        $result=mysqli_query($conn,$sql);
        $data=mysqli_fetch_assoc($result);
        $total=$data['total'];
        ?>
        <p class="text-gray-700 text-4xl font-bold"><?php echo $total; ?></p>
        <?php
        ?>
      </div>
      <div class="bg-white rounded-lg p-6">
        <h2 class="text-xl font-bold mb-4">Total Revenue</h2>
        <?php
        $sql = "SELECT SUM(total_amt) AS count FROM customer";
        $res=mysqli_query($conn, $sql) or die(mysqli_error());
        $total = 0;
        $rec= $res->fetch_assoc();
        $total = $rec['count'];
        ?>
        <p class="text-gray-700 text-4xl font-bold">Rs. <?php echo $total; ?></p>
        <?php
        ?>
      </div>
      <div class="bg-white rounded-lg p-6">
        <h2 class="text-xl font-bold mb-4">Top food</h2>
        <?php
        $sql = "SELECT food_id, COUNT(*) AS count FROM orders GROUP BY food_id ORDER BY count DESC LIMIT 1";
        $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          $groupValue = $row['food_id'];
          $maxCount = $row['count'];
          $sql2= "SELECT * FROM food where food_id=$groupValue";
          
          $result2 = mysqli_query($conn,$sql2);
            if($result2==TRUE)
            {
              if ($result2->num_rows > 0) 
              {
                while($row = $result2->fetch_assoc())
                {
                  $title=$row['title'];
                }
              }
            }
        ?>
        <p class="text-gray-700 text-4xl font-bold"><?php echo $title; ?></p>
        <?php
        ?>
        <div class="py-10">
        <h2 class="text-xl font-bold mb-4">Number of orders</h2>
        <p class="text-gray-700 text-4xl font-bold"><?php echo $maxCount; ?></p>
          </div>
          
     
    </div>
      <div class="bg-white rounded-lg p-6">
        <h2 class="text-xl font-bold mb-4">Top category</h2>
        <?php
        $sql = "SELECT category_id, COUNT(*) AS count FROM orders GROUP BY category_id ORDER BY count DESC LIMIT 1";
        $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          $groupValue = $row['category_id'];
          $maxCount = $row['count'];
          $sql2= "SELECT * FROM category where id=$groupValue";
          
          $result2 = mysqli_query($conn,$sql2);
            if($result2==TRUE)
            {
              if ($result2->num_rows > 0) 
              {
                while($row = $result2->fetch_assoc())
                {
                  $title=$row['title'];
                }
              }
            }
        ?>
        <p class="text-gray-700 text-4xl font-bold"><?php echo $title; ?></p>
        <?php
        ?>
        <div class="py-10">
        <h2 class="text-xl font-bold mb-4">Number of orders</h2>
        <p class="text-gray-700 text-4xl font-bold"><?php echo $maxCount; ?></p>
          </div>
          
      </div>
    </div>
    
  </div>
</body>
</html>




