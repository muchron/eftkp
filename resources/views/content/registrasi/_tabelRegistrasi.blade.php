<div class="card">
    <div class="card-body">
        <div id="table-default" class="table-responsive">
            <table class="table table-sm table-striped table-hover nowrap" id="tabelRegistrasi" width="100%">
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
            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12">
                <button type="button" class="btn btn-primary" data-bs-target='#modalPasien' data-bs-toggle="modal">Pasien</button>
            </div>
        </div>
    </div>
</div>

{{-- MODAL --}}

@include('content.pemeriksaan.modalCppt')

@include('content.pcare.pendaftaran._modalPasien')
@push('script')
    <script type="" src="{{asset('public/libs/list.js/dist/list.min.js')}}"></script>
    <script>
        function loadTabelRegistrasi(tglAwal = '', tglAkhir = '', stts = '') {
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
                        render: (data, type, row, meta) => {
                            return `<span class="text-muted" style="font-size:9px;font-style:italic">${row.no_rawat}</span> <br/> ${row.pasien.nm_pasien} (${row.pasien.jk})`;
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
                            return `${row.pasien.alamat}, ${row.pasien.kel.nm_kel}`;
                        },
                    },
                    {
                        title: 'Alergi',
                        data: 'pasien',
                        render: (data, type, row, meta) => {
                            const alergi = data.alergi.map((val) => {
                                return val.alergi
                            }).join(', <br/> ')
                            return `<span class="text-red">${alergi}</span>`;
                        },
                    },
                    {
                        title: 'status',
                        render: (data, type, row, meta) => {
                            return `<span class="badge ${row.stts_daftar.toUpperCase() === 'LAMA' ? 'badge-outline text-primary' : 'badge-outline text-orange'}">${row.stts_daftar}`;
                        },
                    },
                    {
                        title: 'Penjab',
                        render: (data, type, row, meta) => {
                            if (row.penjab.png_jawab.includes('BPJS')) {
                                flag = row.pcare_pendaftaran ? '<i class="ti ti-check"></i>' : '';
                                penjabBadge = `<span class="badge badge-pill bg-green"> BPJS ${flag}</span>`
                            } else {
                                penjabBadge = `<span class="badge badge-pill bg-orange">${row.penjab.png_jawab}</span>`
                            }
                            return penjabBadge;
                        },
                    },
                    {
                        title: '',
                        render: (data, type, row, meta) => {
                            let classBtnPemerisksaan = 'btn-outline-primary'
                            if (row.pemeriksaan_ralan) {
                                classBtnPemerisksaan = 'btn-success'
                            }
                            return `<button type="button" class="btn btn-sm ${classBtnPemerisksaan}" onclick="modalCppt('${row.no_rawat}')"><i class="ti ti-file-pencil"></i> CPPT</button>`;
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
