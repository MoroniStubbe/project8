<?php

use App\Http\Controllers\UserController; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{ asset('css/add_user.css') }}">
</head>

<body>
    <x-admin_nav></x-admin_nav>

    <h2>Admins</h2>
    <table>
        <?php $admins = UserController::get_admins(); ?>
        @foreach ($admins as $admin)
        <tr>
            <td>{{ $admin->id }}</td>
            <td>{{ $admin->name }}</td>
            <td>{{ $admin->email }}</td>
            <td>
                <form method="POST" action="{{ route('admin.users.removeAdmin', $admin->id) }}">
                    @csrf
                    @method('PATCH')
                    <button type="submit">Demote to User</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <h2>Users</h2>
    <table>
        <?php $users = UserController::get_users(); ?>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <form method="POST" action="{{ route('admin.users.makeAdmin', $user->id) }}">
                    @csrf
                    @method('PATCH')
                    <button type="submit">Promote to Admin</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

</body>

</html>