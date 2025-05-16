<?php
header('Content-Type: text/html; charset=utf-8');
include('../PHP/header.php');
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meine Bestellungen</title>

    <link rel="icon" href="../Bilder/icon.png" type="image/png">
    <link rel="stylesheet" href="../CSS/style.css">
    <link href="https://fonts.googleapis.com/css2?family=DynaPuff:wght@400..700&display=swap" rel="stylesheet">

    <script>
        function validateForm() {
            const checkboxes = document.querySelectorAll('input[name="stornieren[]"]');
            let isChecked = false;
            
            checkboxes.forEach((checkbox) => {
                if (checkbox.checked) {
                    isChecked = true;
                }
            });

            if (!isChecked) {
                alert("Bitte mindestens eine Bestellung auswählen, um sie zu stornieren.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    
    <div class="text-container">
        <h2>Meine Bestellungen</h2>     
    </div>
       
    <div class="text-container">
        
        <?php
        // Datenbankverbindung herstellen
        $servername = 
        $username = 
        $password = 
        $dbname = 

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->exec("SET NAMES 'utf8mb4'");  // Optional: Sicherstellen, dass utf8mb4 verwendet wird
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        // Kunden-ID aus der Session
        $kid = $_SESSION["kunde"];
        
        if (isset($kid)) {
            $stmt = $conn->prepare("SELECT Bestellnr, Datum, Gesamtpreis FROM bestellungen WHERE Kunden_id = :kunde_id");
            $stmt->bindParam(':kunde_id', $kid, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        }

        // Tabelle anzeigen
        if ($result) {
            echo "<form action='storno.php' method='POST' onsubmit='return validateForm()'>";
            echo "<table>";
            echo "<tr><th>Bestellnummer</th><th>Datum</th><th>Gesamtpreis</th><th>Stornieren</th></tr>";
            
            foreach ($result as $row) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['Bestellnr']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Datum']) . "</td>";
                $formattedPrice = number_format($row['Gesamtpreis'], 2, ',', '.') . " €";
                echo "<td>" . $formattedPrice . "</td>";
                echo "<td><input type='checkbox' name='stornieren[]' value='" . htmlspecialchars($row['Bestellnr']) . "'></td>";
                echo "</tr>";
            }
            
            echo "</table>";
            echo "<br><br>";
            echo "<div style='text-align: center; margin-top: 20px;'>";
            echo "<button type='submit' class='styled-button'>Stornieren</button>";
            echo "</div>";
            echo "</form>";
        } else {
            echo "<p>Sie haben noch keine Bestellungen.</p>";
        }
        ?>
           
    </div>
    
    <div class="footer">
        <p class="footer">© <span id="year"></span> Pomodro Copyshop. Alle Rechte vorbehalten. <button class="impressum" onclick="window.location.href='../HTML/impressum.php';">Impressum</button></p>
        
        <script>
            document.getElementById("year").textContent = new Date().getFullYear();
        </script>
    </div>

</body>
</html>
