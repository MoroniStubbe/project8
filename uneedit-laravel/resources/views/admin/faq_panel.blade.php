<?php use App\Http\Controllers\FaqController; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin_panel.css') }}">
    <title>FAQ Panel</title>
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

        <!-- Display all FAQ entries -->
        <h2>Current FAQs</h2>
        <?php $faqItems = FaqController::show(); ?>
        <table class="table1">
            <tr>
                <th>Message</th>
                <th>Answer</th>
                <th>ID</th>
            </tr>
            @foreach ($faqItems as $faq)
            <tr>
                <td>{{ $faq->message }}</td>
                <td>{{ $faq->answer }}</td>
                <td>{{ $faq->id }}</td>
            </tr>
            @endforeach
        </table>
    </main>

    <!-- Form to add new FAQ -->
    <form method="post" action="{{ route('admin.faq.create') }}" class="input1">
        @csrf
        <input name="message" type="text" placeholder="Add question" required>
        <input name="answer" type="text" placeholder="Add answer" required>
        <input type="submit" value="Add FAQ">
    </form>

    <!-- Form to remove FAQ by ID -->
    <form method="post" action="{{ route('admin.faq.delete') }}" class="input1">
        @csrf
        <input name="rmfaq" type="text" placeholder="Remove entry by entering ID" required>
        <input type="submit" value="Remove FAQ">
    </form>
</body>

</html>