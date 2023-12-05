<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta19
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>EFKTP</title>
    <!-- CSS files -->
    <link href="{{ asset('public/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/css/demo.min.css') }}" rel="stylesheet" />

    <link href="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
            font-size: 12px;
        }

        .table {
            vertical-align: middle;
        }

        .form-label {
            font-size: 11px;
            margin-bottom: 0px;
        }

        .form-control,
        .form-select {
            font-size: 11px;
            padding: .5rem;
        }

        .input-group-text {
            font-size: 11px;
        }

        textarea {
            resize: none;
        }

        .datepicker {
            font-size: 10px;
        }

        .modal {
            border-radius: 6 6 6 6;
        }

        .accordion-button {
            padding-top: 10px;
            padding-bottom: 10px;
            font-size: 11px;
        }
    </style>
</head>

<body class="layout-fluid">
    <script src="{{ asset('public/js/demo-theme.min.js') }}"></script>
    @yield('navbars')
    <div class="page-wrapper">
        @yield('contents')
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('public/js/demo.min.js') }}" defer></script>
    <script src="{{ asset('public/js/tabler.min.js') }}" defer></script>
    <script src="{{ asset('public/js/utility.js') }}" defer></script>
    <script>
        (function(factory) {
            typeof define === 'function' && define.amd ? define(factory) :
                factory();
        })((function() {
            'use strict';

            var themeStorageKey = "tablerTheme";
            var defaultTheme = "light";
            var selectedTheme;
            var params = new Proxy(new URLSearchParams(window.location.search), {
                get: function get(searchParams, prop) {
                    return searchParams.get(prop);
                }
            });
            if (!!params.theme) {
                localStorage.setItem(themeStorageKey, params.theme);
                selectedTheme = params.theme;
            } else {
                var storedTheme = localStorage.getItem(themeStorageKey);
                selectedTheme = storedTheme ? storedTheme : defaultTheme;
            }
            if (selectedTheme === 'dark') {
                document.body.setAttribute("data-bs-theme", selectedTheme);
            } else {
                document.body.removeAttribute("data-bs-theme");
            }

        }));
    </script>
    @stack('script')
</body>

</html>
