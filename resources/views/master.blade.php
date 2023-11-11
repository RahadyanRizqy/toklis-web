<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Toklis Web App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/commons/2/2c/Eo_circle_deep-purple_white_letter-t.svg" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital@0;1&family=Poppins&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Courier+Prime&display=swap');
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Poppins, sans-serif;
        }

        header {
            background-color: #333;
        }

        .nav-bar {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        .nav-bar > li {
            float: left;
        }

        .nav-bar > li a {
            display: block;
            color: white;
            text-align: center;
            padding: 10px 16px;
            text-decoration: none;
        }

        .nav-bar > li a:hover {
            background-color: #111;
        }

        .table-fonts td {
            font-family: 'Courier Prime', 'Courier New', Courier, monospace;
            font-size: 1rem;
        }

        .balance-text tr td {
            font-family: 'Courier Prime', 'Courier New', Courier, monospace;
            font-size: 1.25rem;
        }
    </style>
    @stack('styles')
</head>
<body>
    <header class="d-flex justify-content-center">
        <ul class="nav-bar">
            <li><a href="/">Beranda</a></li>
            <li><a href="/about">Tentang</a></li>
        </ul>
    </header>
    <main>
        @if ($subview === 'about')
            @include('subview/about')
        @else
            @include('subview/home')
        @endif
    </main>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>