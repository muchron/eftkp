@extends('layout')

@section('body')
    <div class="container-xl h-100">
        {{-- <div class="row"> --}}
        {{-- <div class="col-lg-12 col-md-12 col-sm-12"> --}}
        @include('content.registrasi._tabelRegistrasi')
        {{-- </div> --}}
        {{-- </div> --}}
    </div>
    @include('content.registrasi._modalRujukanInternal')
    @include('content.registrasi._modalRujukanEksternal')
    @include('content.registrasi._modalSuratSakit')
    @include('content.registrasi._modalSuratSehat')
    @include('content.registrasi._modalObatPcare')
    @include('content.pemeriksaan.modal.penilaianAwal._modalPenilaianAwal')
    @include('content.pemeriksaan.modal.penilaianAwal._modalSkriningJatuh')
    @include('content.registrasi._modalRiwayat')
@endsection
@push('script')
    <script>
        //Script Reistrasi
        let selectStatusLayan = formFilterRegistrasi.find('select[name="stts"'); //get data from selection filter stts
        $(document).ready(() => {
            $('#tglAwal').val(tglAwal)
            $('#tglAkhir').val(tglAkhir)
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        })

        function setStatusLayan(no_rawat, status) {
            return $.post(`${url}/registrasi/update`, {
                stts: status,
                no_rawat: no_rawat
            }).done(() => {
                loadTabelRegistrasi(tglAwal, tglAkhir, selectFilterStts.val(), selectFilterDokter.val())
            });
        }

    </script>
@endpush
