@extends('layout')

@section('body')
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div id="table-default" class="table-responsive">
                            <table class="table table-sm" id="tabelPcarePendaftaran" width="100%">
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row d-none-sm d-none-md">
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                <form action="registrasi/get" method="post" id="formFilterTanggal">
                                    <div class="input-group">
                                        <input class="form-control filterTangal" placeholder="Select a date" id="tglAwal" name="tglAwal" value="{{ date('d-m-Y') }}">
                                        <span class="input-group-text">
                                            s.d
                                        </span>
                                        <input class="form-control filterTangal" placeholder="Select a date" id="tglAkhir" name="tglAkhir" value="{{ date('d-m-Y') }}">
                                        <button class="btn w-5 btn-secondary" type="submit" onclick="">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="10" height="10" viewBox="-5 -5 24 30" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                                <path d="M21 21l-6 -6"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                <button type="button" class="btn btn-success" onclick="showPendaftaranPcare()"> Bridging</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('content.pcare.pendaftaran._modalPendaftaran')
@endsection
@push('script')
    <script>
        $(document).ready(() => {
            var tanggal = "{{ date('Y-m-d') }}";

            var tglAwal = localStorage.getItem('tglAwal') ? localStorage.getItem('tglAwal') : tanggal;
            var tglAkhir = localStorage.getItem('tglAkhir') ? localStorage.getItem('tglAkhir') : tanggal;

            $('#tglAwal').val(splitTanggal(tglAwal))
            $('#tglAkhir').val(splitTanggal(tglAkhir))

            loadTbPcarePendaftaran(tglAwal, tglAkhir)
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

        function showPendaftaranPcare() {
            renderPendaftaranPcare();
            $('#modalPendaftaranPcare').modal('show')
        }

        $('#formFilterTanggal').on('submit', (e) => {
            e.preventDefault();
            const tglAwal = splitTanggal($('#formFilterTanggal input[name=tglAwal]').val())
            const tglAkhir = splitTanggal($('#formFilterTanggal input[name=tglAkhir]').val())
            localStorage.setItem('tglAwal', tglAwal)
            localStorage.setItem('tglAkhir', tglAkhir)
            loadTbPcarePendaftaran(tglAwal, tglAkhir);
        })

        function loadTbPcarePendaftaran(tglAwal = '', tglAkhir = '') {
            const tbPcarePendaftaran = new DataTable('#tabelPcarePendaftaran', {
                responsive: true,
                stateSave: true,
                serverSide: false,
                destroy: true,
                processing: true,
                scrollY: '60vh',
                scrollX: true,
                fixedColumns: true,
                ajax: {
                    url: 'pendaftaran/get',
                    data: {
                        datatable: true,
                        tgl_awal: tglAwal,
                        tgl_akhir: tglAkhir,
                    },
                },
                columnDefs: [{
                    width: '6%',
                    targets: 8
                }],
                columns: [{
                        title: 'No. Urut',
                        data: 'noUrut',
                        render: (data, type, row, meta) => {
                            return data;
                        },
                    },
                    {
                        title: 'Tgl Daftar',
                        data: 'tglDaftar',
                        render: (data, type, row, meta) => {
                            return splitTanggal(data)
                        },
                    },
                    {
                        title: 'No. Peserta',
                        data: 'noKartu',
                        render: (data, type, row, meta) => {
                            return data;
                        },
                    },
                    {
                        title: 'Nama',
                        data: 'nm_pasien',
                        render: (data, type, row, meta) => {
                            return data;
                        },
                    },
                    {
                        title: 'Alamat',
                        data: 'pasien',
                        render: (data, type, row, meta) => {
                            return `${data.alamatpj}, ${data.kelurahanpj}, ${data.kecamatanpj} `;
                        },
                    },
                    {
                        title: 'Poli',
                        data: 'nmPoli',
                        render: (data, type, row, meta) => {
                            return data;
                        },
                    },
                    {
                        title: 'Kunjungan',
                        data: 'kunjSakit',
                        render: (data, type, row, meta) => {
                            return data;
                        },
                    },
                    {
                        title: 'Keluhan',
                        data: 'keluhan',
                        render: (data, type, row, meta) => {
                            return data;
                        },
                    },
                    {
                        title: '',
                        data: 'noUrut',
                        render: (data, type, row, meta) => {
                            if (row.kdStatusPulang == 4) {
                                return `<a href="kunjungan/rujuk/subspesialis/print/${data}" target="_blank" class="btn btn-sm btn-success"><i class="ti ti-printer"></i></a>
                                <button type="button" class="btn btn-sm btn-danger" onclick="deleteRujukSubspesialis('${data}', '${row.no_rawat}')"><i class="ti ti-trash"></i></button>`;

                            }
                            return `<button type="button" class="btn btn-sm btn-danger" onclick="deleteRujukSubspesialis('${data}', '${row.no_rawat}')"><i class="ti ti-trash"></i></button>`;
                        },
                    },


                ]
            })
        }

        function printKunjungan(noKunjungan) {
            $.get(`kunjungan/print/${noKunjungan}`).done((response) => {})
        }

        function deletePendaftaran(noKunjungan) {
            Swal.fire({
                title: "Yakin hapus ?",
                html: "Anda tidak bisa mengembalikan data ini",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Iya, Yakin",
                cancelButtonText: "Tidak, Batalkan"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post(`kunjungan/delete/${noKunjungan}`).done((response) => [
                        alertSuccessAjax('Berhasil').then(() => {
                            loadTbPcarePendaftaran(splitTanggal(tglAwal.value), splitTanggal(tglAkhir.value));
                        })
                    ])
                }
            });
        }
    </script>
@endpush
