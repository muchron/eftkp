<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EFKTP</title>
    <style>
        @page {
            /* font-family: 'Calibri', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; */
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            margin-top: 5px;
            margin-right: 5px;
            margin-left: 5px;
            margin-bottom: 5px;
        }

        p {
            font-size: 16px;
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
            font-size: 16px;
        }

        .table-print th {
            text-align: left;
            font-size: 16px;
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
