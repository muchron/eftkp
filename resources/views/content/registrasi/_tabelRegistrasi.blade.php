<div class="card">
    <div class="card-body">
        <div id="table-default" class="table-responsive">
            <table class="table" id="tabelRegistrasi" width="100%">
            </table>
        </div>
    </div>
    <div class="card-footer">
        <input type="text" class="form-control">
    </div>
</div>

{{-- MODAL --}}

@include('content.pemeriksaan.modalCppt')
@push('script')
    <script type="" src="{{asset('libs/list.js/dist/list.min.js')}}"></script>
    <script>
        $(document).ready(() => {
            getRegPeriksa().done((registrasi) => {
                const tabelRegistrasi = new DataTable('#tabelRegistrasi', {
                    data: registrasi,
                    responsive: true,
                    savestate: true,
                    destroy: true,
                    processing: true,
                    scrollY: 370,
                    initComplete: (response) => {
                        // console.log('RESPONSE ===', response);
                    },
                    columns: [{
                            title: '',
                            render: (data, type, row, meta) => {
                                if (row.stts == 'Belum') {
                                    button = `<button type="button" class="btn btn-primary" onclick="panggil('${row.no_rawat}')">Panggil</button>
                                    <button type="button" class="btn btn-primary">Panggil</button>
                                    <button type="button" class="btn btn-primary">Panggil</button>`
                                }

                                return button;
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
                                return `<span class="badge ${row.stts_daftar.toUpperCase() === 'LAMA' ? 'bg-green text-green-bg' : 'bg-orange text-orange-bg'}">${row.stts_daftar}`;
                            },
                        },
                        {
                            title: 'Penjab',
                            render: (data, type, row, meta) => {
                                return row.penjab.png_jawab;
                            },
                        },
                        {
                            title: '',
                            render: (data, type, row, meta) => {
                                return `<button type="button" class="btn btn-outline-primary" onclick="modalCppt('${row.no_rawat}')">CPPT</button>`;
                            },
                        },


                    ]
                })
            })
        })

        function getRegPeriksa(startDate = '', endDate = '') {
            const registrasi = $.get('registrasi/get', {
                startDate: startDate,
                endDate: endDate
            })
            return registrasi;
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
    </script>
@endpush()
