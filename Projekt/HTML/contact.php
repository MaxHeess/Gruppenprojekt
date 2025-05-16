<?php
header('Content-Type: text/html; charset=utf-8');
include('../PHP/header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontakt</title>

    <link rel="icon" href="../Bilder/icon.png" type="image/png">
    <link rel="stylesheet" href="../CSS/style.css">
    <link href="https://fonts.googleapis.com/css2?family=DynaPuff:wght@400..700&display=swap" rel="stylesheet">

</head>
<body>

    <div class="text-container">
        <h2>Kontaktieren Sie uns</h2>     
    </div>

    <div class="contact-container">
        
        
        <form action="danke.html" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">E-Mail:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="message">Nachricht:</label>
                <textarea id="message" name="message" required></textarea>
            </div>
            <button type="submit" class="styled-button">Absenden</button>
        </form>
    </div>
   
    <div class="footer">
            
        <p class="footer">© <span id="year"></span> Pomodro Copyshop. Alle Rechte vorbehalten. <button class="impressum" onclick="window.location.href='impressum.php';">Impressum</button></p>
        
        <script>
            document.getElementById("year").textContent = new Date().getFullYear();
        </script>
    
    </div>

</body>
</html>