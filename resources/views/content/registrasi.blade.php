@extends('layout')

@section('body')
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                @include('content.registrasi._tabelRegistrasi')
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(() => {
            const tanggal = "{{ date('Y-m-d') }}";

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
    </script>
@endpush
