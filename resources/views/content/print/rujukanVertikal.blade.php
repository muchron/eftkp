@extends('content.print.main')

@section('content')
    {{-- @dd($data) --}}
    <div width="100%" style="font-size: 11px">
        <table width="100%">
            <tr>
                <td width="60%" style="padding-right: 10px">
                    <img src="{{ asset('/public/img/logo-bpjs.png') }}" alt="" width="200px" style="margin-top:15px:top:0" />
                </td>
                <td width="40%">
                    <h3 style="margin-bottom:0px;margin-top:0px">Divisi Regional : {{ $data['nmKR'] }}</h3>
                    <h3 style="margin-bottom:0px;margin-top:0px">Kantor Cabang : {{ $data['nmKC'] }}</h3>
                </td>
            </tr>
        </table>
        <h2 style="text-align:center">Rujukan FKTP</h2>
        <div style="border:1px solid; padding:10px">
            <div style="border:1px solid; padding:10px">
                <table>
                    <tr>
                        <td>No Rujukan</td>
                        <td>:</td>
                        <td>{{ $data['noRujukan'] }}</td>
                    </tr>
                    <tr>
                        <td>Puskesmas/Dokter Keluarga</td>
                        <td>:</td>
                        <td>{{ $data['nmPpkAsal'] }}</td>
                    </tr>
                    <tr>
                        <td>Kabupaten/Kota</td>
                        <td>:</td>
                        <td>{{ $data['nmKC'] }}</td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
    {{-- @dd($data) --}}
    {{-- {{ print_r($data) }} --}}
@endsection
