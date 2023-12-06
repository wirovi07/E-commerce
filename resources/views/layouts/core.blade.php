<!doctype html>
<html lang="en">

<head>
    @include('layouts.head')
    @yield('add-head')
</head>

<body class="app sidebar-mini">

    @include('layouts.topbar')
    @include('layouts.sidenav')
    <main class="app-content">
        @yield('contenido')
    </main>
    @include('layouts.scripts')
    @yield('add-scripts')

</body>

<footer>
    @include('layouts.footer')
</footer>

</html>
