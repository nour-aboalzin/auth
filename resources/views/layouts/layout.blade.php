<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .top-header {
            background-color: #007bff;
            color: #fff;
            padding: 10px 0;
        }

        .navbar {
            display: flex;
            justify-content: center;
        }

        .container {
            width: 80%;
            margin: 0 auto;
        }

        .menu {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .menu li {
            margin-right: 20px;
        }

        .menu li:last-child {
            margin-right: 0;
        }

        .menu li a {
            color: #fff;
            text-decoration: none;
            padding: 10px;
            transition: background-color 0.3s;
        }

        .menu li a:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .body-content {
            padding: 20px 0;
            background-color: #f0f0f0;
        }

        .container .body-content {
            text-align: center;
        }

        /* Adjusting form styles */
        .profile-form {
            text-align: left;
        }

        .profile-form .form-group {
            margin-bottom: 20px;
        }

        .profile-form label {
            display: block;
            margin-bottom: 5px;
        }

        .profile-form input {
            width: calc(100% - 12px);
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .profile-form button {
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .profile-form button:hover {
            background-color: #0056b3;
        }

        div.error {
            color: red;
            font-weight: 600;
            margin-top: 6px;
        }

        .alert {
            padding: 15px;
            margin-top: 20px;
            background-color: #d4edda;
            border: 1px solid #0dc337;
            color: #155724;
            border-radius: 5px;
            position: relative;
        }

        .alert-error {
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
        }
    </style>
</head>

<body>

    <header class="top-header">
        <nav class="navbar">
            <div class="container">
                <ul class="menu">
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('profile') }}">Profile</a></li>
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="body-content">
        <div class="container">
            @session('success')
                <div class="alert" id="success-alert">
                    {{ session('success') }}
                </div>
            @endsession

            @yield('content')

        </div>
    </div>

</body>

</html>
