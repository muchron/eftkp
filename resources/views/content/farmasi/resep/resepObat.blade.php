@extends('layout')

@section('body')
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12" id="cardListTemplate">
                <div class="card">
                    <div class="card-body">
                        <div id="table-default" class="table-responsive">
                            <table class="table nowrap table-sm table-striped table-hover" id="tbResepObat" width="100%"></table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                            <div class="input-group">
                                <input class="form-control filterTangal" placeholder="Select a date" id="tgl_awal" name="tgl_awal" value="{{ date('d-m-Y') }}">
                                <span class="input-group-text">
                                    s.d
                                </span>
                                <input class="form-control filterTangal" placeholder="Select a date" id="tgl_akhir" name="tgl_akhir" value="{{ date('d-m-Y') }}">
                                <button class="btn w-5 btn-secondary" type="button" id="btnFilterTanggal">
                                    <i class="ti ti-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('content.farmasi.resep._modalDetailResep')
@endsection
@push('script')
    <script>
        const tglAwalResep = localStorage.getItem('tglAwalResep');
        const tglAkhirResep = localStorage.getItem('tglAkhirResep');

        $(document).ready(() => {
            tglAwalResep ? $('#tgl_awal').val(tglAwalResep) : '';
            tglAkhirResep ? $('#tgl_akhir').val(tglAkhirResep) : '';
            tbResepObat(tglAwalResep, tglAkhirResep);

            setInterval(() => {
                tbResepObat(tglAwalResep, tglAkhirResep);
            }, 10000);
        })

        function tbResepObat(tgl_awal = '', tgl_akhir = '') {
            const tabel = new DataTable('#tbResepObat', {
                responsive: true,
                stateSave: true,
                serverSide: false,
                destroy: true,
                processing: true,
                scrollY: '50vh',
                scrollX: true,
                ajax: {
                    url: `/efktp/resep/get`,
                    data: {
                        dataTable: true,
                        tgl_awal: tgl_awal,
                        tgl_akhir: tgl_akhir,
                    },
                },
                columns: [{
                        title: '',
                        data: 'no_resep',
                        render: (data, type, row, meta) => {
                            if (isAvailableTime(row.jam_penyerahan)) {
                                colorBtn = `btn-success`
                                display = `d-none`

                            } else {
                                colorBtn = `btn-danger`
                                display = ``
                            }
                            return `<button class="btn btn-sm ${colorBtn}" onclick="showDetailResep('${data}')"><i class="ti ti-search"></i>Lihat</button>
                            <button class="btn btn-sm btn-success ${display}" onclick="panggilResepPasien('${data}')"><i class="ti ti-phone"></i>Panggil</button>
                            <button class="btn btn-sm btn-primary ${display}" onclick="setPenyerahanResep('${data}')"><i class="ti ti-send"></i>Selesai</button>`;
                        },
                    },
                    {
                        title: 'NO RESEP',
                        data: 'no_resep',
                        render: (data, type, row, meta) => {
                            return data;
                        },
                    },
                    {
                        title: 'NO. RAWAT',
                        data: 'no_rawat',
                        render: (data, type, row, meta) => {
                            return data;
                        },
                    },
                    {
                        title: 'NAMA',
                        data: 'reg_periksa.pasien.nm_pasien',
                        render: (data, type, row, meta) => {
                            return `${row.reg_periksa.no_rkm_medis} - ${data}`;
                        },
                    },
                    {
                        title: 'POLIKLINIK',
                        data: 'reg_periksa.poliklinik.nm_poli',
                        render: (data, type, row, meta) => {
                            return data;
                        },
                    },
                    {
                        title: 'DOKTER',
                        data: 'reg_periksa.dokter.nm_dokter',
                        render: (data, type, row, meta) => {
                            return data;
                        },
                    },
                    {
                        title: 'Asuransi',
                        data: 'reg_periksa.penjab.png_jawab',
                        render: (data, type, row, meta) => {
                            return setTextPenjab(data);
                        },
                    },
                    {
                        title: 'DIBUAT',
                        data: 'tgl_peresepan',
                        render: (data, type, row, meta) => {
                            return `${isAvaliableDate(data)} ${isAvailableTime(row.jam_peresepan)}`;
                        },
                    },
                    {
                        title: 'VALIDASI',
                        data: 'tgl_perawatan',
                        render: (data, type, row, meta) => {
                            return `${isAvaliableDate(data)} ${isAvailableTime(row.jam)}`;
                        },
                    },
                    {
                        title: 'PENYERAHAN',
                        data: 'tgl_penyerahan',
                        render: (data, type, row, meta) => {
                            return `${isAvaliableDate(data)} ${isAvailableTime(row.jam_penyerahan)}`;
                        },
                    },
                ],
                initComplete: () => {
                    showToast('Memuat hasil resep obat');
                }
            })
        }
        $('#btnFilterTanggal').on('click', (e) => {
            tgl_awal = $('#tgl_awal').val();
            tgl_akhir = $('#tgl_akhir').val();

            localStorage.setItem('tglAwalResep', tgl_awal);
            localStorage.setItem('tglAkhirResep', tgl_akhir);

            tbResepObat(tgl_awal, tgl_akhir);
        })

        function isAvaliableDate(tanggal) {
            const listTanggal = ['0000-00-00', '00-00-00', ''];
            const tgl = listTanggal.includes(tanggal) ? "-" : tanggal;
            return tgl;
        }

        function isAvailableTime(jam) {
            const listJam = ['00:00:00', ''];
            const jams = listJam.includes(jam) ? "" : jam;
            return jams;
        }

        function showDetailResep(no_resep) {
            $.get(`/efktp/farmasi/resep/get`, {
                no_resep: no_resep
            }).done((response) => {
                if (response.resep_dokter.length || response.resep_racikan.length) {
                    const resepDokter = response.resep_dokter.map((item, index) => {
                        return `<li>${item.obat.nama_brng} @${item.jml} ${item.obat.satuan.satuan} S.${item.aturan_pakai}</li>`;
                    }).join('')

                    const resepRacikan = response.resep_racikan.map((item, index) => {
                        const detail = item.detail.map((subItem) => {
                            return `<li>${subItem.obat.nama_brng} @${subItem.jml} ${subItem.obat.satuan.satuan}</li>`;
                        }).join('');
                        return `<li>${item.metode.nm_racik} ${item.nama_racik} @${item.jml_dr} S.${item.aturan_pakai}<ul>${detail}</ul></li>`;
                    }).join('')
                    $('#olUmum').html(resepDokter);
                    $('#olRacik').html(resepRacikan);
                    modalDetailResep.modal('show')
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Tidak ada obat didalam nomor resep ini',
                    })
                }
            })
        }

        function setPenyerahanResep(no_resep) {
            $.post(`/efktp/farmasi/resep/set/penyerahan`, {
                no_resep: no_resep
            }).done((response) => {
                toast('Obat telah selesai');
                tbResepObat(tgl_awal, tgl_akhir);
            })
        }
    </script>
@endpush
