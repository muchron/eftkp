@extends('content.print.main')
@php
    Carbon\Carbon::setLocale('id');
@endphp
@section('content')
    <div width="100%" style="font-size: 12px; margin:15px">
        <table width="100%">
            <tr>
                <td>{{ $setting->nama_instansi }}</td>
                <td style="text-align: right">04/F/KPBG/2023</td>
            </tr>
        </table>
        <hr />
        <table width="100%" class="borderless">
            <tr>
                <td style="border: 1px solid;text-align:center">
                    <h5>
                        PENILAIAN AWAL KLINIS
                    </h5>
                </td>
                <td style="border: 1px solid">
                    <ul style="padding:10px;margin-bottom:0px;list-style-type: none;">
                        <li>Nama Pasien : {{ $data->regPeriksa->pasien->nm_pasien }}</li>
                        <li>Tanggal Lahir :{{ Carbon\Carbon::parse($data->regPeriksa->pasien->tgl_lahir)->translatedFormat('d F Y') }}</li>
                        <li>No. Rekam Medis: {{ $data->regPeriksa->no_rkm_medis }}</li>
                    </ul>
                </td>
            </tr>
        </table>

        {{-- <table width="100%" class="table-border" style="font-size: 12px">
            
        </table> --}}

        <div class="mt-2">
            <p class="mb-0 border p-2">Yang melakukan pengkajian : {{ $data->pegawai->nama }}</p>
            <p class="mb-0 border p-2">Tanggal Kunjungan : {{ Carbon\Carbon::parse($data->tanggal)->translatedFormat('d F Y H:i:s') }}</p>
            <p class="mb-0 border p-2">Keluhan : {{ $data->keluhan_utama }}</p>
            <p class="mb-0 border p-2"><b>Riyawat Psiko Sosial </b> <br> Hubungan pasien dengan anggota keluarga : {{ $data->hubungan }}</p>
        </div>

        <div style="margin-top:10px;text-align: center;left:0px;font-size:12px;">
            <p class="m-0">{{ Carbon\Carbon::parse($data->tanggal)->translatedFormat('d F Y') }}</p>
            <p class="m-0">Petugas</p>
            <p class="mt-5"><u>{{ $data->pegawai->nama }}</u></p>
            {{-- <p class="m-0">NIP : {{ $data->dokter->no_ijn_praktek }}</p> --}}
        </div>
        {{ print_r($data) }}
    </div>
@endsection
