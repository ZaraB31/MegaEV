<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/standards.css">
    <script src="/js/tabOpen.js"></script>
    <script src="/js/header.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:wght@400;700&display=swap" rel="stylesheet">    
    <script src="https://kit.fontawesome.com/7d0f299f51.js" crossorigin="anonymous"></script>
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
</head>
<body onLoad="height()">
    <header>
        @include('includes.header')
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        @include('includes.footer')
    </footer>
</body>
</html>