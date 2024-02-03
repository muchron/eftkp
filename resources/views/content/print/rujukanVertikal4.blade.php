@extends('content.print.main')

@section('content')
    <div width="100%" style="font-size: 11px">
        <img src="{{ asset('/public/img/logo-bpjs.png') }}" alt="" width="200px" style="position: absolute;top:0px;right:40px" />
        <div class="text-center" style="margin-top:40px">
            <h3 style="margin-bottom:0px;margin-top:0px">Divisi Regional : {{ $data['detail']['nmKR'] }}</h3>
            <h3 style="margin-bottom:0px;margin-top:0px">Kantor Cabang : {{ $data['detail']['nmKC'] }}</h3>
        </div>
        <img style="position: absolute;top:95px;right:40px" src="data:image/png;base64,{{ DNS1D::getBarcodePNG($data['noKunjungan'], 'C39E') }}" height="35" width="200" />
        <h3 style="text-align:center">Rujukan FKTP</h3>
        <div style="border:1px solid; padding:10px;margin-top:55px;margin-bottom:10px">
            <table>
                <tr>
                    <td>No Rujukan</td>
                    <td>:</td>
                    <td>{{ $data['noKunjungan'] }}</td>
                </tr>
                <tr>
                    <td>Puskesmas/Klinik/Dokter</td>
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
        <table>
            <tr>
                <td>Kepada Yth. Dokter </td>
                <td>:</td>
                <td>{{ $data['nmSubSpesialis'] }}</td>
            </tr>
            <tr>
                <td colspan="3">Di {{ $data['nmPPK'] }}</td>
            </tr>
        </table>
        <p style="margin:10px">Mohon pemeriksaan dan penanganan lebih lanjut kepada pasien : </p>
        <table width="100%">
            <tr>
                <td>Nama </td>
                <td>:</td>
                <td>{{ $data['nm_pasien'] }} ({{ $data['pasien']['jk'] == 'L' ? 'Laki-laki' : 'Perempuan' }})</td>
            </tr>
            <tr>
                <td>Umur</td>
                <td>:</td>
                <td>{{ $data['reg_periksa']['umurdaftar'] }} {{ $data['reg_periksa']['sttsumur'] }} / {{ date('d F Y', strtotime($data['pasien']['tgl_lahir'])) }}</td>
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
        </table>
        <p style="margin:10px">Atas bantuannya, diucapkan terimakasih</p>
        <table width="100%">
            <tr>
                <td width="38%">Tgl Renc. Kunjungan</td>
                <td width="5%">:</td>
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
        <p>Info Denda : {{ $data['detail']['infoDenda'] }}</p>
        <div style="margin-top:20px;text-align: center;left:0px;font-size:12px;">
            <p style="margin-bottom:50">Salam Sejawat,{{ date('d/m/Y H:i:s') }}</p>
            <p><b><u>{{ $data['nmDokter'] }}</u></b></p>
        </div>
    </div>
    {{-- @dd($data) --}}
    {{-- {{ print_r($data) }} --}}
@endsection
