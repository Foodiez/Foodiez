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
        <h2 class="text-xl font-bold mb-4">Total Orders</h2>
        <p class="text-gray-700 text-4xl font-bold">1500</p>
      </div>
      <div class="bg-white rounded-lg p-6">
        <h2 class="text-xl font-bold mb-4">New Orders</h2>
        <p class="text-gray-700 text-4xl font-bold">120</p>
      </div>
      <div class="bg-white rounded-lg p-6">
        <h2 class="text-xl font-bold mb-4">Total Revenue</h2>
        <p class="text-gray-700 text-4xl font-bold">$45,000</p>
      </div>
    </div>
  </div>
</body>
</html>




