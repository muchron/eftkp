<div class="modal modal-blur fade" id="modalSuratSakit" tabindex="-1" aria-modal="false" role="dialog" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document">
        <div class="modal-content rounded-3">

            <div class="modal-body p-2">
                <div class="card border-0">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                            <li class="nav-item">
                                <a href="#tabs-formSuratSakit" class="nav-link active" data-bs-toggle="tab">
                                    <i class="ti ti-user me-2"></i>Form
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#tabs-tableSuratSakit" class="nav-link" data-bs-toggle="tab">
                                    <i class="ti ti-list me-2"></i> Daftar Surat Sakit
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body p-1">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="tabs-formSuratSakit">
                                <form action="" id="formSuratSakit">
                                    <div class="row p-3 gy-2">
                                        <div class="col-xl-2 col-md-6 col-sm-12">
                                            <label for="no_surat">Nomor Surat</label>
                                            <input type="text" class="form-control" name="no_surat" id="no_surat" readonly />
                                        </div>
                                        <div class="col-xl-2 col-md-6 col-sm-12">
                                            <label for="no_rawat">No Rawat</label>
                                            <input type="text" class="form-control" name="no_rawat" id="no_rawat" readonly />
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-sm-12">
                                            <label for="pasien">Pasien</label>
                                            <input type="text" class="form-control" name="pasien" id="pasien" readonly />
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-sm-12">
                                            <label for="pasien">Pekerjaan</label>
                                            <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" readonly />
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-sm-12">
                                            <label for="diagnosa">Diagnosa</label>
                                            <input type="text" class="form-control" name="diagnosa" id="diagnosa" readonly />
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-sm-12">
                                            <label for="tanggalawal">Tanggal</label>
                                            <div class="input-group">
                                                <input class="form-control filterTangal" name="tanggalawal" id="tanggalawal" value="{{ date('d-m-Y') }}" />
                                                <span class="input-group-text">
                                                    <label for="">s/d</label>
                                                </span>
                                                <input class="form-control filterTangal" name="tanggalakhir" id="tanggalakhir" value="{{ date('d-m-Y') }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-md-6 col-sm-12">
                                            <label for="lama">Lama Sakit</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control text-end" name="lama" id="lama" readonly />
                                                <span class="input-group-text">
                                                    <label for="">Hari</label>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane p-2" id="tabs-tableSuratSakit">
                                <div class="table-responsive">
                                    <table class="table table-sm" id="tbSuratSakit" width="100%"></table>
                                </div>
                                <div class="form" id="formFilterSakit">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-group">
                                                <input class="form-control filterTangal" name="tgl_pertama" id="tgl_pertama" value="{{ date('d-m-Y') }}" />
                                                <span class="input-group-text">
                                                    <label for="">s.d</label>
                                                </span>
                                                <input class="form-control filterTangal" name="tgl_kedua" id="tgl_kedua" value="{{ date('d-m-Y') }}" />
                                                <button class="btn btn-secondary" id="btnFilterSuratSakit"><i class="ti ti-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btnSimpanSuratSakit"><i class="ti ti-device-floppy me-2"></i>Simpan</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="ti ti-x me-2"></i>Keluar</button>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        var modalSuratSakit = $('#modalSuratSakit');
        var formSuratSakit = $('#formSuratSakit');
        var formFilterSakit = $('#formFilterSakit');
        var tanggalAwal = formSuratSakit.find('input[name=tanggalawal]');
        var tanggalAkhir = formSuratSakit.find('input[name=tanggalakhir]');
        var url = "{{ url('') }}"
        $('#modalSuratSakit').on('shown.bs.modal', (e) => {
            const lamaSakit = setLamaSakit(tanggalAwal.val(), tanggalAkhir.val());
            formSuratSakit.find('input[name=lama]').val(lamaSakit)
            setNoSuratSakit().done((response) => {
                console.log(response);
                formSuratSakit.find('input[name=no_surat]').val(response)
            })
            loadSuratSakit();
        });

        $('#btnFilterSuratSakit').on('click', (e) => {
            const pertama = formFilterSakit.find('input[name=tgl_pertama]').val()
            const kedua = formFilterSakit.find('input[name=tgl_kedua]').val()
            loadSuratSakit(splitTanggal(pertama), splitTanggal(kedua))

        })

        function setLamaSakit(start, end) {
            const date = dateDiff(splitTanggal(end), splitTanggal(start));
            const lama = parseInt(date) + 1
            return lama;
        }

        tanggalAwal.on('change', (e) => {
            const awal = e.currentTarget.value;
            const akhir = tanggalAkhir.val();
            const lamaSakit = setLamaSakit(awal, akhir);
            formSuratSakit.find('input[name=lama]').val(lamaSakit)
        })
        tanggalAkhir.on('change', (e) => {
            const akhir = e.currentTarget.value;
            const awal = tanggalAwal.val();
            const lamaSakit = setLamaSakit(awal, akhir);
            if (lamaSakit < 1) {
                alertError('Tanggal akhir tidak boleh mundur');
                return false;
            }
            formSuratSakit.find('input[name=lama]').val(lamaSakit)
        })


        function setNoSuratSakit(tgl_surat = '') {
            const noSakit = $.get(`${url}/surat/sakit/setnomor`, {
                tgl_surat: tgl_surat,
            })
            return noSakit
        }

        function suratSakit(no_rawat) {

            $.get(`${url}/registrasi/get/detail`, {
                no_rawat: no_rawat
            }).done((response) => {
                const diagnosa = response.diagnosa.map((dx) => {
                    return dx.penyakit.ciri_ciri
                }).join(';')
                formSuratSakit.find('input[name=no_rawat]').val(no_rawat)
                formSuratSakit.find('input[name=diagnosa]').val(diagnosa)
                formSuratSakit.find('input[name=pekerjaan]').val(response.pasien.pekerjaan)
                formSuratSakit.find('input[name=pasien]').val(`${response.no_rkm_medis} - ${response.pasien.nm_pasien} (${response.umurdaftar} ${response.sttsumur}) `)
            })
            modalSuratSakit.modal('show')

        }

        function loadSuratSakit(tglAwal = '', tglAkhir = '') {
            const tabelRegistrasi = new DataTable('#tbSuratSakit', {
                responsive: true,
                stateSave: true,
                serverSide: false,
                destroy: true,
                processing: true,
                ajax: {
                    url: `${url}/surat/sakit`,
                    data: {
                        dataTable: true,
                        tgl_pertama: tglAwal,
                        tgl_kedua: tglAkhir,
                    },
                },
                createdRow: (row, data, index) => {
                    // $(row).addClass('rows-rujuk').attr('data-id', data.no_rawat);
                    // if (data.pemeriksaan) {
                    //     $(row).addClass('bg-green-lt')
                    // }
                },
                columns: [{
                        title: 'No. Surat',
                        data: 'no_surat',
                        render: (data, type, row, meta) => {
                            console.log('ROW ===', row);
                            return data
                        },
                    },
                    {
                        title: 'No. Rawat',
                        data: 'no_rawat',
                        render: (data, type, row, meta) => {
                            console.log('ROW ===', row);
                            return data
                        },
                    },
                    {
                        title: 'No. RM',
                        data: 'reg_periksa.no_rkm_medis',
                        render: (data, type, row, meta) => {
                            return data
                        },
                    },
                    {
                        title: 'Nama',
                        data: 'reg_periksa.pasien.nm_pasien',
                        render: (data, type, row, meta) => {
                            return data
                        },
                    },
                    {
                        title: 'Umur',
                        data: 'reg_periksa',
                        render: (data, type, row, meta) => {
                            return `${data.umurdaftar} ${data.sttsumur}`
                        },
                    },
                    {
                        title: 'Tgl Awal',
                        data: 'tanggalawal',
                        render: (data, type, row, meta) => {
                            return splitTanggal(data)
                        },
                    }, {
                        title: 'Tgl Akhir',
                        data: 'tanggalakhir',
                        render: (data, type, row, meta) => {
                            return splitTanggal(data)
                        },
                    },
                    {
                        title: 'Lama Sakit',
                        data: 'lamasakit',
                        render: (data, type, row, meta) => {
                            return data
                        },
                    },
                    {
                        title: '',
                        data: 'no_surat',
                        render: (data, type, row, meta) => {
                            return `<button type="button" class="btn btn-sm btn-danger" onclick="deleteSuratSakit('${data}')"><i class="ti ti-trash"></i></button>
                            <a href="${url}/surat/sakit/print/${data}" class="btn btn-sm btn-success" target="_blank"><i class="ti ti-printer"></i></a>
                            `;
                        },
                    },

                ]
            })
        }

        $('#btnSimpanSuratSakit').on('click', (e) => {
            e.preventDefault
            const data = getDataForm('formSuratSakit', 'input');
            $.post(`${url}/surat/sakit`, data).done((response) => {
                alertSuccessAjax().then(() => {
                    loadSuratSakit(tglAwal, tglAkhir)
                })
            })
        })

        function deleteSuratSakit(no_surat) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post(`${url}/surat/sakit/delete/${no_surat}`).done((response) => {
                        alertSuccessAjax().then(() => {
                            loadSuratSakit(tglAwal, tglAkhir)
                        })
                    })
                }
            })
        }
    </script>
@endpush
