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

  <!-- Hero section -->
  <section class="px-6 py-24 bg-white-800 text-black">
    <div class="container mx-auto">
      <h1 class="text-5xl font-bold mb-6">Order Delicious Food with Just a Few Clicks</h1>
      <p class="text-xl mb-8">Choose from our menu of mouth-watering dishes and get them delivered to your doorstep in no time.</p>
      <button class="px-6 py-3 bg-yellow-500 text-white font-semibold rounded-full hover:bg-yellow-600">Order Now</button>
    </div>
  </section>

  <!-- Featured dishes section -->
  <section class="px-6 py-16 bg-white">
    <div class="container mx-auto">
      <h2 class="text-3xl font-semibold mb-8">Featured Dishes</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        <!-- Dish 1 -->
        <div class="bg-gray-200 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300">
          <img src="https://via.placeholder.com/500x300" alt="Dish 1" class="w-full h-48 object-cover">
          <div class="px-4 py-2">
            <h3 class="text-lg font-semibold mb-2">Dish 1</h3>
            <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <p class="text-gray-900 font-semibold mt-2">$10.99</p>
            <button class="px-4 py-2 bg-yellow-500 text-white font-semibold rounded-full hover:bg-yellow-600 mt-4">Add to Cart</button>
          </div>
        </div>
        <!-- Dish 2 -->
        <div class="bg-gray-200 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300">
          <img src="https://via.placeholder.com/500x300" alt="Dish 2" class="w-full h-48 object
