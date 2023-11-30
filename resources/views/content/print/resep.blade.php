@extends('content.print.main')

@section('content')
    {{-- @dd($data->resepRacikan) --}}
    <div width="100%" style="font-size: 11px">

    </div>
    <div style="text-align: center">
        <h3 style="margin-bottom: 0px">{{ $setting->nama_instansi }}</h3>
        <p style="font-size: 11px">{{ $setting->alamat_instansi }}, {{ $setting->kabupaten }},{{ $setting->propinsi }}</p>
        <p style="font-size: 11px">Telp. {{ $setting->kontak }}, Email : {{ $setting->email }} </p>
        <hr>
    </div>
    <div class="info" style="font-size: 11px;margin-bottom:10px">
        <p>No. Resep : {{ $data->no_resep }}</p>
        <p>Tanggal : {{ \Carbon\Carbon::parse($data->tgl_peresepan)->translatedFormat('d F Y') }} {{ $data->jam_peresepan }}</p>
    </div>
    @if ($data->resepDokter)
        <table width="100%" class="table-print">
            <thead>
                <tr>
                    <th width="50%">
                        Obat
                    </th>
                    <th>
                        Jml
                    </th>
                    <th>
                        Aturan Pkai
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data->resepDokter as $rd)
                    <tr>
                        <td>
                            {{ $rd->obat->nama_brng }}
                        </td>
                        <td>
                            {{ $rd->jml }}
                        </td>
                        <td>
                            {{ $rd->aturan_pakai }}
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    @endif
    @if (count($data->resepRacikan))
        <table width="100%" class="table-print">
            <thead>
                <tr>
                    <th width="50%">
                        Racikan
                    </th>
                    <th>
                        Jml
                    </th>
                    <th>
                        Aturan Pkai
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data->resepRacikan as $rr)
                    <tr style="border:0!important;margin:0px">
                        <td>
                            {{ $rr->nama_racik }}
                        </td>
                        <td>
                            {{ $rr->jml_dr }} {{ $rr->metode->nm_racik }}
                        </td>
                        <td>
                            {{ $rd->aturan_pakai }}
                        </td>
                    </tr>
                    <tr style="border:0!important">
                        <td colspan="3">
                            <ul style="padding:10px;margin:0px">
                                @foreach ($rr->detail as $detail)
                                    <li>{{ $detail->obat->nama_brng }}, Dosis : {{ $detail->kandungan }} gr , Jumlah : {{ $detail->jml }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    @endif


    <div style="margin-top:10px;text-align: center;left:0px">
        <p style="margin-bottom:60px">Ttd. Dokter</p>
        <p><u>{{ $data->dokter->nm_dokter }}</u></p>
    </div>
    {{-- @foreach ($data as $d)
        
    @endforeach --}}
@endsection
