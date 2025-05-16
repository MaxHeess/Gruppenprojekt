<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $print_options = $_POST['print_options'];
    $document_path = 'uploads/' . basename($_FILES['document']['name']);
    
    if (move_uploaded_file($_FILES['document']['tmp_name'], $document_path)) {
        $stmt = $pdo->prepare("INSERT INTO orders (user_id, document_path, print_options) VALUES (?, ?, ?)");
        $stmt->execute([$user_id, $document_path, $print_options]);
        echo "Order created successfully!";
    } else {
        echo "Failed to upload document.";
    }
}
?>

<form method="POST" action="" enctype="multipart/form-data">
    Document: <input type="file" name="document" required>
    Print Options: <input type="text" name="print_options" required>
    <button type="submit">Submit Order</button>
</form>