<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        body {
            font-family: 'figtree', sans-serif;
            margin: 0; /* Ensure no default margin */
            height: 100vh; /* Full viewport height */
            display: flex; /* Flexbox for centering content */
            align-items: center; /* Vertically center */
            justify-content: center; /* Horizontally center */
        }
        .bg-img {
            background-image: url('https://www.yonder.fr/sites/default/files/destinations/Pavyllon-web%C2%A9VERONESE-012.jpg');
            background-size: cover;
            background-position: center;
            position: absolute; /* Cover the whole viewport */
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1; /* Place behind the content */
        }
        .form-container {
            width: 90%;
            max-width: 360px;
            padding-top: 20px;
            padding-bottom: 60px;
            background-color: rgba(255, 255, 255, 0.5); /* Higher transparency */
            box-shadow: none;
            border-radius: 8px; /* Optional: for rounded corners */
        }
        .auth-card-inner {
            opacity: 0.8; /* Adjust for content transparency */
        }
    </style>
</head>
<body class="font-sans text-gray-900 antialiased">
    <div class="bg-img"></div> <!-- Background image -->
    <div class="form-container">
        <div class="auth-card auth-card-inner">
            <!-- <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-opacity-50 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div> -->
        </div>
    </div>
</body>
</html>
