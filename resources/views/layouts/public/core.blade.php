<!doctype html>
<html lang="en">

<head>
    @include('layouts.head')
    @yield('add-head')
    <style>
        .contenido{
            margin-top: 50px;
             padding: 30px;
        }

        .text-meli{
            color:#00a650;
        }

        .two-lines{
            max-height: 3em;
            overflow: hidden;
            line-height: 1.5em
        }

    
    </style>
</head>

<body class="app sidebar-mini" style="background: #ededed;">

    @include('layouts.public.topbar')
    <main class="contenido">
        @yield('contenido')
    </main>
    @include('layouts.scripts')
    @yield('add-scripts')

</body>

<footer>
    @include('layouts.public.footer')
</footer>

</html>
