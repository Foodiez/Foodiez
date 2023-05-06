<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Food | Food Order Website</title>
  <!-- Link to Tailwind CSS CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.16/tailwind.min.css">
</head>
<body class="bg-gray-100">
<<!-- Cart button -->
<button class="bg-indigo-500 text-white rounded-lg px-4 py-2 hover:bg-indigo-600 focus:outline-none" onclick="toggleCart()">Cart (<?php echo count($_SESSION['cart']); ?>)</button>

<!-- Cart window -->
<div class="fixed inset-0 z-50 overflow-auto bg-gray-900 bg-opacity-50 flex" id="cart-window" style="display: none;">
  <div class="relative p-8 bg-white rounded-lg shadow-lg mx-auto my-4 max-w-lg">
    <div class="absolute top-0 right-0 p-2">
      <button class="text-gray-600 hover:text-gray-800 focus:outline-none" onclick="toggleCart()">
        <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
          <path d="M6.293 6.293a1 1 0 0 1 1.414 0L12 10.586l4.293-4.293a1 1 0 1 1 1.414 1.414L13.414 12l4.293 4.293a1 1 0 1 1-1.414 1.414L12 13.414l-4.293 4.293a1 1 0 0 1-1.414-1.414L10.586 12 6.293 7.707a1 1 0 0 1 0-1.414z"/>
        </svg>
      </button>
    </div>
    <div class="text-lg font-semibold mb-2">Your Cart</div>
    <?php if (count($_SESSION['cart']) > 0) { ?>
      <div class="overflow-auto max-h-64">
        <?php foreach ($_SESSION['cart'] as $item) { ?>
          <div class="flex items-center mb-4">
            <div class="bg-gray-200 w-10 h-10 rounded-lg flex-shrink-0 mr-4"></div>
            <div>
              <div class="text-gray-700 font-semibold"><?php echo $item['name']; ?></div>
              <div class="text-gray-600"><?php echo $item['quantity']; ?> x $<?php echo number_format($item['price'], 2); ?></div>
            </div>
          </div>
        <?php } ?>
      </div>
      <div class="flex justify-between items-center my-4">
        <div class="text-gray-700 font-semibold">Total:</div>
        <div class="font-semibold">$<?php echo number_format($total, 2); ?></div>
      </div>
      <div class="flex justify-end">
        <button class="bg-indigo-500 text-white rounded-lg px-4 py-2 hover:bg-indigo-600 focus:outline-none">Checkout</button>
      </div>
    <?php } else { ?>
      <div class="text-center text-gray-600">Your cart is empty.</div>
    <?php } ?>
  </div>
</div>

</body>
</html>