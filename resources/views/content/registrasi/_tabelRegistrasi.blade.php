<div class="card">
    <div class="card-body">
        <div id="table-default" class="table-responsive">
            <table class="table" id="tabelRegistrasi" width="100%">
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

{{-- MODAL --}}

@include('content.pemeriksaan.modalCppt')
@include('content.pemeriksaan.modal._diagnosaPasien')
@include('content.pemeriksaan.modal._tindakanPasien')
@include('content.pemeriksaan.modal._modalEditRacikan')
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
                scrollY: 370,
                ajax: {
                    url: 'registrasi/get',
                    data: {
                        dataTable: true,
                        tglAwal: tglAwal,
                        tglAkhir: tglAkhir,
                        stts: stts,
                    },
                },
                columns: [{
                        title: '',
                        render: (data, type, row, meta) => {
                            if (row.stts == 'Belum') {
                                btnStatusLayanan = 'btn-primary'
                            } else if (row.stts == 'Batal') {
                                btnStatusLayanan = 'btn-danger'
                            } else if (row.stts == 'Sudah') {
                                btnStatusLayanan = 'btn-success'
                            } else if (row.stts == 'Dirujuk') {
                                btnStatusLayanan = 'btn-warning'
                            }
                            button = `<button type="button" class="btn ${btnStatusLayanan}">${row.stts.toUpperCase()}</button>`

                            return button;
                        }
                    },
                    {
                        title: 'Antrian',
                        render: (data, type, row, meta) => {
                            return row.no_reg;
                        }
                    },
                    {
                        title: 'No Rawat',
                        render: (data, type, row, meta) => {
                            return row.no_rawat;
                        }
                    },
                    {
                        title: 'Tanggal',
                        render: (data, type, row, meta) => {
                            return formatTanggal(row.tgl_registrasi);
                        },
                    },
                    {
                        title: 'Jam',
                        render: (data, type, row, meta) => {
                            return row.jam_reg;
                        },
                    },
                    {
                        title: 'No RM',
                        render: (data, type, row, meta) => {
                            return row.pasien.no_rkm_medis;
                        },
                    },
                    {
                        title: 'Pasien',
                        render: (data, type, row, meta) => {
                            return `${row.pasien.nm_pasien} (${row.umurdaftar} ${row.sttsumur})`;
                        },
                    },
                    {
                        title: 'JK',
                        render: (data, type, row, meta) => {
                            return row.pasien.jk == 'L' ? 'Laki-Laki' : 'Perempuan';
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
                            return `<span class="badge ${row.penjab.png_jawab.toUpperCase() === 'BPJS' ? 'bg-green' : 'bg-orange'}">${row.penjab.png_jawab}`;
                        },
                    },
                    {
                        title: '',
                        render: (data, type, row, meta) => {
                            let classBtnPemerisksaan = 'btn-outline-primary'
                            if (row.pemeriksaan_ralan) {
                                classBtnPemerisksaan = 'btn-success'
                            }
                            return `<button type="button" class="btn ${classBtnPemerisksaan}" onclick="modalCppt('${row.no_rawat}')">CPPT</button>`;
                        },
                    },


                ]
            })
        }

        function getRegDetail(no_rawat) {
            const registrasi = $.get('registrasi/get/detail', {
                no_rawat: no_rawat,
            })
            return registrasi;
        }

        function panggil(no_rawat) {
            console.log('NO RAWAT ===', no_rawat)
        }

        function setStatusLayan(no_rawat, status) {
            const postStatus = $.post('registrasi/update', {
                stts: status,
                no_rawat: no_rawat
            })
        }
    </script>
@endpush()
