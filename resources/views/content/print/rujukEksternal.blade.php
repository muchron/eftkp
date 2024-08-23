@extends('content.print.main')
@php
    Carbon\Carbon::setLocale('id');
@endphp
@section('content')
    <div class="container" style="margin: 20px">
        <div width="100%">
            <img src="{{ 'data:image/jpeg;base64,' . base64_encode($setting['logo']) }}" alt="" width="60px" style="top:20px;left: 25px;position:absolute">
            <div style="text-align: center; margin-left:60px;">
                <p class="m-0" style="font-size: 20px;font-weight: bold">{{ $setting['nama_instansi'] }}</p>
                <p class="m-0" style="font-size: 11px">{{ $setting['alamat_instansi'] }} <br />Telp. {{ $setting['kontak'] }}, Email : {{ $setting['email'] }} </p>
            </div>
            <hr>
        </div>
        <div class="no_surat" style="text-align: center">
            <p class="mb-0" style="font-size: 20px;font-weight: bold"><u>SURAT RUJUK KELUAR</u></p>
            <p>No. {{ $data['no_rujuk'] }}</p>
        </div>
        <div class="mb-2">
            <p class="mb-0">Kepada Yth. <br /> <strong>{{ $data['rujuk_ke'] }}</strong></p>
            <p class="mb-0">di Tempat</p>
        </div>
        <p class="mb-2" style="text-align: justify">Bersama ini kami beritahukan bahwa kami telah melakukan perawatan/pemeriksaan pasien berikut ini. Mohon pemeriksaan dan penanganan lebih lanjut :</p>
        <table class="table" width="100%">
            <tr>
                <td width="20%">Nama</td>
                <td width="2%">:</td>
                <td style="text-align: justify">{{ $data['pasien']['nm_pasien'] }} / {{ $data['reg_periksa']['umurdaftar'] }} {{ $data['reg_periksa']['sttsumur'] }}</td>
            </tr>
            <tr>
                <td width="20%">Alamat</td>
                <td width="2%">:</td>
                <td style="text-align: justify">{{ $data['pasien']['alamat'] }}, {{ $data['pasien']['kel']['nm_kel'] }}, Kec. {{ $data['pasien']['kec']['nm_kec'] }}, Kab. {{ $data['pasien']['kab']['nm_kab'] }}</td>
            </tr>
            <tr>
                <td width="20%">Diagnosa</td>
                <td width="2%">:</td>
                <td style="text-align: justify">{{ $data['keterangan_diagnosa'] }}</td>
            </tr>
            <tr>
                <td width="20%">Terapi</td>
                <td width="2%">:</td>
                <td style="text-align: justify">{{ $data['pemeriksaan'] ? str_replace('RESEP : ', '', $data['pemeriksaan']['rtl']) : '-' }}</td>
            </tr>
        </table>
        <p class="mt-2" style="text-align: justify">Demikian surat ini kami buat dan digunakan sebagaimana mestinya, Terimakasih </p>

        <div style="margin-top:20px;text-align: center;left:0px">
            <p class="m-0">{{ $setting['kabupaten'] }}, {{ Carbon\Carbon::parse($data['tgl_rujuk'])->translatedFormat('d F Y') }}</p>
            <p style="margin-bottom:75px">Ttd. Dokter</p>
            <img style="position: absolute;top:465px;right:240px" src="data:image/png;base64,{{ DNS2D::getBarcodePNG('Ditandatangani oleh ' . $data['dokter']['nm_dokter'] . ' pada ' . $data['tgl_rujuk'] . ' ' . $data['jam'], 'QRCODE') }}" height="70" width="70" />
            <p class="m-0"><u>{{ $data['dokter']['nm_dokter'] }}</u></p>
            <p class="m-0">SIP : {{ $data['dokter']['no_ijn_praktek'] }}</p>
        </div>

    </div>
@endsection
