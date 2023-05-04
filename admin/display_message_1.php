<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Example</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
  </head>
  <body class="bg-gray-100">
    <?php 
      include 'navbar.php'
    ?>
    <div class="container mx-auto my-10">
      <h1 class="text-2xl font-bold mb-2">Task completed successfully!</h1>
      <p class="text-lg">You will be redirected to admin panel in <span id="countdown">5</span> seconds.</p>
    </div>

    <script>
      let seconds = 5;

      const countdown = setInterval(() => {
        seconds--;
        document.getElementById('countdown').textContent = seconds;

        if (seconds === 0) {
          clearInterval(countdown);
          window.location.href = 'http://localhost/Foodiez/admin/admin.php';
        }
      }, 1000);
    </script>
  </body>
</html>


