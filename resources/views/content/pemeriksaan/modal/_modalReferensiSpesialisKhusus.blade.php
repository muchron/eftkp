<div class="modal modal-blur fade" id="modalReferensiSpesialisKhusus" tabindex="-1" aria-modal="false" role="dialog" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md" role="document">
        <div class="modal-content rounded-3">
            <div class="modal-header">
                <h5 class="modal-title m-0">Referensi Spesialis</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="tbReferensiSpesialisKhusus" class="table table-stripped" width="100%"></table>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        function setSpesialisKhusus(kdKhusus, khusus) {
            formRujukanKhusus.find('input[name=kdKhusus]').val(kdKhusus)
            formRujukanKhusus.find('input[name=khusus]').val(khusus)
            $('#modalReferensiSpesialisKhusus').modal('hide')
        }

        function renderReferensiSpesialisKhusus() {
            $('#modalReferensiSpesialisKhusus').find('.modal-title').html('Referensi Spesialis')
            const loading = loadingAjax();
            $.get('bridging/pcare/spesialis/khusus').done((response) => {
                if (response.metaData.code == 200) {
                    loading.close();
                    $('#modalReferensiSpesialisKhusus').modal('show')
                    const tbReferensi = new DataTable('#tbReferensiSpesialisKhusus', {
                        autoWidth: true,
                        stateSave: true,
                        serverSide: false,
                        destroy: true,
                        processing: true,
                        data: response.response.list,
                        columnDefs: [{
                            'targets': [0, 1],
                            'createdCell': (td, cellData, rowData, row, col) => {
                                $(td).attr('onclick', `setSpesialisKhusus('${rowData.kdKhusus}', '${rowData.nmKhusus}')`);
                            }
                        }],
                        columns: [{
                                title: 'Kode Spesialis Khsusus',
                                data: 'kdKhusus',
                                render: (data, type, row, meta) => {
                                    return `<button type="button" class="btn btn-sm btn-outline-secondary">${data}</button>`
                                }
                            },
                            {
                                title: 'Nama Spesialis Khusus',
                                data: 'nmKhusus',
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
    </script>
@endpush
