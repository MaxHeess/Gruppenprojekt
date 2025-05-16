<?php
header('Content-Type: text/html; charset=utf-8');
session_start();  // Sitzung starten

// Datenbankverbindung herstellen
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

$kid = $_SESSION["kunde"];

$stmt= $conn->prepare("SELECT * FROM kunden WHERE Kunden_id=$kid");
$stmt->execute();

$result1 = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]; 

$stmt= $conn->prepare("SELECT Addr_id FROM kunden_addressen WHERE Kunden_id=$kid");
$stmt->execute();

$result2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
if($result2 != [] ){
    $addr = $result2[0]['Addr_id'];
    $stmt= $conn->prepare("SELECT * FROM addressen WHERE Addr_id=$addr");
    $stmt->execute();
    $result3 = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]; 
}else{
    $result3 = array("PLZ"=>"","Wohnort"=>"","Strasse"=>"","Hausnr"=>"");
}

?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angaben bearbeiten</title>

    <link rel="icon" href="../Bilder/icon.png" type="image/png">
    <link rel="stylesheet" href="../CSS/style.css">
    <link href="https://fonts.googleapis.com/css2?family=DynaPuff:wght@400..700&display=swap" rel="stylesheet">

</head>
<body>
    <?php include('../PHP/header.php'); ?>

    <div class="text-container">
        <h2>Angaben bearbeiten</h2>     
    </div>

    <div class="contact-container">
        <form method="POST">
            <div class="form-group">
                <label for="konto">IBAN eingeben:</label>
                <input type="text" name="konto" id="konto" value="<?= isset($_POST['konto']) ? htmlspecialchars($_POST['konto']) : htmlspecialchars($result1['iban']) ?>">
            </div>
            <div class="form-group">
                <label for="plz">PLZ:</label>
                <input type="text" name="plz" id="plz" value="<?= isset($_POST['plz']) ? htmlspecialchars($_POST['plz']) : htmlspecialchars($result3['PLZ']) ?>">
            </div>
            <div class="form-group">
                <label for="stadt">Wohnort:</label>
                <input type="text" name="stadt" id="stadt" value="<?= isset($_POST['stadt']) ? htmlspecialchars($_POST['stadt']) : htmlspecialchars($result3['Wohnort']) ?>">
            </div>
            <div class="form-group">
                <label for="strt">Straße:</label>
                <input type="text" name="strt" id="strt" value="<?= isset($_POST['strt']) ? htmlspecialchars($_POST['strt']) : htmlspecialchars($result3['Strasse']) ?>">
            </div>
            <div class="form-group">
                <label for="hsnr">Hausnummer:</label>
                <input type="text" name="hsnr" id="hsnr" value="<?= isset($_POST['hsnr']) ? htmlspecialchars($_POST['hsnr']) : htmlspecialchars($result3['Hausnr']) ?>">
            </div>
            <div class="form-group">
                <label for="tel">Telefonnummer:</label>
                <input type="text" name="tel" id="tel" value="<?= isset($_POST['tel']) ? htmlspecialchars($_POST['tel']) : htmlspecialchars($result1['Telefonnr']) ?>">
            </div>
            <button type="submit" class="styled-button">Daten speichern</button>
        </form>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Update Kunden-Daten
        $prep = "UPDATE kunden SET ";
        if (isset($_POST['konto'])) {
            $prep .= "iban = :i, ";
        }
        if (isset($_POST['tel'])) {
            $prep .= "Telefonnr = :t ";
        }
        $prep .= "WHERE kunden_id = $kid";

        $stmt = $conn->prepare($prep);
        if (isset($_POST['konto'])) $stmt->bindParam("i", $_POST['konto']);
        if (isset($_POST['tel'])) $stmt->bindParam("t", $_POST['tel']);
        $stmt->execute();

        // Update oder Insert Adresse
        if ($result2 == []) {
            $prep_addr = "INSERT INTO addressen (PLZ, Wohnort, Strasse, Hausnr) 
                          VALUES (:p, :w, :s, :n)";
        } else {
            $addr = $result2[0]['Addr_id'];
            $prep_addr = "UPDATE addressen 
                          SET PLZ = :p, Wohnort = :w, Strasse = :s, Hausnr = :n
                          WHERE Addr_id = $addr";
        }

        $stmt_addr = $conn->prepare($prep_addr);
        $stmt_addr->bindParam("p", $_POST["plz"]);
        $stmt_addr->bindParam("w", $_POST["stadt"]);
        $stmt_addr->bindParam("s", $_POST["strt"]);
        $stmt_addr->bindParam("n", $_POST["hsnr"]);
        $stmt_addr->execute();

        // Falls eine neue Adresse eingefügt wurde, Beziehung herstellen
        if ($result2 == []) {
            $abfr = $conn->prepare("SELECT LAST_INSERT_ID()");
            $abfr->execute();
            $neu = $abfr->fetchAll(PDO::FETCH_NUM)[0];
            $stmt_kreuz = $conn->prepare("INSERT INTO kunden_addressen (Addr_id, Kunden_id) 
                                          VALUES (:a, :k)");
            $stmt_kreuz->bindParam("a", $neu[0]);
            $stmt_kreuz->bindParam("k", $kid);
            $stmt_kreuz->execute();
        }

        echo "<p>Daten wurden erfolgreich aktualisiert.</p>";
    }

    $conn = null;
    ?>

    <div class="footer">
        <p>© <span id="year"></span> Pomodro Copyshop. Alle Rechte vorbehalten. 
            <button class="impressum" onclick="window.location.href='../HTML/impressum.php';">Impressum</button>
        </p>

        <script>
            document.getElementById("year").textContent = new Date().getFullYear();
        </script>
    </div>
</body>
</html>