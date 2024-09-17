<?php use App\Http\Controllers\NewsController; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/admin_panel.css') }}">
  <title>News Panel</title>
</head>

<body>
  <x-admin_nav></x-admin_nav>

  <main>
    <!-- Display success and error messages -->
    @if (session('success'))
    <p>{{ session('success') }}</p>
    @endif

    @if (session('error'))
    <p>{{ session('error') }}</p>
    @endif

    <!-- Display validation errors -->
    @if ($errors->any())
    <div>
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <!-- Display all news items -->
    <h2>Current News</h2>
    <?php $newsItems = NewsController::show(); ?>
    <ul>
      @foreach ($newsItems as $news)
      <li>{{ $news->id }}: {{ $news->message }}</li>
      @endforeach
    </ul>
  </main>

  <!-- Form to add new news -->
  <form method="post" action="{{ route('admin.news.create') }}" class="input1">
    @csrf
    <input name="addnew" type="text" placeholder="Add something by entering your text and then pressing submit">
    <input type="submit" value="Add News">
  </form>

  <!-- Form to remove news by ID -->
  <form method="post" action="{{ route('admin.news.delete') }}" class="input1">
    @csrf
    <input name="rmnew" type="text" placeholder="Remove something by entering ID and then pressing submit">
    <input type="submit" value="Remove News">
  </form>
</body>

</html>