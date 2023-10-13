<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AI Solutions - Teste Técnico</title>
    @vite(['resources/sass/app.scss'])
    @livewireStyles
</head>
<body>

<div id="app" class="bg-light vh-100">

    <div class="container">
        @yield('content')
    </div>

</div>

<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/72c4a6b265.js" crossorigin="anonymous"></script>
@livewireScripts
@vite(['resources/js/app.js'])
</body>
</html>
