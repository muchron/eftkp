<div class="card">
    <div class="card-body">
        <div id="table-default" class="table-responsive">
            <table class="table table-sm table-striped table-hover" id="tabelRegistrasi" width="100%">
            </table>
        </div>
    </div>
    <div class="card-footer">
        <form action="registrasi/get" method="get" id="formFilterRegistrasi">
            <div class="row d-none-sm d-none-md">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="input-group">
                        <input class="form-control filterTangal" placeholder="Select a date" id="tglAwal" name="tglAwal" value="{{ date('d-m-Y') }}">
                        <span class="input-group-text">
                            s.d
                        </span>
                        <input class="form-control filterTangal" placeholder="Select a date" id="tglAkhir" name="tglAkhir" value="{{ date('d-m-Y') }}">
                        <button class="btn w-5 btn-secondary" type="button" id="btnFilterRegistrasi"><i class="ti ti-search"></i> </button>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <select class="form-select" id="dokter" name="dokter"></select>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12">
                    <button type="button" class="btn btn-primary" data-bs-target='#modalPasien' data-bs-toggle="modal">Pasien</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- MODAL --}}

@include('content.pemeriksaan.modalCppt')

@include('content.pcare.pendaftaran._modalPasien')
@push('script')
    <script type="" src="{{asset('public/libs/list.js/dist/list.min.js')}}"></script>
    <script>
        let formFilterRegistrasi = $('#formFilterRegistrasi')
        let inputTglAwal = $('#tglAwal')
        let inputTglAkhir = $('#tglAkhir')
        $(document).ready(() => {
            selectDokter(formFilterRegistrasi.find('select[name="dokter"]'), formFilterRegistrasi)
                .on('select2:select', (e) => {
                    loadTabelRegistrasi(splitTanggal(inputTglAwal.val()), splitTanggal(inputTglAkhir.val()), '', e.params.data.id)
                });
        })

        function loadTabelRegistrasi(tglAwal = '', tglAkhir = '', stts = '', dokter = '') {
            const tabelRegistrasi = new DataTable('#tabelRegistrasi', {
                responsive: true,
                stateSave: true,
                serverSide: false,
                destroy: true,
                processing: true,
                scrollY: '50vh',
                scrollX: true,
                ajax: {
                    url: 'registrasi/get',
                    data: {
                        dataTable: true,
                        tglAwal: tglAwal,
                        tglAkhir: tglAkhir,
                        stts: stts,
                        dokter: dokter,
                    },
                },
                createdRow: (row, data, index) => {
                    $(row).addClass('table-rows').attr('data-id', data.no_rawat).attr('data-poli', data.kd_poli);
                },
                columns: [{
                        title: '',
                        data: 'no_rawat',
                        render: (data, type, row, meta) => {
                            let attr = 'javascript:void(0)';
                            let target = '';
                            let action = '';
                            if (row.stts == 'Belum') {
                                btnStatusLayanan = 'btn-primary'
                                action = `setPanggil('${data}')`
                            } else if (row.stts == 'Berkas Diterima' || row.stts == 'Dirawat') {
                                btnStatusLayanan = 'btn-purple'
                                action = `setBelum('${data}')`
                                row.stts = 'Diperiksa';
                            } else if (row.stts == 'Batal') {
                                btnStatusLayanan = 'btn-danger'
                            } else if (row.stts == 'Sudah') {
                                btnStatusLayanan = 'btn-success'
                            } else if (row.stts == 'Dirujuk') {
                                btnStatusLayanan = 'btn-warning'
                                if (row.pcare_rujuk_subspesialis) {
                                    attr = `pcare/kunjungan/rujuk/subspesialis/print/${row.pcare_rujuk_subspesialis.noKunjungan}`
                                    target = 'target="_blank"';
                                }
                            }

                            button = `<a href="${attr}" ${target}  class="btn btn-sm ${btnStatusLayanan}" onclick="${action}" style="width:100%" >${row.stts.toUpperCase()}</a>`


                            return button;
                        }
                    },
                    {
                        title: '',
                        render: (data, type, row, meta) => {
                            let classBtnPemerisksaan = 'btn-outline-primary'
                            if (row.pemeriksaan_ralan) {
                                classBtnPemerisksaan = 'btn-success'
                            }
                            return `<button type="button" class="btn btn-sm ${classBtnPemerisksaan}" onclick="modalCppt('${row.no_rawat}')"><i class="ti ti-file-pencil me-1"></i> CPPT</button>`;
                        },
                    },

                    {
                        title: 'No',
                        render: (data, type, row, meta) => {
                            return row.no_reg;
                        }
                    },

                    {
                        title: 'Poli',
                        data: 'poliklinik.nm_poli',
                        render: (data, type, row, meta) => {
                            return data;
                        }
                    },
                    {
                        title: 'Dokter',
                        data: 'dokter.nm_dokter',
                        render: (data, type, row, meta) => {
                            return data;
                        }
                    },
                    {
                        title: 'Tanggal',
                        render: (data, type, row, meta) => {
                            return splitTanggal(row.tgl_registrasi);
                        },
                    },
                    {
                        title: 'Jam',
                        data: 'jam_reg',
                        render: (data, type, row, meta) => {
                            return row.jam_reg;
                        },
                    },

                    {
                        title: 'No. RM',
                        data: 'no_rkm_medis',
                        render: (data, type, row, meta) => {
                            return data;
                        }
                    }, {
                        title: 'Pasien',
                        data: 'pasien',
                        render: (data, type, row, meta) => {
                            return `<span class="text-muted" style="font-size:9px;font-style:italic">${row.no_rawat}</span> <br/> ${data.nm_pasien} (${data.jk})`;
                        }
                    },
                    {
                        title: 'Umur',
                        data: 'umurdaftar',
                        render: (data, type, row, meta) => {
                            return `${row.umurdaftar} ${row.sttsumur}`;
                        },
                    },
                    {
                        title: 'Alamat',
                        render: (data, type, row, meta) => {
                            return `${row.pasien.alamat}, ${row.pasien.kel.nm_kel}, ${row.pasien.kec.nm_kec}`;
                        },
                    },
                    {
                        title: 'Alergi',
                        data: 'pasien',
                        render: (data, type, row, meta) => {
                            const alergi = data.alergi.map((val) => {
                                return val.alergi
                            }).join(', ')
                            return `<span class="text-red">${alergi}</span>`;
                        },
                    },
                    {
                        title: 'status',
                        data: 'stts_daftar',
                        render: (data, type, row, meta) => {
                            return `<span class="badge ${data.toUpperCase() === 'LAMA' ? 'badge-outline text-primary' : 'badge-outline text-orange'}">${data}`;
                        },
                    },
                    {
                        title: 'Penjab',
                        data: 'penjab.png_jawab',
                        render: (data, type, row, meta) => {
                            return setTextPenjab(data);
                        },
                    },


                ]
            })
        }



        function symbolGigi(hasil, size = '') {
            switch (hasil) {
                case 'Tumpatan':
                    return `<i class="ti ti-circle-filled" style="font-size:${size ? size : 35}px"></i>`
                    break;
                case 'Erupsi':
                    return `<i class="ti ti-arrows-horizontal" style="font-size:${size ? size : 35}px"></i>`
                    break;
                case 'Hilang':
                    return `<i class="ti ti-x" style="font-size:${size ? size : 35}px"></i>`
                    break;
                case 'Sisa Akar':
                    return `<i class="ti ti-letter-v" style="font-size:${size ? size : 35}px"></i>`;
                    break;
                case 'Karies':
                    return `<i class="ti ti-circle" style="font-size:${size ? size : 35}px"></i>`;
                    break;
                case 'Goyang':
                    return `<i class="ti ti-currency-euro" style="font-size:${size ? size : 35}px"></i>`;
                    break;

                default:
                    break;
            }
        }

        function setPanggil(no_rawat) {
            setStatusLayan(no_rawat, 'Berkas Diterima').done((response) => {
                loadTabelRegistrasi(tglAwal, tglAkhir);
            });
        }

        function setBelum(no_rawat) {
            setStatusLayan(no_rawat, 'Belum').done((response) => {
                loadTabelRegistrasi(tglAwal, tglAkhir);
            });
        }
    </script>
@endpush()
