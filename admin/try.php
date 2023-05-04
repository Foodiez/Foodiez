<?php include('../config/constants.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css">
</head>
<body>
<nav class="bg-gray-800 py-4">
    <div class="container mx-auto flex justify-between items-center px-4">
      <a href="#" class="text-white font-bold text-xl">FoodieZ</a>
    </div>
  </nav>
<div class="flex flex-col justify-center items-center min-h-screen">
<h1 class="text-3xl font-bold mb-6">Login to Your Account</h1>
<div style="padding: 20px;" class="max-w-md mx-auto">
<form>
  <div class="flex items-center mb-4">
    <input type="radio" id="radio1" name="radio" class="form-radio h-4 w-4 text-indigo-600" checked>
    <label for="radio1" class="ml-2 text-gray-700">Option 1</label>
  </div>
  <div class="flex items-center">
    <input type="radio" id="radio2" name="radio" class="form-radio h-4 w-4 text-indigo-600">
    <label for="radio2" class="ml-2 text-gray-700">Option 2</label>
  </div>
</form>

</div>
</div>
</body>
</html>


