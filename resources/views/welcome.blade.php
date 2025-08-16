<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>justicehire - Lawyer Hiring System</title>
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text:ital@0;1&family=New+Amsterdam&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Neuton:ital,wght@0,200;0,300;0,400;0,700;0,800;1,400&family=Righteous&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container text-center">
        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo">
        <h2 class="site-name">justice<span>hire</span></h2>
        <p class="description">Connecting you with trusted legal experts.</p>
        <div class="buttons mt-4">
            <a href="{{ route('login') }}" class="btn btn-1">Sign In</a>&nbsp;&nbsp;
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-2">Sign Up</a>
            @endif
        </div>
    </div>
</body>

</html>
