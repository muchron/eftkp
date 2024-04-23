<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('APP_NAME') }}
        @if (count(Request::segments()))
            ::
            @for ($i = 1; $i <= count(Request::segments()); $i++)
                {{ ucfirst(Request::segment($i)) }}
                @if (($i < count(Request::segments())) & ($i >= 1))
                    -
                @endif
            @endfor
        @else
            :: {{ $data->nama_instansi }}
        @endif
    </title>
    <!-- CSS files -->
    <link href="{{ asset('/public/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/public/css/demo.min.css') }}" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="{{ asset('public/img/icon-app.svg') }}">
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.7.1/jquery.contextMenu.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

        @media (min-width: 1920px) {
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

        .dropzone {
            border: 1px solid rgb(227 214 214 / 80%) !important;
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
    <script src="https://cdn.datatables.net/fixedcolumns/4.3.0/js/dataTables.fixedColumns.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
    </script>
    @stack('script')
</body>

</html>
