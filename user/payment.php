<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Example</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
  </head>
  <body class="bg-gray-100">
    <?php 
        include 'navbar.php';
        $new_amt=$_GET['total'];
        session_start();
        $user_id=$_SESSION['user_id'];//user id
        $sql = "SELECT * FROM customer WHERE id=$user_id";
		$result = mysqli_query($conn,$sql);
        if ($result->num_rows > 0) 
		{
			while($row = $result->fetch_assoc())
			{
                $amt=$row['total_amt'];
            }
        }
        $total_amt=$amt+$new_amt;
        $sql1 = "UPDATE customer SET total_amt=$total_amt WHERE id=$user_id";
		$result1 = mysqli_query($conn,$sql1);
        
    ?>
    <div class="container mx-auto my-10">
      <h1 class="text-2xl font-bold mb-2">Payment completed successfully!</h1>
      <p class="text-lg">You will be redirected to home page in <span id="countdown">5</span> seconds.</p>
    </div>

    <script>
      let seconds = 5;

      const countdown = setInterval(() => {
        seconds--;
        document.getElementById('countdown').textContent = seconds;

        if (seconds === 0) {
          clearInterval(countdown);
          window.location.href = 'http://localhost/Foodiez/user/home.php';
        }
      }, 1000);
    </script>
  </body>
</html>


