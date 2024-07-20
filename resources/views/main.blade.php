<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <x-title />
    <!-- CSS files -->
    <link href="{{ asset('/public/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/public/css/demo.min.css') }}" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="{{ asset('public/img/icon-app.svg') }}">
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('/public/css/tabler-icon/tabler-icons.min.css') }}">

    <link href="{{ asset('public/css/select2/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.7.1/jquery.contextMenu.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="{{ asset('/public/js/swetalert/sweetalert2@11.js') }}"></script>
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
            font-size: 12px;
        }

        .ti {
            font-size: medium;
        }

        .table {
            vertical-align: middle;
            font-size: 10px;
        }

        .table .btn-sm {
            font-size: 10px;
        }

        .form-label {
            font-size: 10px;
            margin-bottom: 0;
        }

        .form-control,
        .form-select {
            font-size: 10px;
            padding: .5rem;
        }

        .input-group-text {
            font-size: 10px;
        }

        textarea {
            resize: none;
        }

        .datepicker {
            font-size: 10px;
        }

        .modal {
            border-radius: 6px;
        }

        .accordion-button {
            padding-top: 10px;
            padding-bottom: 10px;
            font-size: 11px;
        }

        .dropdown-item {
            font-size: 11px;
        }

        .select2-selection__rendered {
            line-height: 35px !important;
        }



        .select2-container .select2-selection--single,
        .select2-container .select2-selection--multiple {
            height: 35px !important;
        }

        .select2-selection--multiple .select2-selection__rendered .select2-selection__choice {
            padding-left: 0px !important;
            height: 23px !important;
            vertical-align: top;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__display,
        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            cursor: default;
            /* padding-left: 2px; */
            /* padding-right: 5px; */
            position: relative;
            top: -8px;
        }

        .select2-selection__arrow {
            height: 35px !important;
        }

        .gigi_posterior {
            background: url({{ asset('public/img/gigi/posterior.png') }});
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }

        .gigi_anterior {
            background: url({{ asset('public/img/gigi/anterior.png') }});
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }

        .gigi {
            height: 40px !important;
            width: 40px !important;
            padding: 0;
            margin: 0;
            text-align: center;
        }

        .separator {
            font-size: 12px;
            color: #6e6e6e;
            display: flex;
            align-items: center;
            text-align: center;
        }

        .separator::before,
        .separator::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #ced4da;
        }

        .separator:not(:empty)::before {
            margin-right: .25em;
        }

        .separator:not(:empty)::after {
            margin-left: .25em;
        }

        .text-brand {
            transition: .2s linear;
        }

        .text-brand:hover {
            color: #c7c7c7;
        }

        .dataTables_scrollHeadInner {
            width: 100% !important;
        }

        table.table {
            width: 100% !important;
        }

        @media (min-width: 1440px) {
            .table {
                font-size: 12px;
            }

            .table .btn-sm {
                font-size: 12px;
            }

            .form-label {
                font-size: 11px;
            }

            .form-control,
            .form-select {
                font-size: 11px;
                padding: .5rem;
            }

            .input-group-text {
                font-size: 11px;
            }

            .datepicker {
                font-size: 12px;
            }
        }

        @media (max-width: 1024px) {
            .text-brand {
                display: none
            }
        }

        .dropzone {
            border: 1px solid rgb(227 214 214 / 80%) !important;
        }
    </style>
    <style>
        .offcanvas .navbar-collapse .dropdown-menu {
            padding: 0;
            background: 0 0;
            border: 1px solid #6e6e6e;
            position: static !important;
            color: inherit;
            box-shadow: none;
            border: none;
            min-width: 0;
            margin: 0 !important;
            transform: none !important;
            inset: none !inset;

        }

        .offcanvas .navbar-collapse .dropdown-menu .dropdown-item {
            min-width: 0;
            display: flex;
            width: auto;
            padding-left: calc(calc(calc(var(--tblr-page-padding) * 2)/ 2) + 0.5rem);
            color: inherit;
        }

        .offcanvas .navbar-collapse .dropdown-menu .dropdown-menu .dropdown-item {
            padding-left: calc(calc(calc(var(--tblr-page-padding)* 2) / 2) + 1.5rem);
        }
    </style>
    @stack('style')
