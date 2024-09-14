<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Account</title>
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/account.css') }}">
</head>

<body>
    <x-header></x-header>
    </nav>
    <main id="main-account">
        <div class="account-info">
            <h1>My Account</h1>
            <div class="info-block">
                <?php UserController::show(); ?>
            </div>
        </div>
        <div class="edit-info" style="display: none;">
            <h1>Edit Information</h1>
            <div class="changeForm">
                <form id="changeInfoForm" action="{{ route('user.update') }}" method="post" onsubmit="handleFormSubmission()">
                    @csrf
                    <?php $user = Auth::user(); ?>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <label for="name">Name:</label><br>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"><br>

                    <label for="phone">Phone Number:</label><br>
                    <input type="text" id="phone" name="phone" value="{{ old('phone', $user->phone) }}"><br>

                    <label for="address">Address:</label><br>
                    <input type="text" id="address" name="address" value="{{ old('address', $user->address) }}"><br>

                    <label for="email">Email:</label><br>
                    <input type="text" id="email" name="email" value="{{ old('email', $user->email) }}"><br>

                    <label for="password">New Password:</label><br>
                    <input type="password" id="password" name="password" placeholder="Leave blank if not changing"><br>

                    <label for="password_confirmation">Confirm Password:</label><br>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm new password"><br>

                    <div class="button-group">
                        <button type="submit" style="background-color: mediumturquoise;">Save Changes</button>
                        <button type="button" onclick="cancelChanges()" id="cancelButton" style="background-color: red;">Cancel Changes</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="buttons">
            <button id="editButton">Informatie bewerken</button>
            <form action="logout" method="post">
                <button type="submit" name="logout">Log Out</button>
            </form>
        </div>
    </main>
    <x-footer></x-footer>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function toggleEdit() {
                var infoBlock = document.querySelector('.info-block');
                var editBlock = document.querySelector('.edit-info');
                var editButton = document.getElementById('editButton');
                var cancelButton = document.getElementById('cancelButton');

                if (infoBlock.style.display === 'none') {
                    infoBlock.style.display = 'block';
                    editBlock.style.display = 'none';
                    editButton.style.display = 'block';
                    cancelButton.style.display = 'none';
                } else {
                    infoBlock.style.display = 'none';
                    editBlock.style.display = 'block';
                    editButton.style.display = 'none';
                    cancelButton.style.display = 'block';
                    populateForm();
                }
            }

            function populateForm() {
                var user = <?php echo json_encode($user); ?>;
                document.getElementById('name').value = user.name;
                document.getElementById('phone').value = user.phone;
                document.getElementById('address').value = user.address;
                document.getElementById('email').value = user.email;
            }

            function cancelChanges() {
                var infoBlock = document.querySelector('.info-block');
                var editBlock = document.querySelector('.edit-info');
                var editButton = document.getElementById('editButton');
                var cancelButton = document.getElementById('cancelButton');

                infoBlock.style.display = 'block';
                editBlock.style.display = 'none';
                cancelButton.style.display = 'none';
                editButton.style.display = 'block';
            }

            var editButton = document.getElementById('editButton');
            editButton.addEventListener('click', function() {
                toggleEdit();
            });

            var cancelButton = document.getElementById('cancelButton');
            cancelButton.addEventListener('click', function() {
                cancelChanges();
            });
        });
    </script>
</body>

</html>