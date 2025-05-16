<?php
header('Content-Type: text/html; charset=utf-8');
include('../PHP/header.php');
?>

<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pomodro Copyshop</title>

        <link rel="icon" href="../Bilder/icon.png" type="image/png">
        <link rel="stylesheet" href="../CSS/style.css">
        <link href="https://fonts.googleapis.com/css2?family=DynaPuff:wght@400..700&display=swap" rel="stylesheet">

    </head>

    <body>
        
        <div class="text-container">
            <h2>Willkommen bei unserem Copyshop!</h2>     
            <br>
            <br>
            <br>
        </div>
        

            <div class="info-section">
                <img src="../Bilder/pmcopyshop.png" alt="Copyshop-Bereich" class="info-image">
                <div class="info-text">
                    <h3>Digitaldruck</h3>
                    <p>
                        Ob als Privatperson oder für Ihr Unternehmen, wir bieten Ihnen qualitativ hochwertige Digitaldrucke mit modernsten Laser- und Inkjetdruckern an.                      
                        Einfache Formulare, Bilder, Flyer, Visitenkarten, Speisekarten, Poster u.v.m. können in kürzester Zeit produziert werden. 
                        Wir haben Papier in verschiedenen Stärken, Arten und Formaten zur Auswahl vorrätig.     
                </div>
            </div>
            
            <div class="info-section2">
                
                <div class="info-text2">
                    <h3>Werbetechnik</h3>
                    <p>Wir produzieren Poster und Außenwerbung mit Großformatdruckern der Marken Epson und Hewlett-Packard. Die Pantone zertifizierten Geräte drucken sowohl einfache Plakate als auch Leuchtwerbung (Backlit), Klebefolien, Leinwände, Blueback oder Banner in brillanten Farben. Auch Schilder & Platten sind möglich.
                        Für einen zusätzlichen Schutz vor UV-Strahlen, Kratzern, Staub und Verschmutzung, können wir Ihre Motive beidseitig laminieren oder eine einseitige Schutzkaschierung in Matt oder Glanz anbringen.
                        Für Werbung an Schaufenstern oder Fahrzeugen bieten wir Schneideplots / Folienbeschriftungen an.     
                </div>
                <img src="../Bilder/pmdrucker.png" alt="Copyshop-Bereich" class="info-image2">
            </div>


            <div class="info-section">
                <img src="../Bilder/pmposter.png" alt="Copyshop-Bereich" class="info-image">
                <div class="info-text">
                    <h3>Fotoabzüge </h3>
                    <p>Die schönsten Fotos sollten nicht auf dem Smartphone in Vergessenheit geraten,
                         sondern gebührend in der Hand gehalten, verschenkt oder zum Dekorieren genutzt
                          werden. Der Fotoabzug macht es möglich. Ausbelichtet auf echtem Premium 
                          Fotopapier in zahlreichen Größen lässt der Fotoabzug das kreative Herz 
                          höherschlagen. Ob matt oder hochglänzend: das Finish erhält der Fotoabzug 
                          mit der Wahl des Fotopapiers.    
                </div>
            </div>





            <div >
                <p> <br>  </p> 
                <p> <br>  </p>    
              
            </div>
            


            <div class="text-container2">
                <h3>Ihr Online Copyshop – Einfach, Schnell und Professionell! </h3>
                <h3>"Ihr Druckauftrag in wenigen Klicks!"</h3>
                <p>Übermitteln Sie Ihre Dokumente einfach und schnell online. Wählen Sie aus verschiedenen Druckoptionen und bestellen Sie bequem von zu Hause aus!</p>
                    
                <h3>"Professioneller Druckservice – ganz ohne Stress"</h3>
                <p> Ob Dokumente, Flyer oder Präsentationen – unser Copyshop bietet Ihnen hochwertige Druckqualität und flexible Optionen für Ihre individuellen Bedürfnisse.</p>
                    
                <h3> "Direkt bestellen, online verwalten"</h3>
                 <p> Registrierte Kunden können ihre Druckaufträge online verwalten und den Bearbeitungsstatus jederzeit einsehen. Einfach, transparent und effizient!</p>
                    
                 <h3> "Von Bestellt bis Abgeholt – Alles auf einen Blick!"</h3>
                 <p> Mit unserem System haben Sie immer im Blick, wo sich Ihr Auftrag gerade befindet. Verfolgen Sie den Status online und holen Sie Ihre Dokumente bereit zur Abholung ab.</p>
                    
                 <h3> "Unsere Druckoptionen: So vielfältig wie Ihre Ideen!"</h3>
                <p> Wählen Sie zwischen verschiedenen Papiergrößen, Farboptionen und Bindungen. So einfach war das Drucken noch nie! </p>     
                <br>
                <br>
                <br>
            </div>






            <div >
                <p> <br>  </p>     
              
            </div>
       
        

        <div class="footer">
            
            <p class="footer">© <span id="year"></span> Pomodro Copyshop. Alle Rechte vorbehalten. <button class="impressum" onclick="window.location.href='impressum.php';">Impressum</button></p>
            
            <script>
                document.getElementById("year").textContent = new Date().getFullYear();
            </script>
        
        </div>
        
    </body>
</html>