</head>

<body class="layout-fluid">
    <script src="{{ asset('public/js/demo-theme.min.js') }}"></script>
    <div class="page-wrapper">
        @yield('contents')
    </div>
    <div class="offcanvas offcanvas-end offcanvas-dark w-25" tabindex="-1" id="otherMenu" aria-labelledby="otherMenuLabel" aria-modal="true" role="dialog">
        <div class="offcanvas-header">
            <h2 class="offcanvas-title" id="otherMenuLabel">Menu Lainnya</h2>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0">
            <div class="container-fluid">
                <div class="navbar-collapse" id="sidebar-menu">
                    <ul class="navbar-nav pt-lg-3">
                        <li class="nav-item">
                            <a class="nav-link" href="./">
                                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M5 12l-2 0l9 -9l9 9l-2 0"></path>
                                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Home
                                </span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">
                                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5"></path>
                                        <path d="M12 12l8 -4.5"></path>
                                        <path d="M12 12l0 9"></path>
                                        <path d="M12 12l-8 -4.5"></path>
                                        <path d="M16 5.25l-8 4.5"></path>
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Penunjang Medis
                                </span>
                            </a>
                            <div class="dropdown-menu">
                                <div class="dropdown-menu-columns">
                                    <div class="dropdown-menu-column">
                                        <a class="dropdown-item" href="#">
                                            Obat & BHP
                                        </a>
                                        <div class="dropend">
                                            <a class="dropdown-item dropdown-toggle" href="#sidebar-authentication" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">
                                                Laboratorium
                                            </a>
                                            <div class="dropdown-menu">
                                                <a href="#" class="dropdown-item">
                                                    Permintaan Lab PK
                                                </a>
                                                <a href="#" class="dropdown-item">
                                                    Pemeriksaan PK
                                                </a>
                                            </div>
                                        </div>
                                        <a class="dropdown-item" href="#">
                                            Radiologi
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">
                                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5"></path>
                                        <path d="M12 12l8 -4.5"></path>
                                        <path d="M12 12l0 9"></path>
                                        <path d="M12 12l-8 -4.5"></path>
                                        <path d="M16 5.25l-8 4.5"></path>
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Interface
                                </span>
                            </a>
                            <div class="dropdown-menu">
                                <div class="dropdown-menu-columns">
                                    <div class="dropdown-menu-column">
                                        <a class="dropdown-item" href="./alerts.html">
                                            Alerts
                                        </a>
                                        <a class="dropdown-item" href="./accordion.html">
                                            Accordion
                                        </a>
                                        <div class="dropend">
                                            <a class="dropdown-item dropdown-toggle" href="#sidebar-authentication" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">
                                                Authentication
                                            </a>
                                            <div class="dropdown-menu">
                                                <a href="./sign-in.html" class="dropdown-item">
                                                    Sign in
                                                </a>
                                                <a href="./sign-in-link.html" class="dropdown-item">
                                                    Sign in link
                                                </a>
                                                <a href="./sign-in-illustration.html" class="dropdown-item">
                                                    Sign in with illustration
                                                </a>
                                                <a href="./sign-in-cover.html" class="dropdown-item">
                                                    Sign in with cover
                                                </a>
                                                <a href="./sign-up.html" class="dropdown-item">
                                                    Sign up
                                                </a>
                                                <a href="./forgot-password.html" class="dropdown-item">
                                                    Forgot password
                                                </a>
                                                <a href="./terms-of-service.html" class="dropdown-item">
                                                    Terms of service
                                                </a>
                                                <a href="./auth-lock.html" class="dropdown-item">
                                                    Lock screen
                                                </a>
                                                <a href="./2-step-verification.html" class="dropdown-item">
                                                    2 step verification
                                                </a>
                                                <a href="./2-step-verification-code.html" class="dropdown-item">
                                                    2 step verification code
                                                </a>
                                            </div>
                                        </div>
                                        <a class="dropdown-item" href="./blank.html">
                                            Blank page
                                        </a>
                                        <a class="dropdown-item" href="./badges.html">
                                            Badges
                                            <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                        </a>
                                        <a class="dropdown-item" href="./buttons.html">
                                            Buttons
                                        </a>
                                        <div class="dropend">
                                            <a class="dropdown-item dropdown-toggle" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">
                                                Cards
                                                <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a href="./cards.html" class="dropdown-item">
                                                    Sample cards
                                                </a>
                                                <a href="./card-actions.html" class="dropdown-item">
                                                    Card actions
                                                    <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                                </a>
                                                <a href="./cards-masonry.html" class="dropdown-item">
                                                    Cards Masonry
                                                </a>
                                            </div>
                                        </div>
                                        <a class="dropdown-item" href="./carousel.html">
                                            Carousel
                                            <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                        </a>
                                        <a class="dropdown-item" href="./charts.html">
                                            Charts
                                        </a>
                                        <a class="dropdown-item" href="./colors.html">
                                            Colors
                                        </a>
                                        <a class="dropdown-item" href="./colorpicker.html">
                                            Color picker
                                            <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                        </a>
                                        <a class="dropdown-item" href="./datagrid.html">
                                            Data grid
                                            <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                        </a>
                                        <a class="dropdown-item" href="./datatables.html">
                                            Datatables
                                            <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                        </a>
                                        <a class="dropdown-item" href="./dropdowns.html">
                                            Dropdowns
                                        </a>
                                        <a class="dropdown-item" href="./dropzone.html">
                                            Dropzone
                                            <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                        </a>
                                        <div class="dropend">
                                            <a class="dropdown-item dropdown-toggle" href="#sidebar-error" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">
                                                Error pages
                                            </a>
                                            <div class="dropdown-menu">
                                                <a href="./error-404.html" class="dropdown-item">
                                                    404 page
                                                </a>
                                                <a href="./error-500.html" class="dropdown-item">
                                                    500 page
                                                </a>
                                                <a href="./error-maintenance.html" class="dropdown-item">
                                                    Maintenance page
                                                </a>
                                            </div>
                                        </div>
                                        <a class="dropdown-item" href="./flags.html">
                                            Flags
                                            <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                        </a>
                                        <a class="dropdown-item" href="./inline-player.html">
                                            Inline player
                                            <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                        </a>
                                        <a class="dropdown-item" href="./lightbox.html">
                                            Lightbox
                                            <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                        </a>
                                    </div>
                                    <div class="dropdown-menu-column">
                                        <a class="dropdown-item" href="./lists.html">
                                            Lists
                                        </a>
                                        <a class="dropdown-item" href="./modals.html">
                                            Modal
                                        </a>
                                        <a class="dropdown-item" href="./maps.html">
                                            Map
                                        </a>
                                        <a class="dropdown-item" href="./map-fullsize.html">
                                            Map fullsize
                                        </a>
                                        <a class="dropdown-item" href="./maps-vector.html">
                                            Map vector
                                            <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                        </a>
                                        <a class="dropdown-item" href="./markdown.html">
                                            Markdown
                                        </a>
                                        <a class="dropdown-item" href="./navigation.html">
                                            Navigation
                                        </a>
                                        <a class="dropdown-item" href="./offcanvas.html">
                                            Offcanvas
                                        </a>
                                        <a class="dropdown-item" href="./pagination.html">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/pie-chart -->
                                            Pagination
                                        </a>
                                        <a class="dropdown-item" href="./placeholder.html">
                                            Placeholder
                                        </a>
                                        <a class="dropdown-item" href="./steps.html">
                                            Steps
                                            <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                        </a>
                                        <a class="dropdown-item" href="./stars-rating.html">
                                            Stars rating
                                            <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                        </a>
                                        <a class="dropdown-item" href="./tabs.html">
                                            Tabs
                                        </a>
                                        <a class="dropdown-item" href="./tags.html">
                                            Tags
                                        </a>
                                        <a class="dropdown-item" href="./tables.html">
                                            Tables
                                        </a>
                                        <a class="dropdown-item" href="./toasts.html">
                                            Toasts
                                        </a>
                                        <a class="dropdown-item" href="./typography.html">
                                            Typography
                                        </a>
                                        <a class="dropdown-item" href="./tinymce.html">
                                            TinyMCE
                                            <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./form-elements.html">
                                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M9 11l3 3l8 -8"></path>
                                        <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9"></path>
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Forms
                                </span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">
                                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path>
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Extra
                                </span>
                            </a>
                            <div class="dropdown-menu">
                                <div class="dropdown-menu-columns">
                                    <div class="dropdown-menu-column">
                                        <a class="dropdown-item" href="./empty.html">
                                            Empty page
                                        </a>
                                        <a class="dropdown-item" href="./cookie-banner.html">
                                            Cookie banner
                                            <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                        </a>
                                        <a class="dropdown-item" href="./chat.html">
                                            Chat
                                            <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                        </a>
                                        <a class="dropdown-item" href="./activity.html">
                                            Activity
                                        </a>
                                        <a class="dropdown-item" href="./gallery.html">
                                            Gallery
                                        </a>
                                        <a class="dropdown-item" href="./invoice.html">
                                            Invoice
                                        </a>
                                        <a class="dropdown-item" href="./search-results.html">
                                            Search results
                                        </a>
                                        <a class="dropdown-item" href="./pricing.html">
                                            Pricing cards
                                        </a>
                                        <a class="dropdown-item" href="./pricing-table.html">
                                            Pricing table
                                        </a>
                                        <a class="dropdown-item" href="./faq.html">
                                            FAQ
                                            <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                        </a>
                                        <a class="dropdown-item" href="./users.html">
                                            Users
                                        </a>
                                        <a class="dropdown-item" href="./license.html">
                                            License
                                        </a>
                                    </div>
                                    <div class="dropdown-menu-column">
                                        <a class="dropdown-item" href="./logs.html">
                                            Logs
                                            <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                        </a>
                                        <a class="dropdown-item" href="./music.html">
                                            Music
                                        </a>
                                        <a class="dropdown-item" href="./photogrid.html">
                                            Photogrid
                                            <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                        </a>
                                        <a class="dropdown-item" href="./tasks.html">
                                            Tasks
                                            <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                        </a>
                                        <a class="dropdown-item" href="./uptime.html">
                                            Uptime monitor
                                        </a>
                                        <a class="dropdown-item" href="./widgets.html">
                                            Widgets
                                        </a>
                                        <a class="dropdown-item" href="./wizard.html">
                                            Wizard
                                        </a>
                                        <a class="dropdown-item" href="./settings.html">
                                            Settings
                                            <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                        </a>
                                        <a class="dropdown-item" href="./trial-ended.html">
                                            Trial ended
                                            <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                        </a>
                                        <a class="dropdown-item" href="./job-listing.html">
                                            Job listing
                                            <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                        </a>
                                        <a class="dropdown-item" href="./page-loader.html">
                                            Page loader
                                            <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item active dropdown">
                            <a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">
                                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/layout-2 -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 4m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v1a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
                                        <path d="M4 13m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
                                        <path d="M14 4m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
                                        <path d="M14 15m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v1a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Layout
                                </span>
                            </a>
                            <div class="dropdown-menu">
                                <div class="dropdown-menu-columns">
                                    <div class="dropdown-menu-column">
                                        <a class="dropdown-item" href="./layout-horizontal.html">
                                            Horizontal
                                        </a>
                                        <a class="dropdown-item" href="./layout-boxed.html">
                                            Boxed
                                            <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                        </a>
                                        <a class="dropdown-item" href="./layout-vertical.html">
                                            Vertical
                                        </a>
                                        <a class="dropdown-item" href="./layout-vertical-transparent.html">
                                            Vertical transparent
                                        </a>
                                        <a class="dropdown-item active" href="./layout-vertical-right.html">
                                            Right vertical
                                        </a>
                                        <a class="dropdown-item" href="./layout-condensed.html">
                                            Condensed
                                        </a>
                                        <a class="dropdown-item" href="./layout-combo.html">
                                            Combined
                                        </a>
                                    </div>
                                    <div class="dropdown-menu-column">
                                        <a class="dropdown-item" href="./layout-navbar-dark.html">
                                            Navbar dark
                                        </a>
                                        <a class="dropdown-item" href="./layout-navbar-sticky.html">
                                            Navbar sticky
                                        </a>
                                        <a class="dropdown-item" href="./layout-navbar-overlap.html">
                                            Navbar overlap
                                        </a>
                                        <a class="dropdown-item" href="./layout-rtl.html">
                                            RTL mode
                                        </a>
                                        <a class="dropdown-item" href="./layout-fluid.html">
                                            Fluid
                                        </a>
                                        <a class="dropdown-item" href="./layout-fluid-vertical.html">
                                            Fluid vertical
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./icons.html">
                                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/ghost -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M5 11a7 7 0 0 1 14 0v7a1.78 1.78 0 0 1 -3.1 1.4a1.65 1.65 0 0 0 -2.6 0a1.65 1.65 0 0 1 -2.6 0a1.65 1.65 0 0 0 -2.6 0a1.78 1.78 0 0 1 -3.1 -1.4v-7"></path>
                                        <path d="M10 10l.01 0"></path>
                                        <path d="M14 10l.01 0"></path>
                                        <path d="M10 14a3.5 3.5 0 0 0 4 0"></path>
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    5361 icons
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./emails.html">
                                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/mail-opened -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M3 9l9 6l9 -6l-9 -6l-9 6"></path>
                                        <path d="M21 9v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10"></path>
                                        <path d="M3 19l6 -6"></path>
                                        <path d="M15 13l6 6"></path>
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Emails
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./illustrations.html">
                                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/brand-figma -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M15 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                        <path d="M6 3m0 3a3 3 0 0 1 3 -3h6a3 3 0 0 1 3 3v0a3 3 0 0 1 -3 3h-6a3 3 0 0 1 -3 -3z"></path>
                                        <path d="M9 9a3 3 0 0 0 0 6h3m-3 0a3 3 0 1 0 3 3v-15"></path>
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Illustrations
                                </span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">
                                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/lifebuoy -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                        <path d="M15 15l3.35 3.35"></path>
                                        <path d="M9 15l-3.35 3.35"></path>
                                        <path d="M5.65 5.65l3.35 3.35"></path>
                                        <path d="M18.35 5.65l-3.35 3.35"></path>
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Help
                                </span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="https://tabler.io/docs" target="_blank" rel="noopener">
                                    Documentation
                                </a>
                                <a class="dropdown-item" href="./changelog.html">
                                    Changelog
                                </a>
                                <a class="dropdown-item" href="https://github.com/tabler/tabler" target="_blank" rel="noopener">
                                    Source code
                                </a>
                                <a class="dropdown-item text-pink" href="https://github.com/sponsors/codecalm" target="_blank" rel="noopener">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-inline me-1">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"></path>
                                    </svg>
                                    Sponsor project!
                                </a>
                            </div>
                        </li> --}}
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/4.3.0/js/dataTables.fixedColumns.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('public/js/select2/select2.min.js') }}"></script>
    <script src="{{ asset('public/js/demo.min.js') }}" defer></script>
    <script src="{{ asset('public/js/tabler.min.js') }}" defer></script>
    <script src="{{ asset('public/js/utility.js') }}" defer></script>
    <script src="{{ asset('public/libs/tinymce/tinymce.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.7.1/jquery.contextMenu.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.7.1/jquery.ui.position.js"></script>
    <script>
        //Script main
        let tanggal = "{{ date('d-m-Y') }}"
        let url = "{{ url('') }}"
        let tglAwal = localStorage.getItem('tglAwal') ? localStorage.getItem('tglAwal') : tanggal;
        let tglAkhir = localStorage.getItem('tglAkhir') ? localStorage.getItem('tglAkhir') : tanggal;

        (function(factory) {
            typeof define === 'function' && define.amd ? define(factory) :
                factory();
        })((function() {
            'use strict';

            const themeStorageKey = "tablerTheme";
            const defaultTheme = "light";
            let selectedTheme;
            const params = new Proxy(new URLSearchParams(window.location.search), {
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
        $(document).ready(() => {
            var tanggal = "{{ date('d-m-Y') }}";

            var tglAwal = localStorage.getItem('tglAwal') ? localStorage.getItem('tglAwal') : tanggal;
            var tglAkhir = localStorage.getItem('tglAkhir') ? localStorage.getItem('tglAkhir') : tanggal;

            $('#tglAwal').val(tglAwal)
            $('#tglAkhir').val(tglAkhir)

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.filterTangal').datepicker({
                format: 'dd-mm-yyyy',
                autoclose: true,
                todayBtn: true,
                todayHighlight: true,
                language: "id",
            });

            $('.filterTahun').datepicker({
                dateFormat: "yyyy",
                viewMode: "years",
                minViewMode: "years",

            }).on('changeDate', function(e) {
                var selectedYear = e.date.getFullYear();
                $(this).val(selectedYear)
            }).on('hide', function(e) {
                var selectedYear = $(this).datepicker('getDate').getFullYear();
                $(this).val(selectedYear); // Set input value to the selected year
            });
        })

        function switcTab(tabElement, target = '') {
            $('.nav-link').removeClass('active');
            $('.tab-pane').removeClass('show active');

            if (target) {
                const element = tabElement.find(`a[href="#${target}"]`)
                $(element).addClass('active')
                $(target).addClass('show active');
            } else {
                tabElement.find('a').each((index, element) => {
                    if (index === 0) {
                        const target = $(element).attr('href')
                        $(element).addClass('active')
                        $(target).addClass('show active');
                    }
                })
            }

        }

        function setStatusLayan(no_rawat, status) {
            return $.post(`${url}/registrasi/update/status`, {
                stts: status,
                no_rawat: no_rawat
            }).done(() => {
                if ($('#tabelRegistrasi').length > 0) {
                    loadTabelRegistrasi(tglAwal, tglAkhir, selectFilterStts.val(), selectFilterDokter.val())
                }
            }).fail((error, status, code) => {
                if (error.status !== 500) {
                    const errorMessage = {
                        status: error.status,
                        statusText: code,
                        responseJSON: error.responseJSON.message,
                    }
                    alertErrorAjax(errorMessage)

                } else {
                    alertErrorAjax(error)
                }
            });
        }

        function getRegDetail(no_rawat) {
            const registrasi = $.get(`${url}/registrasi/get/detail`, {
                no_rawat: no_rawat,
            })
            return registrasi;
        }

        function getRegPeriksa(...params) {
            const registrasi = $.get(`${url}/registrasi/get`, params)
            return registrasi;
        }

        function createAlergi(data) {
            const alergi = $.post(`${url}/pasien/alergi`, {
                no_rkm_medis: data.no_rkm_medis,
                alergi: data.alergi
            });
            return alergi;
        }

        function getPemeriksaanRalan(no_rawat, nip = '') {
            return $.get(`${url}/pemeriksaan/ralan/show`, {
                no_rawat: no_rawat,
                nip: nip
            })
        }

        function riwayatIcare(no_peserta) {
            loadingAjax();
            $.get(`${url}/icare`, {
                no_peserta: no_peserta,
            }).done((response) => {
                if (response.metaData.code === 200) {
                    loadingAjax().close();
                    window.open(response.response.url, 'Riwayat Perawatan Icare', "width=" + screen.availWidth + ",height=" + screen.availHeight)
                } else {
                    Swal.fire(
                        'Peringatan',
                        response.metaData.message,
                        'warning'
                    )
                }
            })
        }
    </script>
    @stack('script')
</body>

</html>
