<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNEED-IT - Contact</title>
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/request.css') }}">
    <meta name="description" content="Your one-stop solution for all your IT needs.">
    <meta name="keywords" content="IT, repair, services, phones, laptops, PCs">
</head>

<body>
    <x-header></x-header>
    <main>
        <section class="hero">
            <div class="container">
                <h1>Aanvraag</h1>
                <form method="POST">
                    @csrf
                    <label for="platform">Select Platform:</label>
                    <select name="device_type" id="cars">
                        <option value="telefoon">Telefoon</option>
                        <option value="pc">PC</option>
                        <option value="appel pc/mac">Apple PC/Mac</option>
                        <option value="laptop">Laptop</option>
                        <option value="other">Other</option>
                    </select>
                    <label for="name">Computer naam/Telefoon naam:</label>
                    <input type="text" class="" name="device_name" placeholder="Computer Name">
                    <label for="email">Email:</label>
                    <input type="text" class="" name="email" placeholder="Email">
                    <label for="phone_number">Telefoon nummer:</label>
                    <input type="text" class="" name="telephone" placeholder="Phone Number">
                    <label for="message">Probleem met product:</label>
                    <textarea name="problem" placeholder="Problem"></textarea>
                    <input type="submit" id="btn"></input>
                </form>
            </div>
        </section>
    </main>
    <x-footer></x-footer>
</body>

</html>