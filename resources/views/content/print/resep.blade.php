@extends('content.print.main')

@section('content')
    {{-- {{ $setting->logo }} --}}

    <div width="100%" style="">
        <img src="{{ 'data:image/jpeg;base64,' . base64_encode($setting->logo) }}" alt="" width="50px" style="left: 10px;position:absolute">
        <div style="text-align: center; margin-left:50px">
            <p style="margin-bottom: 0px;font-size:12px;font-weight: bold">{{ $setting->nama_instansi }}</p>
            <p style="font-size: 9px">{{ $setting->alamat_instansi }}, {{ $setting->kabupaten }},{{ $setting->propinsi }}</p>
            <p style="font-size: 9px">Telp. {{ $setting->kontak }}, Email : {{ $setting->email }} </p>
        </div>
        <hr>
        <div class="info" style="font-size: 11px;margin-bottom:10px">
            <table class="" width="100%" style="border-spacing: 0px;font-size:9px">
                <tr>
                    <td width="25%">
                        Nama/JK
                    </td>
                    <td width="2%">
                        :
                    </td>
                    <td width="75%">
                        {{ $data->regPeriksa->pasien->nm_pasien }} ({{ $data->regPeriksa->pasien->jk }}) - {{ $data->regPeriksa->penjab->png_jawab }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Tgl. Lahir/Umur
                    </td>
                    <td>
                        :
                    </td>
                    <td>
                        {{ date('d-m-Y', strtotime($data->regPeriksa->pasien->tgl_lahir)) }} ({{ $data->regPeriksa->umurdaftar }} {{ $data->regPeriksa->sttsumur }})
                    </td>
                </tr>
                <tr>
                    <td>
                        Alamat
                    </td>
                    <td>
                        :
                    </td>
                    <td>

                        {{ $data->regPeriksa->pasien->alamat }}, {{ $data->regPeriksa->pasien->kel->nm_kel }}, {{ $data->regPeriksa->pasien->kec->nm_kec }}
                    </td>
                </tr>
                <tr>
                    <td>
                        No Resep
                    </td>
                    <td>
                        :
                    </td>
                    <td>
                        {{ $data->no_resep }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Tgl. Resep
                    </td>
                    <td>
                        :
                    </td>
                    <td>
                        {{ date('d-m-Y', strtotime($data->tgl_peresepan)) }} {{ $data->jam_peresepan }}
                    </td>
                </tr>
            </table>

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
                                {{ $rr->aturan_pakai }}
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
            <p style="margin-bottom:75px">Ttd. Dokter</p>
            <p><u>{{ $data->dokter->nm_dokter }}</u></p>
            <p>SIP : {{ $data->dokter->no_ijn_praktek }}</p>
        </div>
    </div>
@endsection
