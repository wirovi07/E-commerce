<!doctype html>
<html lang="en">

<head>
    @include('layouts.head')
    @yield('add-head')
    <style>
        .contenido {
            margin-top: 50px;
            padding: 30px;
        }

        .text-meli {
            color: #00a650;
        }
        .text-meli-detalle {
            color: #00a650;
            align-items: center;
            margin: 15px 15px 25px 15px;
            font-weight: 500;
            font-size: 18px;
        }

        .two-lines {
            max-height: 3em;
            overflow: hidden;
            line-height: 1.5em
        }

        /* DETALLE */
        .container-detalle {
            border: 1px solid rgba(0, 0, 0, .1);
            border-radius: 8px;
            padding: 16px;
            font-size: 14px;
        }

        .container-p2 .title {
            flex: auto;
            font-size: 22px;
            margin-right: 24px;
            margin-bottom: 8px;
            padding: 0;
        }
        .cards-img{
            box-sizing: border-box;
        }

        .header-subtitle .subtitle {
            color: rgba(0, 0, 0, .55);
            font-size: 14px;
            font-weight: 400;
            white-space: pre-wrap;
        }
        .button-heart{
            color: #3483fa;
            font-size: 20px;
            margin-bottom: 10px;
        }

        a {
            text-decoration: none;
        }

        .color-span {
            color: rgba(0, 0, 0, .55);
            font-size: 15px;
        }

        .star-calif {
            color: #3483fa;
        }

        .bi {
            margin-right: 2px;
        }

        .more-sale .more-sale-vin a{
            font-size: 12px; 
            color: #ededed;
            font-weight: 600;
            padding: 3px 4px;
            background-color: #f73;
            line-height: 1;
            border-radius: 3px;
        }

        .position .position-more-sale a {
            font-size: 12px;
            font-weight: 800;
            color: #3483fa;
        }

        .price_product{
            font-size: 16px;
            font-weight: 400;
            color: rgba(0,0,0,.55);
        }

        .price_product_with_porcentage{
            color: rgba(0,0,0,.9);
            font-weight: 390;
            font-size: 36px;
            letter-spacing: normal;
            line-height: 1.25;
        }

        .info-cuotas{
            font-weight: 400;
            font-size: 16px;
            color: rgba(0,0,0,.9);
            margin: 0;
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
