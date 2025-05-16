<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
include('../PHP/header.php');
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrierung</title>

    <link rel="icon" href="../Bilder/icon.png" type="image/png">
    <link rel="stylesheet" href="../CSS/style.css">
    <link href="https://fonts.googleapis.com/css2?family=DynaPuff:wght@400..700&display=swap" rel="stylesheet">
</head>
<body>
    
    <div class="text-container">
        <h2>Registrierung</h2>     
    </div>

    <div class="contact-container">
        <form method="POST">
            <div class="form-group">
                <label for="Vorname">Vorname:</label>
                <input type="text" name="Vorname" required>
            </div>
            <div class="form-group">
                <label for="Nachname">Nachname:</label>
                <input type="text" name="Nachname" required>
            </div>
            <div class="form-group">
                <label for="Email">E-Mail:</label>
                <input type="email" name="Email" required>
            </div>
            <div class="form-group">
                <label for="pw">Passwort:</label>
                <input type="password" name="pw" required>
            </div>
            <button type="submit" class="styled-button">Registrieren</button>
        </form>
    </div>

    <?php
    if(isset($_POST['Nachname'])){

        $servername = "localhost";
        $username = "d04212b7";
        $password = "Artus.2008";
        $dbname = "d04212b7";
        
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->exec("SET NAMES 'utf8mb4'");  // Optional: Sicherstellen, dass utf8mb4 verwendet wird
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        // Überprüfen, ob die E-Mail bereits existiert
        $email = $_POST['Email'];
        $stmt = $conn->prepare("SELECT * FROM kunden WHERE Email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            // E-Mail existiert bereits, Fehlermeldung ausgeben
            $email_error = "Die angegebene E-Mail-Adresse ist bereits registriert.";
        } else {
            // Wenn die E-Mail noch nicht existiert, Benutzer registrieren
            $hash = password_hash($_POST['pw'], PASSWORD_BCRYPT);

            $stmt = $conn->prepare("INSERT INTO kunden (Nachname, Vorname, Email, pwhash) VALUES (:Nn, :Vn, :Em, :hsh)");
            $stmt->bindParam(':Nn', $_POST['Nachname']);
            $stmt->bindParam(':Vn', $_POST['Vorname']);
            $stmt->bindParam(':Em', $_POST['Email']);
            $stmt->bindParam(':hsh', $hash);

            if ($stmt->execute()) {
                $_SESSION['kunde'] = $conn->lastInsertId(); 
                $_SESSION['vorname'] = $_POST['Vorname']; 
                echo "<script>window.location.href='login.php';</script>";
                exit();
            }
        }
        
        $conn = null;
    }
    ?>

    <!-- Fehleranzeige für doppelte E-Mail -->
    <?php if (isset($email_error)): ?>
        <p style="color: red; font-weight: bold; text-align: center;"><?php echo $email_error; ?></p>
    <?php endif; ?>

    <div class="footer">
        <p class="footer">© <span id="year"></span> Pomodro Copyshop. Alle Rechte vorbehalten. 
            <button class="impressum" onclick="window.location.href='../HTML/impressum.php';">Impressum</button>
        </p>
        
        <script>
            document.getElementById("year").textContent = new Date().getFullYear();
        </script>
    </div>

</body>
</html>