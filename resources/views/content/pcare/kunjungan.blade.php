@extends('layout')

@section('body')
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div id="table-default" class="table-responsive">
                            <table class="table table-sm" id="tabelPcareKunjungan" width="100%">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('content.pcare._modalPrintKunjungan')
@endsection
@push('script')
    <script>
        var url = "{{ url('') }}";


        $(document).ready(() => {
            var tanggal = "{{ date('Y-m-d') }}";

            var tglAwal = localStorage.getItem('tglAwal') ? localStorage.getItem('tglAwal') : tanggal;
            var tglAkhir = localStorage.getItem('tglAkhir') ? localStorage.getItem('tglAkhir') : tanggal;

            $('#tglAwal').val(splitTanggal(tglAwal))
            $('#tglAkhir').val(splitTanggal(tglAkhir))

            loadTbPcareKunjungan(tglAwal, tglAkhir)
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
            const t1 = splitTanggal($('#formFilterTanggal input[name=tglAwal]').val())
            const t2 = splitTanggal($('#formFilterTanggal input[name=tglAkhir]').val())
            localStorage.setItem('tglAwal', t1)
            localStorage.setItem('tglAkhir', t2)
            loadTbPcareKunjungan(tglAwal, tglAkhir);
        })

        function loadTbPcareKunjungan(tglAwal = '', tglAkhir = '') {
            const tabelRegistrasi = new DataTable('#tabelPcareKunjungan', {
                responsive: true,
                stateSave: true,
                serverSide: false,
                destroy: true,
                processing: true,
                scrollY: '60vh',
                scrollX: true,
                fixedColumns: true,
                ajax: {
                    url: 'kunjungan/get',
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
                        title: 'No. Kunjungan',
                        data: 'noKunjungan',
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
                        title: 'Nama',
                        data: 'nm_pasien',
                        render: (data, type, row, meta) => {
                            return `<small class="text-muted">${row.noKartu}</small><br/>${data}`;
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
                        title: 'Pulang',
                        data: 'nmStatusPulang',
                        render: (data, type, row, meta) => {
                            if (row.kdStatusPulang == 4) {
                                return `<span class="text-warning">${data}</button>`
                            }
                            return data;
                        },
                    },
                    {
                        title: 'Diagnosa',
                        data: 'nmDiag1',
                        render: (data, type, row, meta) => {
                            return `${row.kdDiag1} - ${data}`;
                        },
                    },
                    {
                        title: 'Dokter',
                        data: 'nmDokter',
                        render: (data, type, row, meta) => {
                            return data;
                        },
                    },
                    {
                        title: '',
                        data: 'noKunjungan',
                        render: (data, type, row, meta) => {
                            if (row.rujuk_subspesialis) {
                                //     return `<a href="kunjungan/rujuk/subspesialis/print/${data}" target="_blank" class="btn btn-sm btn-success"><i class="ti ti-printer"></i></a>
                            // <button type="button" class="btn btn-sm btn-danger" onclick="deleteRujukSubspesialis('${data}', '${row.no_rawat}')"><i class="ti ti-trash"></i></button>`;
                                return `<button type="button" class="btn btn-sm btn-success" onclick="showPrintRujukan('${data}')"><i class="ti ti-printer"></i></button>
                            <button type="button" class="btn btn-sm btn-danger" onclick="deleteRujukSubspesialis('${data}', '${row.no_rawat}')"><i class="ti ti-trash"></i></button>`;
                            }
                            return `<button type="button" class="btn btn-sm btn-danger" onclick="deleteRujukSubspesialis('${data}', '${row.no_rawat}')"><i class="ti ti-trash"></i></button>`;
                        },
                    },


                ]
            })
        }

        function deleteKunjungan($noKunjungan) {
            alert($noKunjungan)
        }

        function printKunjungan(noKunjungan) {
            $.post(`kunjungan/print`, {
                noKunjungan: noKunjungan,
            }).done((response) => {})
        }

        function deleteRujukSubspesialis(noKunjungan, no_rawat) {
            Swal.fire({
                title: "Yakin hapus data ini ?",
                html: "Data kunjungan dan pendaftaran Pcare akan dihapus",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Iya, Yakin",
                cancelButtonText: "Tidak, Batalkan"
            }).then((result) => {
                if (result.isConfirmed) {
                    loadingAjax();
                    $.post(`kunjungan/delete/${noKunjungan}`).done((response) => {
                        $.post(`${url}/bridging/pcare/kunjungan/delete/${noKunjungan}`).done((resDelete) => {
                            if (resDelete.metaData.code == 200) {
                                alertSuccessAjax(`${resDelete.response}`).then(() => {
                                    loadTbPcareKunjungan(splitTanggal(tglAwal), splitTanggal(tglAkhir));
                                    $.post(`pendaftaran/delete`, {
                                        no_rawat: no_rawat
                                    }).done(() => {
                                        alertSuccessAjax('Data Pendaftaran Pcare dihapus')
                                    })
                                })
                            } else {
                                const errorMsg = {
                                    status: 500,
                                    statusText: 'Gagal menghapus kunjungan'
                                }
                                alertErrorAjax(errorMsg)
                            }
                        })
                    }).fail(() => {
                        loadingAjax().close();
                    });
                }
            });
        }

        function showPrintRujukan(noKunjungan) {
            Swal.fire({
                title: "Tunggu",
                html: "Sedang mengambil data...",
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading();
                },
            });
            modalPrintKunjungan.find('#print').on('load', (e) => {
                if (e.currentTarget.src) {
                    toast('Berhasil');
                }

            })
            modalPrintKunjungan.find('#noKunjungan').val(noKunjungan)
            modalPrintKunjungan.find('#print').attr('src', `${url}/pcare/kunjungan/rujuk/subspesialis/print?noKunjungan=${noKunjungan}`);
            modalPrintKunjungan.modal('show');
        }

        modalPrintKunjungan.on('hidden.bs.modal', () => {
            modalPrintKunjungan.find('#print').removeAttr('src');
        })

        function renderPrintRujukan(noKunjungan, width = '') {
            const size = width == 'a5' ? '' : `&size=${width}`;
            Swal.fire({
                title: "Tunggu",
                html: "Sedang mengambil data...",
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading();
                },
            });
            modalPrintKunjungan.find('#print').on('load', (e) => {
                if (e.currentTarget.src) {
                    toast('Berhasil');
                }

            })
            modalPrintKunjungan.find('#print').removeAttr('src').attr('src', `${url}/pcare/kunjungan/rujuk/subspesialis/print?noKunjungan=${noKunjungan}${size}`);
        }
    </script>
@endpush
