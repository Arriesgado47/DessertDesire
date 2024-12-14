<?php 
session_start(); 
// Assuming cart is stored in session
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Your Cart</h1>
    <div id="cart-items">
        <?php 
        $totalPrice = 0;
        foreach ($_SESSION['cart'] as $item) {
            echo "<div>{$item['name']} - Quantity: {$item['quantity']} - Price: $" . ($item['price'] * $item['quantity']) . " <button onclick='removeFromCart(\"{$item['name']}\")'>Remove</button></div>";
            $totalPrice += $item['price'] * $item['quantity'];
        }
        ?>
    </div>
    <p>Total Price: $<span id="total-price"><?php echo $totalPrice; ?></span></p>
    <button onclick="checkout()">Checkout</button>

    <script>
        function removeFromCart(itemName) {
            // Logic to remove item from cart
            // Update the cart display
        }

        function checkout() {
            // Logic to proceed to payment
        }
    </script>
</body>
</html>