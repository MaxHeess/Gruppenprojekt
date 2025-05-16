<?php
session_start();

// Sicherstellen, dass das 'cart'-Array vorhanden ist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Überprüfen, ob Produktinformationen übergeben wurden
if (isset($_POST['product'], $_POST['price'], $_POST['option'])) {
    $product = $_POST['product'];
    $price = $_POST['price'];
    $option = $_POST['option'];

    // Produktarray definieren
    $cartItem = [
        'product' => $product,
        'price' => $price,
        'option' => $option,
        'quantity' => 1
    ];

    // Produkte, die eine Bilddatei erfordern
    $productsWithImage = ['Ausdrucke', 'Kleine Poster', 'Mittlere Poster', 'Große Poster', 'Übergrößen-Poster'];

    // Wenn es eine hochgeladene Datei gibt, diese verarbeiten
    if (in_array($product, $productsWithImage) && isset($_FILES['uploaded_file'])) {
        $uploadDir = '../uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // Einzigartigen Dateinamen generieren, um Kollisionen zu vermeiden
        $fileName = time() . '_' . basename($_FILES['uploaded_file']['name']);
        $targetFilePath = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $targetFilePath)) {
            // Bildpfad zum Warenkorbelement hinzufügen
            $cartItem['image'] = $targetFilePath;
        } else {
            echo 'Fehler beim Hochladen der Datei.';
            exit;
        }
    }

    // Produkt zum Warenkorb hinzufügen
    $_SESSION['cart'][] = $cartItem;

    echo "Produkt hinzugefügt!";
} else {
    echo "Fehler: Ungültige Produktdaten.";
}
?>
