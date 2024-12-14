<?php
session_start();

if (!isset($_SESSION['user'])) {
    echo "Please log in to make a payment.";
    exit;
}

$cartTotal = 100; // Example total cost
$amount = $_POST['amount'];

if ($amount < $cartTotal) {
    echo "Please pay more. Amount due: " . ($cartTotal - $amount);
} elseif ($amount == $cartTotal) {
    echo "Thanks for the purchase!";
} else {
    echo "Thanks for the purchase! Your change of " . ($amount - $cartTotal) . " is sent back to your bKash.";
}
?>
