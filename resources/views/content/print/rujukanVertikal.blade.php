@extends('content.print.main')

@section('content')
    <div width="100%" style="font-size: 12px">
        <table width="100%">
            <tr>
                <td width="60%" style="padding-right: 10px">
                    <img src="{{ asset('/public/img/logo-bpjs.png') }}" alt="" width="200px" style="margin-top:15px:top:0" />
                </td>
                <td width="40%">
                    <h3 style="margin-bottom:0px;margin-top:0px">Divisi Regional : {{ $data['detail']['nmKR'] }}</h3>
                    <h3 style="margin-bottom:0px;margin-top:0px">Kantor Cabang : {{ $data['detail']['nmKC'] }}</h3>
                </td>
            </tr>
        </table>
        <img style="position: absolute;top:90px;right:30px" src="data:image/png;base64,{{ DNS1D::getBarcodePNG($data['noKunjungan'], 'C39E') }}" height="35" width="200" />
        <h2 style="text-align:center">Rujukan FKTP</h2>
        <div style="border:1px solid; padding:10px">
            <div style="border:1px solid; padding:10px">
                <table>
                    <tr>
                        <td>No Rujukan</td>
                        <td>:</td>
                        <td>{{ $data['noKunjungan'] }}</td>
                    </tr>
                    <tr>
                        <td>Puskesmas/Dokter Keluarga</td>
                        <td>:</td>
                        <td>{{ $data['detail']['nmPpkAsal'] }}</td>
                    </tr>
                    <tr>
                        <td>Kabupaten/Kota</td>
                        <td>:</td>
                        <td>{{ $data['detail']['nmKC'] }}</td>
                    </tr>
                </table>
            </div>
            <table class="mt-2">
                <tr>
                    <td>Kepada Yth. Dokter </td>
                    <td>:</td>
                    <td>{{ $data['nmPoli'] }}</td>
                </tr>
                <tr>
                    <td>Di</td>
                    <td>:</td>
                    <td>{{ $data['nmPPK'] }}</td>
                </tr>
            </table>
            <p style="margin:10px">Mohon pemeriksaan dan penanganan lebih lanjut kepada pasien : </p>
            <table width="100%" class="table" style="vertical-align: top;">
                <tr>
                    <td width="10%">Nama </td>
                    <td width="2%">:</td>
                    <td width="50%">{{ $data['nm_pasien'] }} ({{ $data['pasien']['jk'] == 'L' ? 'Laki-laki' : 'Perempuan' }})</td>
                    <td width="10%">Umur</td>
                    <td width="2%">:</td>
                    <td width="20%">{{ $data['reg_periksa']['umurdaftar'] }} {{ $data['reg_periksa']['sttsumur'] }} / {{ date('d F Y', strtotime($data['pasien']['tgl_lahir'])) }}</td>
                </tr>
                <tr>
                    <td>No Kartu BPJS</td>
                    <td>:</td>
                    <td>{{ $data['noKartu'] }}</td>
                </tr>
                <tr>
                    <td>Diagnosa</td>
                    <td>:</td>
                    <td>{{ $data['kdDiag1'] }} - {{ $data['nmDiag1'] }}</td>
                </tr>
                <tr>
                    <td>Catatan</td>
                    <td>:</td>
                    <td style="vertical-align: bottom;">{{ $data['detail']['catatanRujuk'] }}</td>
                </tr>
            </table>
            <p style="margin:10px">Atas bantuannya, diucapkan terimakasih</p>
            <table>
                <tr>
                    <td>Tgl Renc. Kunjungan</td>
                    <td>:</td>
                    <td>{{ date('d-m-Y', strtotime($data['tglEstRujuk'])) }}</td>
                </tr>
                <tr>
                    <td>Tgl Akhir Rujukan</td>
                    <td>:</td>
                    <td>{{ date('d-m-Y', strtotime($data['detail']['tglAkhirRujuk'])) }}</td>
                </tr>
                <tr>
                    <td>Jadwal</td>
                    <td>:</td>
                    <td>{{ $data['detail']['jadwal'] }}</td>
                </tr>
            </table>
            <div class="text-end">
                <p class="mb-5">Salam Sejawat,{{ date('d/m/Y H:i:s') }}</p>
                <p class="mt-5"><b><u>{{ $data['nmDokter'] }}</u></b></p>
            </div>
            Info Denda : {{ $data['detail']['infoDenda'] }}
        </div>
    </div>
    {{-- @dd($data) --}}
    {{-- {{ print_r($data) }} --}}
@endsection
