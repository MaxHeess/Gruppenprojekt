<?php
header('Content-Type: text/html; charset=utf-8');
include('../PHP/header.php');
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produkte</title>

    <link rel="icon" href="../Bilder/icon.png" type="image/png">
    <link rel="stylesheet" href="../CSS/style.css">
    <link href="https://fonts.googleapis.com/css2?family=DynaPuff:wght@400..700&display=swap" rel="stylesheet">

</head>

<body>

<!-- Main section for product options -->
<main>
    <div class="text-container">
        <h2>Ihr Druck, unser Auftrag!</h2>
        <br><br><br>
    </div>

    <div class="info-section">
        <img src="../Bilder/fotoformate-fotogroessen.webp" alt="Posterformate" class="info-image3">
        <div class="info-text">
            <h3>Unsere Standard-Drucke</h3>
            <p>
                Eine Vorauswahl unserer Druckmöglichkeiten haben wir für Sie online bereitgestellt. Aus unserer Standard-Posterauswahl können Sie unkompliziert sofort auswählen. Darüber hinaus bieten wir auch eine breite Palette an Druckoptionen wie Ausdrucke, Kalender, Fotobücher und Fotoalben, die Sie ganz einfach bei uns erstellen können.<br><br>
                Für individuelle Lösungen und Wünsche haben wir das Kontaktformular bereitgestellt. Auf Anfrage erhalten Sie bei uns alle europäischen DIN-Standardgrößen sowie Ihre Wunschformate in der bevorzugten Maßeinheit. Wir berücksichtigen gerne auch Ihre individuellen Wünsche bezüglich des zu bedruckenden Materials. Wählen Sie aus Papiersorten unterschiedlicher Grammaturen, Folien oder Textilien – oder bringen Sie Ihre eigenen Materialien mit in unseren Store. Fragen Sie einfach nach Ihrem gewünschten Material, und wir kümmern uns um den Rest!
            </p>
            <button class="impressum" onclick="window.location.href='contact.php';">Für eine individuelle Anfrage</button>
        </div>
    </div>

    <!-- Files Upload -->
    <div class="text-container">
        <br><br><br>
    </div>

    <div class="text-container">
        <br><br><br>
    </div>

    <div class="container">
        <div class="upload-container">
            <h3>Senden Sie uns Ihre Fotodateien</h3>
            <input type="file" id="fileInput" accept="image/*" multiple>
            <div class="upload-area" id="dragArea">
                <p>Drag & Drop</p>
                <p>oder</p>
                <p>Wählen Sie Ihre Bilder aus.</p>
            </div>
            <p id="fileNameDisplay">Keine Datei ausgewählt</p>
            <img id="imagePreview" src="" alt="Bildvorschau" style="display:none; max-width: 200px; margin-top: 10px;" />
        </div>
    </div>

    <!-- Products Section -->
    <section class="product">
        <!-- Ausdrucke Produkt -->
        <div id="ausdrucke" class="info-section2">
            <div class="info-text2">
                <h3>Ausdrucke</h3>
                <h4>Preise: <strong>4,99 - 5,99 €</strong></h4>
                <p>Ideal für Dokumente, Bilder, Handouts und Referenzmaterialien. Sie können zwischen Schwarz-Weiß- und Farbdrucken im A4-Format wählen.</p>

                <div class="container">
                    <h4>Wählen Sie eine Option:</h4>
                    &nbsp;&nbsp;<select id="whiteOption" onchange="updatePrice('white', this.value)">
                        <option value="">Bitte wählen...</option>
                        <option value="Schwarz-Weiß">Schwarz-Weiß</option>
                        <option value="Farbe">Farbe</option>
                    </select>
                </div>

                <div>
                    <strong><p id="whitePosterPrice"></p></strong>
                </div>

                <!-- Button standardmäßig deaktiviert und mit eindeutiger ID -->
                <button id="addToCartWhite" class="styled-button" onclick="addToCart('Ausdrucke', document.getElementById('whitePosterPrice').textContent, document.getElementById('whiteOption').value)" disabled>In den Warenkorb</button>
            </div>
            <img src="../Bilder/Designer(21).png" alt="Copyshop-Bereich" class="info-image2">
        </div>

        <!-- Kalender Produkt -->
        <div id="kalender" class="info-section">
            <img src="../Bilder/Designer(27).png" alt="Copyshop-Bereich" class="info-image">

            <div class="info-text">
                <h3>Kalender</h3>
                <h4>Preise: <strong>14,99 - 39,99 €</strong></h4>
                <p>In unserem Copyshop drucken wir individuelle Kalender in verschiedenen Formaten: A4, A3 und sogar A2 für großformatige Wandkalender.</p>

                <div class="container">
                    <h4>Wählen Sie eine Option:</h4>
                    &nbsp;&nbsp;<select id="formatOption" onchange="updatePrice('format', this.value)">
                        <option value="">Bitte wählen...</option>
                        <option value="A4">A4 (21 x 29,7 cm)</option>
                        <option value="A3">A3 (29,7 x 42 cm)</option>
                        <option value="A2">A2 (42 x 59,4 cm)</option>
                    </select>

                    <strong><p id="formatPosterPrice"></p></strong>
                </div>

                <!-- Button standardmäßig deaktiviert und mit eindeutiger ID -->
                <button id="addToCartFormat" class="styled-button" onclick="addToCart('Kalender', document.getElementById('formatPosterPrice').textContent, document.getElementById('formatOption').value)" disabled>In den Warenkorb</button>
            </div>
        </div>

        <!-- Fotobuch Produkt -->
        <div id="fotobuch" class="info-section2">
            <div class="info-text2">
                <h3>Fotobuch</h3>
                <h4>Preise: <strong>24,99 - 49,99 €</strong></h4>
                <p>In unserem Copyshop drucken wir hochwertige Fotobücher in verschiedenen Formaten: 15 x 20 cm, A4 und A3.</p>

                <div class="container">
                    <h4>Wählen Sie eine Option:</h4>
                    &nbsp;&nbsp;<select id="buchOption" onchange="updatePrice('buch', this.value)">
                        <option value="">Bitte wählen...</option>
                        <option value="15 x 20 cm">15 x 20 cm</option>
                        <option value="A4">A4 (21 x 29,7 cm)</option>
                        <option value="A3">A3 (29,7 x 42 cm)</option>
                    </select>
                    <strong><p id="buchPosterPrice"></p></strong>
                </div>

                <!-- Button standardmäßig deaktiviert und mit eindeutiger ID -->
                <button id="addToCartBuch" class="styled-button" onclick="addToCart('Fotobuch', document.getElementById('buchPosterPrice').textContent, document.getElementById('buchOption').value)" disabled>In den Warenkorb</button>
            </div>
            <img src="../Bilder/Designer(23).png" alt="Copyshop-Bereich" class="info-image2">
        </div>

        <!-- Fotoalbum Produkt -->
        <div id="fotoalbum" class="info-section">
            <img src="../Bilder/Designer(25).png" alt="Copyshop-Bereich" class="info-image">

            <div class="info-text">
                <h3>Fotoalbum</h3>
                <h4>Preise: <strong>44,99 - 64,99 €</strong></h4>
                <p>Erstellen Sie Ihr persönliches Fotoalbum! In unserem Copyshop bieten wir hochwertige Fotoalben in verschiedenen Formaten.</p>

                <div class="container">
                    <h4>Wählen Sie eine Option:</h4>
                    &nbsp;&nbsp;<select id="albumOption" onchange="updatePrice('album', this.value)">
                        <option value="">Bitte wählen...</option>
                        <option value="15 x 20 cm">15 x 20 cm</option>
                        <option value="A4">A4 (21 x 29,7 cm)</option>
                        <option value="A3">A3 (29,7 x 42 cm)</option>
                    </select>

                    <strong><p id="albumPosterPrice"></p></strong>
                </div>

                <!-- Button standardmäßig deaktiviert und mit eindeutiger ID -->
                <button id="addToCartAlbum" class="styled-button" onclick="addToCart('Fotoalbum', document.getElementById('albumPosterPrice').textContent, document.getElementById('albumOption').value)" disabled>In den Warenkorb</button>
            </div>
        </div>

        <!-- Kleine Poster Produkt -->
        <div id="kleineposter" class="info-section2">
            <div class="info-text2">
                <h3>Kleine Poster</h3>
                <h4>Preise: <strong>5,99 - 19,99 €</strong></h4>
                <p>11" x 17" (Tabloid): Kleine Ankündigungen, Veranstaltungen, In-Store-Poster.</p>

                <div class="container">
                    <h4>Wählen Sie eine Option:</h4>
                    &nbsp;&nbsp;<select id="smallOption" onchange="updatePrice('small', this.value)">
                        <option value="">Bitte wählen...</option>
                        <option value="Seidenmatt">Seidenmatt</option>
                        <option value="Hochglanz">Hochglanz</option>
                        <option value="Leinwand">Leinwand</option>
                    </select>
                </div>

                <div>
                    <strong><p id="smallPosterPrice"></p></strong>
                </div>

                <!-- Button standardmäßig deaktiviert und mit eindeutiger ID -->
                <!-- <button id="addToCartSmall" class="styled-button" onclick="addToCart('Kleine Poster', document.getElementById('smallPosterPrice').textContent, document.getElementById('smallOption').value)" disabled>In den Warenkorb</button> -->
                 <button id="addToCartSmall" class="styled-button" onclick="addToCart('Kleine Poster', document.getElementById('smallPosterPrice').textContent, document.getElementById('smallOption').value)" disabled>In den Warenkorb</button>
                <!-- <button id="addToCartWhite" class="styled-button" onclick="addToCart('Ausdrucke', document.getElementById('whitePosterPrice').textContent, document.getElementById('whiteOption').value)" disabled>In den Warenkorb</button> -->
            </div>

            <img src="../Bilder/11_17.webp" alt="Copyshop-Bereich" class="info-image2">
        </div>

        <!-- Mittlere Poster Produkt -->
        <div id="mittlereposter" class="info-section">
            <img src="../Bilder/18x24_3_1_3.jpg" alt="Copyshop-Bereich" class="info-image">

            <div class="info-text">
                <h3>Mittlere Poster</h3>
                <h4>Preise: <strong>20,00 - 34,99 €</strong></h4>
                <p>18" x 24": Werbung, Konzerte, allgemeine Veranstaltungen.</p>

                <div class="container">
                    <h4>Wählen Sie eine Option:</h4>
                    &nbsp;&nbsp;<select id="mediumOption" onchange="updatePrice('medium', this.value)">
                        <option value="">Bitte wählen...</option>
                        <option value="Seidenmatt">Seidenmatt</option>
                        <option value="Hochglanz">Hochglanz</option>
                        <option value="Leinwand">Leinwand</option>
                    </select>

                    <strong><p id="mediumPosterPrice"></p></strong>
                </div>

                <!-- Button standardmäßig deaktiviert und mit eindeutiger ID -->
                <button id="addToCartMedium" class="styled-button" onclick="addToCart('Mittlere Poster', document.getElementById('mediumPosterPrice').textContent, document.getElementById('mediumOption').value)" disabled>In den Warenkorb</button>
            </div>
        </div>

        <!-- Große Poster Produkt -->
        <div id="großeposter" class="info-section2">
            <div class="info-text2">
                <h3>Große Poster</h3>
                <h4>Preise: <strong>35,00 - 49,99 €</strong></h4>
                <p>24" x 36": Filmplakate, große Werbeanzeigen mit detaillierten Visuals.</p>

                <div class="container">
                    <h4>Wählen Sie eine Option:</h4>
                    &nbsp;&nbsp;<select id="largeOption" onchange="updatePrice('large', this.value)">
                        <option value="">Bitte wählen...</option>
                        <option value="Seidenmatt">Seidenmatt</option>
                        <option value="Hochglanz">Hochglanz</option>
                        <option value="Leinwand">Leinwand</option>
                    </select>

                    <strong><p id="largePosterPrice"></p></strong>
                </div>

                <!-- Button standardmäßig deaktiviert und mit eindeutiger ID -->
                <button id="addToCartLarge" class="styled-button" onclick="addToCart('Große Poster', document.getElementById('largePosterPrice').textContent, document.getElementById('largeOption').value)" disabled>In den Warenkorb</button>
            </div>
            <img src="../Bilder/24x36_1_1_1.jpg" alt="Copyshop-Bereich" class="info-image2">
        </div>

        <!-- Übergrößen-Poster Produkt -->
        <div id="übergrößenposter" class="info-section">
            <img src="../Bilder/36_48.webp" alt="Copyshop-Bereich" class="info-image">

            <div class="info-text">
                <h3>Übergrößen-Poster</h3>
                <h4>Preise: <strong>50,00 - 74,99 €</strong></h4>
                <p>36" x 48": Messepräsentationen, Außenwerbung.</p>

                <div class="container">
                    <h4>Wählen Sie eine Option:</h4>
                    &nbsp;&nbsp;<select id="extra_largeOption" onchange="updatePrice('extra_large', this.value)">
                        <option value="">Bitte wählen...</option>
                        <option value="Seidenmatt">Seidenmatt</option>
                        <option value="Hochglanz">Hochglanz</option>
                        <option value="Leinwand">Leinwand</option>
                    </select>

                    <strong><p id="extra_largePosterPrice"></p></strong>
                </div>

                <!-- Button standardmäßig deaktiviert und mit eindeutiger ID -->
                <button id="addToCartExtraLarge" class="styled-button" onclick="addToCart('Übergrößen-Poster', document.getElementById('extra_largePosterPrice').textContent, document.getElementById('extra_largeOption').value)" disabled>In den Warenkorb</button>
            </div>
        </div>

    </section>
