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

        .productos-rela {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .margin-img {
            margin: 3px 0px 1px 2px;
        }

        .img-principal {
            width: 600px;
            height: 500px;
            padding: 26px;
            margin: 24px 24px 50px 24px;
            top: 0;
        }

        .img-product .img-product-1 {
            width: 50px;
            height: 50px;
            border: 1px solid rgba(0, 0, 0, .2);
            cursor: pointer;
            overflow: hidden;
            border-radius: 3px;
        }

        .img-product .img-product-1:hover {
            border-color: #3483fa;
            border-width: 2px;
        }

        .holver-dropdown-menu a:hover {
            background-color: #3483fa;
            color: #fff;
        }

        .two-lines {
            max-height: 3em;
            overflow: hidden;
            line-height: 1.5em
        }

        .promocionado {
            font-size: 12px;
            color: rgba(0, 0, 0, .55);
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

        .cards-img {
            box-sizing: border-box;
        }

        .header-subtitle .subtitle {
            color: rgba(0, 0, 0, .55);
            font-size: 14px;
            font-weight: 400;
            white-space: pre-wrap;
        }

        .button-heart {
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

        .more-sale .more-sale-vin a {
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

        .price_product {
            font-size: 16px;
            font-weight: 400;
            color: rgba(0, 0, 0, .55);
        }

        .price_product_with_porcentage {
            color: rgba(0, 0, 0, .9);
            font-weight: 390;
            font-size: 36px;
            letter-spacing: normal;
            line-height: 1.25;
        }

        .info-cuotas {
            font-weight: 400;
            font-size: 16px;
            color: rgba(0, 0, 0, .9);
            margin: 0;
        }

        .image-visa img {
            width: 62px;
            height: 35px;
        }

        .image-mastercard img {
            width: 29px;
            height: 24px;
        }

        .info-payment-p {
            color: #3483fa;
            font-size: 14px;
            font-weight: 500;
        }

        .parrafo-1-info-general span {
            font-size: 16px;
            line-height: 1.3;
            font-weight: 600;
            color: #00a650;
        }

        .parrafo-1-info-general {
            font-size: 16px;
            line-height: 1.3;
            color: rgba(0, 0, 0, .9);
        }

        .parrafo-2-info-general {
            color: rgba(0, 0, 0, .55);
            font-weight: 400;
            font-size: 14px;
        }

        .parrafo-3-info-general {
            color: #3483fa;
            font-size: 14px;
            font-weight: 500;
        }

        .info-stock .info-stock-p {
            color: rgba(0, 0, 0, .9);
            font-size: 16px;
            font-weight: 500;
        }

        .cantidad-option .cantidad {
            font-size: 16px;
        }

        .cantidad-option .select-unidad {
            font-size: 16px;
            border: none;
            outline: none;
            color: rgba(0, 0, 0, .9);
            font-size: 16px;
            font-weight: 600;
        }

        .cantidad-option .unidad {
            color: rgba(0, 0, 0, .55);
            font-size: 14px;
            font-weight: 400;
            margin-left: 5px;
        }

        .style-button-compra {
            background-color: #3483fa;
            border-radius: 5px;
            border: none;
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            padding: 12px 24px;
            margin: 20px 5px 5px 5px;
        }

        .style-button-carrito {
            background-color: rgba(65, 137, 230, .15);
            border-color: transparent;
            color: #3483fa;
            border-radius: 5px;
            border: none;
            font-size: 16px;
            font-weight: 600;
            padding: 12px 24px;
            margin: 5px 5px 5px 5px;
        }

        .info-general-vendedor {
            color: #3483fa;
            margin-left: 2px;
            font-weight: 600;
        }

        .subtitle-vendedor {
            font-weight: 800;
            margin-left: 2px;
        }

        .info-cliente-1 .info-cliente-1-span {
            color: #3483fa;
            font-weight: 600;
        }

        .info-cliente-1 i {
            font-weight: 400;
        }

        .info-general-cliente {
            color: rgba(0, 0, 0, .55);
        }

        .info-cliente-1-span {
            color: #3483fa;
            font-weight: 600;
        }

        /* CARRITO */
        .card-container {
            gap: 32px;
            margin: 30px 50px 50px 50px;
        }

        .style-principla-words {
            margin: 5px 24px;
        }

        .style-words {
            fill: #3483fa;
            align-items: center;
            color: #3483fa;
            cursor: pointer;
            display: inline-flex;
            font-family: Proxima Nova, -apple-system, Roboto, Arial, sans-serif;
            font-size: 14px;
            font-weight: 600;
            position: relative;
            text-decoration: none;
            transition: .15s ease-in-out;
            margin: 1px 12px 1px 0px;
        }

        .botton-increm {
            border: 1px solid rgba(0, 0, 0, .1);
            border-radius: 5px;
        }

        .botton-increm-input {
            margin: 0px 12px 0px 12px;
        }

        .text-meli-carrito {
            color: #00a650;
            font-weight: 500;
            font-size: 18px;
        }

        /* CATEGORIA */
        .nombre-item {
            transition: color 0.3s ease;
        }

        .nombre-item:hover {
            color: #3483fa !important;
            cursor: pointer;
        }

        /* CARGANDO */
        .lds-roller {
            display: inline-block;
            position: relative;
            width: 80px;
            height: 80px;
        }

        .lds-roller div {
            animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
            transform-origin: 40px 40px;
        }

        .lds-roller div:after {
            content: " ";
            display: block;
            position: absolute;
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #00a650;
            margin: -4px 0 0 -4px;
        }

        .lds-roller div:nth-child(1) {
            animation-delay: -0.036s;
        }

        .lds-roller div:nth-child(1):after {
            top: 63px;
            left: 63px;
        }

        .lds-roller div:nth-child(2) {
            animation-delay: -0.072s;
        }

        .lds-roller div:nth-child(2):after {
            top: 68px;
            left: 56px;
        }

        .lds-roller div:nth-child(3) {
            animation-delay: -0.108s;
        }

        .lds-roller div:nth-child(3):after {
            top: 71px;
            left: 48px;
        }

        .lds-roller div:nth-child(4) {
            animation-delay: -0.144s;
        }

        .lds-roller div:nth-child(4):after {
            top: 72px;
            left: 40px;
        }

        .lds-roller div:nth-child(5) {
            animation-delay: -0.18s;
        }

        .lds-roller div:nth-child(5):after {
            top: 71px;
            left: 32px;
        }

        .lds-roller div:nth-child(6) {
            animation-delay: -0.216s;
        }

        .lds-roller div:nth-child(6):after {
            top: 68px;
            left: 24px;
        }

        .lds-roller div:nth-child(7) {
            animation-delay: -0.252s;
        }

        .lds-roller div:nth-child(7):after {
            top: 63px;
            left: 17px;
        }

        .lds-roller div:nth-child(8) {
            animation-delay: -0.288s;
        }

        .lds-roller div:nth-child(8):after {
            top: 56px;
            left: 12px;
        }

        @keyframes lds-roller {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
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
