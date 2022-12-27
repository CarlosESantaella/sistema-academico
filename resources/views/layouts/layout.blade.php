<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Sistema Académico | @yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta>
        <link rel="icon" type="image/png" href="{{asset('images/logo-salle.png')}}">
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        />
        @vite('resources/css/app.css')
        <link 
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
            rel="stylesheet" 
            integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" 
            crossorigin="anonymous">
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/gh/kmlpandey77/bootnavbar@v1.1.1/css/bootnavbar.css"
        />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
        @stack('styles')
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @livewireStyles
    </head>
    <body class="tw-bg-slate-100">
        @include('layouts.header')
        <main class="app-main">

            @yield('content')
        </main>
        @include('layouts.footer')
        @vite('resources/js/app.js')
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/gh/kmlpandey77/bootnavbar@v1.1.1/js/bootnavbar.js"></script>
        @stack('scripts')
        <script type="module">
            new bootnavbar();
        </script>
        @livewireScripts
    </body>
</html>