<?php include('../config/constants.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Food Order Website</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css">
</head>
<body class="bg-gray-100">
  <nav class="bg-gray-800 py-4">
    <div class="container mx-auto flex justify-between items-center px-4">
      <a href="#" class="text-white font-bold text-xl">FoodieZ</a>
      <div>
        <a href="home.php" class="text-white mr-6">Home</a>
        <a href="category.php" class="text-white mr-6">Categories</a>
        <a href="menu.php" class="text-white mr-6">Menu</a>
        <a href="cart.php?id=-1" class="text-white mr-6">Cart</a>
      </div>
    </div>
  </nav>
</body>
</html>