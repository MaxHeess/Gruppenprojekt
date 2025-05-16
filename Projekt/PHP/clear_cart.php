<?php
session_start();

// Warenkorb leeren
if (isset($_SESSION['cart'])) {
    unset($_SESSION['cart']);
}

echo "Warenkorb wurde geleert!";
?>