<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ERM RSIA AISYIYAH PEKAJANGAN</title>
    <style>
        @page {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            margin-top: 10px;
            margin-right: 20px;
            margin-left: 20px;
            margin-bottom: 10px;
        }

        p {
            font-size: 11px;
            margin: 0px;
        }

        .table-print,
        .table-print tr {
            border: 1px solid #000;
            border-collapse: collapse;
            padding: 5px;
            vertical-align: top;
        }

        .borderless {
            border: none
        }

        .table-print td {
            padding: 5px;
            font-size: 11px;
        }

        .table-print th {
            text-align: left;
            font-size: 11px;
            padding: 5px;
        }

        .border {
            border: 1px solid #000;
            border-collapse: collapse;

        }

        .page-break {
            page-break-after: always;
        }
    </style>

</head>

<body>
    @yield('content')
</body>

</html>