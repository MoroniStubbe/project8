<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bezorgdiensten</title>
  <link rel="stylesheet" href="css/global.css">
  <link rel="stylesheet" href="css/bezorgdiensten.css">
</head>

<body>
  <?php readfile("header.html") ?>
  <main>
    <div class="container">
      <div id="bezorgbox-container">
        <div class="bezorgbox">
          <h1 class="textbezorg">Bezorgdiensten</h1>
          <p class="textbezorg"> Als gebruiker wil ik informatie zien over bezorgdiensten zoals UPS, DHL, Homerr, zodat ik kan
            kiezen voor ophalen en verzenden.</p>
          <p class="textbezorg">Kies een bezorgdienst:</p>
          <ul>
            <li><button class="bezorgdiensten" onclick="selectBezorgdienst('UPS')">UPS</button></li>
            <li><button class="bezorgdiensten" onclick="selectBezorgdienst('DHL')">DHL</button></li>
            <li><button class="bezorgdiensten" onclick="selectBezorgdienst('Homerr')">Homerr</button></li>
            <!-- Voeg hier andere bezorgdiensten toe -->
          </ul>
          <div id="result" class="textbezorg"></div>
        </div>
        <script>
          function selectBezorgdienst(bezorgdienst) {
            document.getElementById('result').innerText = `Je hebt ${bezorgdienst} gekozen.`;
            // Hier kun je verdere acties toevoegen afhankelijk van de geselecteerde bezorgdienst
          }
        </script>
      </div>
    </div>
  </main>
  <?php readfile("footer.html") ?>
</body>

</html>