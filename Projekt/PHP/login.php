<?php
header('Content-Type: text/html; charset=utf-8');
session_start();  // Sitzung starten

$session_timeout = 300;

if (isset($_GET['logout'])) {
    session_unset();  // Alle Sitzungsvariablen löschen
    session_destroy();  // Sitzung zerstören
    header("Location: ../HTML/index.php");  // Zurück zur Startseite umleiten
    exit();
}

// Überprüfen, ob der Benutzer inaktiv ist
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $session_timeout)) {
    session_unset();  // Sitzung löschen
    session_destroy();  // Sitzung zerstören
    header("Location: ../HTML/index.php");  // Zur Startseite umleiten
    exit();
}

// Aktualisiere die letzte Aktivitätszeit
$_SESSION['last_activity'] = time();

// Wenn das Formular abgeschickt wurde, den Login-Prozess starten
if(isset($_POST['email'])){
    $servername = 
    $username = 
    $password = 
    $dbname = 

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("SET NAMES 'utf8mb4'");  // Optional: Sicherstellen, dass utf8mb4 verwendet wird
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $email = $_POST["email"];
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Überprüfen, ob die E-Mail in der Datenbank existiert
    $stmt = $conn->prepare("SELECT * FROM `kunden` WHERE Email=:email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Wenn der Benutzer nicht existiert
    if (!$result) {
        $login_error = "Die angegebene E-Mail-Adresse existiert nicht.";
    } else {
        // Passwort prüfen
        $hash = $result["pwhash"];
        
        if(password_verify($_POST['pw'], $hash)){
            // Einloggen
            $_SESSION['kunde'] = $result['Kunden_id'];
        } else {
            $login_error = 'Falsches Passwort.';
        }
    }
    
    $conn = null;
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mein Konto</title>
    <link rel="icon" href="../Bilder/icon.png" type="image/png">
    <link rel="stylesheet" href="../CSS/style.css">
    <link href="https://fonts.googleapis.com/css2?family=DynaPuff:wght@400..700&display=swap" rel="stylesheet">
</head>
<body>
    <?php include('../PHP/header.php'); ?>
    <div class="text-container">
        <?php
        if (isset($_SESSION["kunde"])) {
            echo "<h2>Willkommen, " . htmlspecialchars($vorname) . "! Du hast dich erfolgreich eingeloggt.</h2>";
            echo "<button class='styled-button' onclick=\"window.location.href='angaben.php';\">Angaben vervollständigen</button>";
        } else {
            echo "<h2>Anmeldung</h2>";
        }
        ?>     
    </div>

    <div class="contact-container">
        <?php
        // Login-Fehler anzeigen, falls vorhanden
        if (isset($login_error)) {
            echo '<p style="color: red; font-weight: bold; text-align: left;">' . $login_error . '</p>';
        }
        ?>

        <?php if (!isset($_SESSION["kunde"])): ?>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="email">E-Mail:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Passwort:</label>
                    <input type="password" id="password" name="pw" required>
                </div>
                &nbsp;&nbsp;<button class="impressum" onclick="window.location.href='../HTML/account.html';">Passwort vergessen?</button><br><br>
                <button type="submit" class="styled-button">Anmelden</button>
            </form>
            <h3>Neu hier?</h3>
            <button class="styled-button" onclick="window.location.href='../PHP/register.php';">Registrieren</button>
        <?php endif; ?>
    </div>

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
