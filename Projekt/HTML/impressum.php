<?php
header('Content-Type: text/html; charset=utf-8');
include('../PHP/header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impressum</title>

    <link rel="icon" href="../Bilder/icon.png" type="image/png">
    <link rel="stylesheet" href="../CSS/style.css">
    <link href="https://fonts.googleapis.com/css2?family=DynaPuff:wght@400..700&display=swap" rel="stylesheet">

</head>
<body>
    
    <div class="text-container">
        <h2>Impressum</h2>     
    </div>
       
        <div class="text-container3">
        
            <p>Pomodro Copyshop GmbH<br>
            Hauptstraße 58<br>
            70711 Stuttgart<br>
            Telefon: +49 (0) 626 553 424 89<br>
            E-Mail: info@pomodro-copshop.de<br>
            Internet: www.pomodrocopyshop.de<br>
            Registergericht Stuttgart HR B 208214, UST ID-Nr. DE 815453806, St.-Nr. 64/200/38999 </p>    
            <h3>Persönlich haftende geschäftsführende und vertretungsberechtigte Gesellschafterin:</h3>
            <p>Pomodro Copysho GmbH, Sitz: Stuttgart; Stiftungsverzeichnis der rechtsfähigen Stiftungen des bürgerlichen Rechts des Amtes für regionale Landesentwicklung Weser-Ems Nummer 15(034).</p>
                
                <h3>Aufsichtsrat:</h3>
                <p>Marc Rivoir (Vorsitzender)</p>
                
                <h3>Verantwortlich für den Inhalt nach § 18 Abs. 2 MStV:</h3>
                <p>Arpad Szegedi</p>
                
                <h3>Haftungshinweis:</h3>
                <p>Trotz sorgfältiger inhaltlicher Kontrolle übernehmen wir keine Haftung für die Inhalte externer Links. Für den Inhalt der verlinkten Seiten sind ausschließlich deren Betreiber verantwortlich.
                
                <h3>Bildnachweis:</h3>
                <p>© Pomodro Copyshop GmbH; © Fotolia; © Getty Images International; © iStockphoto; © Shutterstock
                Beschwerden/Streitschlichtung: https://ec.europa.eu/consumers/odr/
                Für Verbraucherstreitigkeiten mit dem Anbieter ist die Verbraucherstreitbeilegungsstelle „Allgemeine Verbraucherschlichtungsstelle des Zentrums für Schlichtung e.V.“, zuständig. Die Streitbeilegungsstelle hat ihren Sitz hier: Straßburger Straße 8, 77694 Kehl am Rhein, die Webseite finden Sie unter: www.verbraucher-schlichter.de. Wir erklären allerdings, zur Teilnahme an einem Streitbeilegungsverfahren weder bereit noch verpflichtet zu sein. Sollten Sie daher mit einem unserer Angebote nicht zufrieden sein, können Sie uns gerne unter info@pomodro-copshop.de kontaktieren.</p>
                
        </div>
    
    

    <div class="footer">
            
        <p class="footer">© <span id="year"></span> Pomodro Copyshop. Alle Rechte vorbehalten. <button class="impressum" onclick="window.location.href='impressum.php';">Impressum</button></p>
        
        <script>
            document.getElementById("year").textContent = new Date().getFullYear();
        </script>
    
    </div>

</body>
</html>