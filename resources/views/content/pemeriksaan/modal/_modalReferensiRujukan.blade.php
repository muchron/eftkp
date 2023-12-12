<div class="modal modal-blur fade" id="modalReferensiRujukan" tabindex="-1" aria-modal="false" role="dialog" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-full-width" role="document">
        <div class="modal-content rounded-3">
            <div class="modal-header">
                <h5 class="modal-title m-0">Pilihan Rujukan FKTRL</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="tbRujukan" class="table table-stripped" width="100%"></table>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        function setPpkRujukan(kdPpk, nmPpk) {
            $('#kdPpkRujukan').val(kdPpk)
            $('#kdPpkRujukan').val(kdPpk)
        }

        function renderRujukan() {
            const loading = loadingAjax();
            $.get('bridging/pcare/spesialis/rujukan', {
                kdSubSpesialis: $('#kdSubSpesialis').val(),
                kdSarana: $('#kdSarana').val(),
                tglRujuk: $('#tglEstRujukan').val(),
            }).done((response) => {
                console.log('FASKES ===', response);
                if (response.metaData.code == 200) {
                    loading.close();
                    $('#modalReferensiRujukan').modal('show')
                    const tbReferensi = new DataTable('#tbRujukan', {
                        responsive: true,
                        stateSave: true,
                        serverSide: false,
                        destroy: true,
                        processing: true,
                        scrollY: 370,
                        data: response.response.list,
                        columnDefs: [{
                            'targets': [0, 1],
                            'createdCell': (td, cellData, rowData, row, col) => {
                                $(td).attr('onclick', `renderTbSubspesialis('${rowData.kdSpesialis}')`);
                            }
                        }],
                        columns: [{
                                title: 'Kode PPK',
                                data: 'kdppk',
                                render: (data, type, row, meta) => {
                                    return data
                                }
                            },
                            {
                                title: 'Nama Faskes',
                                data: 'nmppk',
                                render: (data, type, row, meta) => {
                                    return data
                                }
                            },
                            {
                                title: 'alamatPpk',
                                data: 'nmppk',
                                render: (data, type, row, meta) => {
                                    return data
                                }
                            },
                            {
                                title: 'Kelas',
                                data: 'kelas',
                                render: (data, type, row, meta) => {
                                    return data
                                }
                            },
                            {
                                title: 'Telp.',
                                data: 'telpPpk',
                                render: (data, type, row, meta) => {
                                    return data
                                }
                            },
                            {
                                title: 'KC',
                                data: 'nmkc',
                                render: (data, type, row, meta) => {
                                    return data
                                }
                            },
                            {
                                title: 'Jarak',
                                data: 'distance',
                                render: (data, type, row, meta) => {
                                    const jarak = data / 1000
                                    return `${jarak.toFixed(1)} KM`
                                }
                            },
                            {
                                title: 'Jml. Rujukan',
                                data: 'jmlRujuk',
                                render: (data, type, row, meta) => {
                                    return data
                                }
                            },
                            {
                                title: 'Kapasitas',
                                data: 'kapasitas',
                                render: (data, type, row, meta) => {
                                    return data
                                }
                            },
                            {
                                title: 'Persentase',
                                data: 'persentase',
                                render: (data, type, row, meta) => {
                                    return `${data}%`
                                }
                            },
                            {
                                title: 'Jadwal',
                                data: 'jadwal',
                                render: (data, type, row, meta) => {
                                    return data
                                }
                            },
                        ]
                    })
                } else {
                    const errorMsg = {
                        status: 500,
                        statusText: 'Gagal mengambil data sub-spesialis'
                    }
                    alertErrorAjax(errorMsg)
                }
            })

        }

        function setSpesialis(kdSpesialis, spesialis) {
            formRujukanSpesialis.find('input[name=kdSPesialis]').val(kdSpesialis)
            formRujukanSpesialis.find('input[name=spesialis]').val(spesialis)
        }
    </script>
@endpush
