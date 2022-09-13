<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/admin.css">
    <link rel="stylesheet" href="/css/standards.css">
    <script src="/js/form.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&family=Poppins:wght@400;700&display=swap" rel="stylesheet">    
    <script src="https://kit.fontawesome.com/7d0f299f51.js" crossorigin="anonymous"></script>
    <title>@yield('title')</title>
</head>
<body onLoad="height()" onLoad="error()" >
    <header>
        @include('includes.navigation')
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>