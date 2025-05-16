<?php
header('Content-Type: text/html; charset=utf-8');
include('../PHP/header.php');
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warenkorb</title>

    <link rel="icon" href="../Bilder/icon.png" type="image/png">
    <link rel="stylesheet" href="../CSS/style.css">
    <link href="https://fonts.googleapis.com/css2?family=DynaPuff:wght@400..700&display=swap" rel="stylesheet">
</head>

<body>
<div class="text-container">
    <?php
    // Start der Session, falls noch nicht gestartet
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Array, das Produktnamen mit Bildpfaden verknüpft (für Produkte ohne hochgeladenes Bild)
    $productImages = [
        'Kalender' => '../Bilder/Designer(27).png',
        'Fotobuch' => '../Bilder/Designer(23).png',
        'Fotoalbum' => '../Bilder/Designer(25).png',
        // Die Poster-Produkte wurden entfernt, da sie jetzt ein hochgeladenes Bild haben können
    ];

    // Aktionen verarbeiten
    if (isset($_GET['action']) && $_GET['action'] == 'clear') {
        unset($_SESSION['cart']);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_item'])) {
        $removeIndex = $_POST['remove_item'];
        unset($_SESSION['cart'][$removeIndex]);

        if (!empty($_SESSION['cart'])) {
            $_SESSION['cart'] = array_values($_SESSION['cart']);
        } else {
            unset($_SESSION['cart']);
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_cart'])) {
        if (isset($_POST['quantities']) && is_array($_POST['quantities']) && !empty($_SESSION['cart'])) {
            foreach ($_POST['quantities'] as $index => $quantity) {
                $quantity = max(1, intval($quantity));
                $_SESSION['cart'][$index]['quantity'] = $quantity;
            }
        }
    }

    $cartIsEmpty = !isset($_SESSION['cart']) || empty($_SESSION['cart']);

    if ($cartIsEmpty) {
        echo "<h2 style='text-align: center;'>Ihr Warenkorb ist leer.</h2>";
    } else {
        echo "<h2 style='text-align: center;'>Ihr Warenkorb</h2>";
        echo "<form method='post' action='warenkorb.php'>";
        echo "<table>";
        echo "<tr><th>Produkt</th><th>Option</th><th>Preis</th><th>Menge</th><th>Gesamt</th><th>Aktion</th></tr>";

        $total = 0;

        foreach ($_SESSION['cart'] as $index => $item) {
            if (isset($item['price'], $item['product'], $item['option'], $item['quantity'])) {
                $productName = $item['product'];

                // Prüfen, ob das Warenkorbelement ein hochgeladenes Bild hat
                if (!empty($item['image'])) {
                    $imagePath = $item['image'];
                } else {
                    // Verwenden Sie das Standardbild aus dem Array
                    $imagePath = isset($productImages[$productName]) ? $productImages[$productName] : '../Bilder/default_image.jpg';
                }

                $price = floatval(str_replace(',', '.', $item['price']));
                $quantity = intval($item['quantity']);
                $itemTotal = $price * $quantity;
                $total += $itemTotal;

                $priceFormatted = number_format($price, 2, ',', '');
                $itemTotalFormatted = number_format($itemTotal, 2, ',', '');

                echo "<tr>
                        <td><img src='{$imagePath}' alt='{$productName}' style='width:100px;'><br><br>{$productName}</td>
                        <td>{$item['option']}</td>
                        <td>{$priceFormatted} €</td>
                        <td>
                            <input type='number' name='quantities[{$index}]' value='{$quantity}' min='1' style='width: 50px;'>
                        </td>
                        <td>{$itemTotalFormatted} €</td>
                        <td>
                            <button type='submit' name='remove_item' value='{$index}' class='styled-button' onclick=\"return confirm('Möchten Sie diesen Artikel wirklich entfernen?');\">Entfernen</button>
                        </td>
                    </tr>";
            }
        }
        $_SESSION["total"] = $total;
        $formattedTotal = number_format($total, 2, ',', '');

        echo "<tr>
                <td colspan='4' style='text-align: right; font-weight: bold;'>Gesamtsumme:</td>
                <td style='font-weight: bold;'>{$formattedTotal} €</td>
                <td></td>
            </tr>";
        echo "</table><br>";

        echo "<div style='text-align: center;'>
                <button type='submit' name='update_cart' class='styled-button'>Warenkorb aktualisieren</button>
              </div><br>";

        echo "<div style='text-align: center;'>
                <button type='button' class='styled-button' onclick=\"window.location.href='../PHP/checkout.php';\" style='padding-left: 98px; padding-right: 98px;'>Kaufen</button>
          </div><br>";

        echo "</form>";
        echo "<br><br>";
    }
    ?>

    <?php if (!$cartIsEmpty): ?>
        <button class="styled-button" onclick="clearCart()">Warenkorb leeren</button>
    <?php endif; ?>
</div>
    <div class="footer">
        <p class="footer">© <span id="year"></span> Pomodro Copyshop. Alle Rechte vorbehalten.
            <button class="impressum" onclick="window.location.href='impressum.php';">Impressum</button>
        </p>

        <script>
            document.getElementById("year").textContent = new Date().getFullYear();

            function clearCart() {
                const xhr = new XMLHttpRequest();
                xhr.open("GET", "../PHP/clear_cart.php", true);
                xhr.onload = function () {
                    if (this.status === 200) {
                        alert(this.responseText);
                        window.location.reload();
                    }
                };
                xhr.send();
            }
        </script>
    </div>
</body>

</html>
