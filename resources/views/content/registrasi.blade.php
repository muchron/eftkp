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
    @include('content.registrasi._modalSuratSakit')
    @include('content.registrasi._modalSuratSehat')
    @include('content.pemeriksaan.modal.penilaianAwal._modalPenilaianAwal')
    @include('content.pemeriksaan.modal.penilaianAwal._modalSkriningJatuh')
@endsection
@push('script')
    <script>
        var modalRujukanInternal = $('#modalRujukanInternal');
        var formRujukInternalPoli = $('#formRujukanInternalPoli');
        $(document).ready(() => {

            var tanggal = "{{ date('Y-m-d') }}";
            var tglAwal = localStorage.getItem('tglAwal') ? localStorage.getItem('tglAwal') : tanggal;
            var tglAkhir = localStorage.getItem('tglAkhir') ? localStorage.getItem('tglAkhir') : tanggal;

            $('#tglAwal').val(splitTanggal(tglAwal))
            $('#tglAkhir').val(splitTanggal(tglAkhir))

            loadTabelRegistrasi(tglAwal, tglAkhir)
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.filterTangal').datepicker({
                format: 'dd-mm-yyyy',
                autoclose: true,
                todayBtn: true,
                todayHighlight: true,
                language: "id",
            });
        })



        $('#formFilterTanggal').on('submit', (e) => {
            e.preventDefault();
            const tglAwal = splitTanggal($('#formFilterTanggal input[name=tglAwal]').val())
            const tglAkhir = splitTanggal($('#formFilterTanggal input[name=tglAkhir]').val())
            localStorage.setItem('tglAwal', tglAwal)
            localStorage.setItem('tglAkhir', tglAkhir)
            loadTabelRegistrasi(tglAwal, tglAkhir);
        })

        function rujukInternal(no_rawat) {
            getRegDetail(no_rawat).done((response) => {
                modalRujukanInternal.modal('show')
                formRujukInternalPoli.find('input[name=no_rawat]').val(no_rawat)
                formRujukInternalPoli.find('input[name=no_rkm_medis]').val(response.no_rkm_medis)
                formRujukInternalPoli.find('input[name=nm_pasien]').val(response.pasien.nm_pasien)
                formRujukInternalPoli.find('input[name=poliklinik]').val(response.poliklinik.nm_poli)
            })
        }
    </script>
@endpush
