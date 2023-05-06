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
    <div class="flex justify-center items-center h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg">
    <div class="text-2xl font-semibold mb-4">No Results Available</div>
    <div class="text-gray-600">Sorry, we could not find any results matching your search criteria. Please try again with different keywords.</div>
    </div>
    </div>
    <script>
    function redirectBack() {
    window.history.back();
    }

  setTimeout(redirectBack, 5000); // Redirect after 5 seconds
</script>
</body>
</html>