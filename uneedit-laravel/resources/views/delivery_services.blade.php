<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>delivery service</title>
  <link rel="stylesheet" href="css/global.css">
  <link rel="stylesheet" href="css/delivery_services.css">
</head>

<body>
  <x-header></x-header>
  <main>
    <div class="container">
      <div id="delivery_box-container">
        <div class="delivery_box">
          <h1 class="text_delivery">Bezorgdiensten</h1>
          <p class="text_delivery"> Als gebruiker wil ik informatie zien over bezorgdiensten zoals UPS, DHL, Homerr, zodat ik kan
            kiezen voor ophalen en verzenden.</p>
          <p class="text_delivery">Kies een bezorgdienst:</p>
          <ul>
            <li><button class="delivery_service" onclick="select_service('UPS')">UPS</button></li>
            <li><button class="delivery_service" onclick="select_service('DHL')">DHL</button></li>
            <li><button class="delivery_service" onclick="select_service('Homerr')">Homerr</button></li>

          </ul>
          <div id="result" class="text_delivery"></div>
        </div>
        <script>
          function select_service(delivery_service) {
            document.getElementById('result').innerText = `Je hebt ${delivery_service} gekozen.`;

          }
        </script>
      </div>
    </div>
  </main>
  <x-footer></x-footer>
</body>

</html>