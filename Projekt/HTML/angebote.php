<?php
header('Content-Type: text/html; charset=utf-8');
include('../PHP/header.php');
?>

<!DOCTYPE html>
<html lang="de"> <!-- Korrigiert: 'de' statt 'en' -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angebote</title>

    <link rel="icon" href="../Bilder/icon.png" type="image/png">
    <link rel="stylesheet" href="../CSS/style.css">
    <link href="https://fonts.googleapis.com/css2?family=DynaPuff:wght@400..700&display=swap" rel="stylesheet">

</head>
<body>

    <div class="product-container">
        
        <!-- Produkt 1 - Ausdrucke -->
        <div class="product-card" onclick="window.location.href='produkte.php#ausdrucke';">
            <img src="../Bilder/Designer(21).png" alt="Ausdrucke">
            <h3>Ausdrucke</h3>
            <p class="price">Preise 4,99 - 5,99 €</p>
        </div>

       <!-- Produkt 2 - Kalender -->
       <div class="product-card" onclick="window.location.href='produkte.php#kalender';">
           <img src="../Bilder/Designer(27).png" alt="Kalender">
           <h3>Kalender</h3>
           <p class="price">Preise 14,99 - 39,99 €</p>
       </div>

       <!-- Produkt 3 - Fotobuch -->
       <div class="product-card" onclick="window.location.href='produkte.php#fotobuch';">
           <img src="../Bilder/Designer(23).png" alt="Fotobuch">
           <h3>Fotobuch</h3>
           <p class="price">Preise 24,99 - 49,99 €</p>
       </div>

       <!-- Produkt 4 - Poster -->
       <div class="product-card" onclick="window.location.href='produkte.php#kleineposter';">
            <img src="../Bilder/Designer(29).png" alt="Poster">
           <h3>Poster</h3>
           <p class="price"> Preise 5,99 - 74,99€ </p>
       </div>

       <!-- Produkt 5 - Fotoalbum -->
       <div class="product-card" onclick="window.location.href='produkte.php#fotoalbum';">
           <img src="../Bilder/Designer(25).png" alt="Fotoalbum">
           <h3>Fotoalbum</h3>
           <p class="price">Preise 44,99 - 64,99 €</p>
       </div>
   </div>


    <div class="footer">
            
        <p class="footer">© <span id="year"></span> Pomodro Copyshop. Alle Rechte vorbehalten. <button class="impressum" onclick="window.location.href='impressum.php';">Impressum</button></p>
        
        <script>
            document.getElementById("year").textContent = new Date().getFullYear();
        </script>
    
    </div>

</body>
</html>