</main>

<!-- Scripts -->
<script>
    const fileInput = document.getElementById('fileInput');
    const dragArea = document.getElementById('dragArea');
    const imagePreview = document.getElementById('imagePreview');
    const fileNameDisplay = document.getElementById('fileNameDisplay');

    let selectedFiles = []; // Globale Variable für ausgewählte Dateien

    // Handle file selection via file explorer
    fileInput.addEventListener('change', () => {
        handleFileSelect(fileInput.files);
    });

    // Handle drag and drop functionality
    dragArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        dragArea.classList.add('dragover');
    });

    dragArea.addEventListener('dragleave', () => {
        dragArea.classList.remove('dragover');
    });

    dragArea.addEventListener('drop', (e) => {
        e.preventDefault();
        dragArea.classList.remove('dragover');
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            fileInput.value = ""; // Clear file input to allow re-selection
            handleFileSelect(files);
        }
    });

    // Function to handle the selected file
    function handleFileSelect(files) {
        selectedFiles = files; // Ausgewählte Dateien speichern

        const file = files[0];
        if (file && file.type.startsWith('image')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
            };
            reader.readAsDataURL(file);

            // Dateiname anzeigen
            fileNameDisplay.textContent = file.name;
        } else {
            alert('Bitte wählen Sie eine Bilddatei aus');
            fileNameDisplay.textContent = 'Keine Datei ausgewählt';
            imagePreview.style.display = 'none'; // Vorschau ausblenden, wenn keine Bilddatei
            selectedFiles = []; // Ausgewählte Dateien zurücksetzen
        }
    }

    // Funktion zum Aktualisieren des Preises und Aktivieren/Deaktivieren des Buttons
    function updatePrice(type, value) {
        let price = 0;
        let addToCartButton;
        let priceElementId;

        if (type === 'white') {
            addToCartButton = document.getElementById('addToCartWhite');
            priceElementId = 'whitePosterPrice';

            if (value === "Schwarz-Weiß") {
                price = 4.99;
            } else if (value === "Farbe") {
                price = 5.99;
            }
        } else if (type === 'format') {
            addToCartButton = document.getElementById('addToCartFormat');
            priceElementId = 'formatPosterPrice';

            if (value === "A4") {
                price = 14.99;
            } else if (value === "A3") {
                price = 24.99;
            } else if (value === "A2") {
                price = 39.99;
            }
        } else if (type === 'buch') {
            addToCartButton = document.getElementById('addToCartBuch');
            priceElementId = 'buchPosterPrice';

            if (value === "15 x 20 cm") {
                price = 24.99;
            } else if (value === "A4") {
                price = 34.99;
            } else if (value === "A3") {
                price = 49.99;
            }
        } else if (type === 'album') {
            addToCartButton = document.getElementById('addToCartAlbum');
            priceElementId = 'albumPosterPrice';

            if (value === "15 x 20 cm") {
                price = 44.99;
            } else if (value === "A4") {
                price = 54.99;
            } else if (value === "A3") {
                price = 64.99;
            }
        } else if (type === 'small') {
            addToCartButton = document.getElementById('addToCartSmall');
            priceElementId = 'smallPosterPrice';

            if (value === "Seidenmatt") {
                price = 5.99;
            } else if (value === "Hochglanz") {
                price = 10.99;
            } else if (value === "Leinwand") {
                price = 19.99;
            }
        } else if (type === 'medium') {
            addToCartButton = document.getElementById('addToCartMedium');
            priceElementId = 'mediumPosterPrice';

            if (value === "Seidenmatt") {
                price = 20.00;
            } else if (value === "Hochglanz") {
                price = 28.99;
            } else if (value === "Leinwand") {
                price = 34.99;
            }
        } else if (type === 'large') {
            addToCartButton = document.getElementById('addToCartLarge');
            priceElementId = 'largePosterPrice';

            if (value === "Seidenmatt") {
                price = 35.00;
            } else if (value === "Hochglanz") {
                price = 45.99;
            } else if (value === "Leinwand") {
                price = 49.99;
            }
        } else if (type === 'extra_large') {
            addToCartButton = document.getElementById('addToCartExtraLarge');
            priceElementId = 'extra_largePosterPrice';

            if (value === "Seidenmatt") {
                price = 50.00;
            } else if (value === "Hochglanz") {
                price = 60.99;
            } else if (value === "Leinwand") {
                price = 74.99;
            }
        }

        // Button aktivieren oder deaktivieren
        if (price > 0) {
            addToCartButton.disabled = false;
        } else {
            addToCartButton.disabled = true;
        }

        // Preis anzeigen oder leeren
        if (priceElementId) {
            document.getElementById(priceElementId).textContent = price > 0 ? `Preis: ${price.toFixed(2).replace('.', ',')} €` : '';
        }
    }

    // Funktion zum Hinzufügen zum Warenkorb (angepasst für Datei-Uploads)
    function addToCart(product, priceText, option) {
    const price = priceText.split(" ")[1]; // Preis aus dem Text extrahieren

    const xhr = new XMLHttpRequest();
    xhr.open("POST", `../PHP/add_to_cart.php`, true);

    // FormData erstellen
    const formData = new FormData();
    formData.append('product', product);
    formData.append('price', price);
    formData.append('option', option);

    // Produkte, die eine Bilddatei erfordern
    const productsWithImage = ['Ausdrucke', 'Kleine Poster', 'Mittlere Poster', 'Große Poster', 'Übergrößen-Poster'];

    // Wenn das Produkt eines der oben genannten ist, die ausgewählte Datei hinzufügen
    if (productsWithImage.includes(product)) {
        if (selectedFiles.length > 0) {
            formData.append('uploaded_file', selectedFiles[0]);
        } else {
            alert('Bitte wählen Sie eine Datei aus.');
            return;
        }
    }

    xhr.onload = function () {
        if (this.status === 200) {
            alert(this.responseText); // Erfolgsmeldung anzeigen
        }
    };

    xhr.send(formData);
}

</script>

<!-- Footer -->
<div class="footer">
    <p class="footer">© <span id="year"></span> Pomodro Copyshop. Alle Rechte vorbehalten.
        <button class="impressum" onclick="window.location.href='impressum.php';">Impressum</button>
    </p>
    <script>document.getElementById("year").textContent = new Date().getFullYear();</script>
</div>

</body>
</html>
