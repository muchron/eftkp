<div class="modal modal-blur fade" id="modalReferensiSubSpesialis" tabindex="-1" aria-modal="false" role="dialog" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content rounded-3">
            <div class="modal-header">
                <h5 class="modal-title m-0">Referensi Sub-Spesialis & Sarana</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row gy-2">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <h5 class="m-0">Referensi Sub-Spesialis</h5>
                        <div class="table-responsive">
                            <table id="tbReferensiSubSpesialis" class="table table-stripped" width="100%"></table>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <h5 class="m-0">Referensi Sarana <i class="ti ti-search" onclick="renderTbSarana()"></i></h5>
                        <div class="table-responsive">
                            <table id="tbReferensiSarana" class="table table-stripped d-none" width="100%"></table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="renderRujukan()"><i class="ti-ti-search"></i> Cari Faskes</button>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        var formRujukanSpesialis = $('#formRujukanSpesialis');

        function setSubSpesialis(kdSubSpesialis, nmSubSpesialis) {
            formRujukanSpesialis.find('input[name=kdSubSpesialis]').val(kdSubSpesialis)
            formRujukanSpesialis.find('input[name=subSpesialis]').val(nmSubSpesialis)
        }

        function setSarana(kdSarana, nmSarana) {
            formRujukanSpesialis.find('input[name=kdSarana]').val(kdSarana)
            formRujukanSpesialis.find('input[name=sarana]').val(nmSarana)
        }


        function renderReferensiSubspesialis(kdSpesialis, khusus = false) {
            loadingAjax()
            $.get(`bridging/pcare/spesialis/${kdSpesialis}/subspesialis`).done((response) => {
                if (response.metaData.code == 200) {
                    loadingAjax().close();
                    $('#modalReferensiSpesialis').modal('hide')
                    $('#modalReferensiSubSpesialis').modal('show')
                    const tbReferensi = new DataTable('#tbReferensiSubSpesialis', {
                        responsive: true,
                        autoWidth: true,
                        stateSave: true,
                        serverSide: false,
                        destroy: true,
                        processing: true,
                        data: response.response.list,

                        columns: [{
                                title: 'Kode',
                                data: 'kdSubSpesialis',
                                render: (data, type, row, meta) => {
                                    if () {

                                    }
                                    return `<label class="form-check form-check-inline">
                                                <input class="form-check-input" name="kdSubSpesialis" onclick="setSubSpesialis('${data}', '${row.nmSubSpesialis}')" type="radio" name="radios-inline" value="${data}">
                                                <span class="form-check-label mb-0">${data}</span>
                                            </label>`
                                }
                            },
                            {
                                title: 'Nama Sub-Spesialis',
                                data: 'nmSubSpesialis',
                                render: (data, type, row, meta) => {
                                    return data
                                }
                            },
                            {
                                title: 'Kode Poli Rujukan',
                                data: 'kdPoliRujuk',
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

        // $('#modalReferensiSubSpesialis').on('shown.bs.modal', () => {
        //     renderTbSarana()
        // })

        function renderTbSarana() {
            loadingAjax()
            $.get(`bridging/pcare/spesialis/sarana`).done((response) => {
                if (response.metaData.code == 200) {
                    loadingAjax().close();
                    $('#tbReferensiSarana').removeClass('d-none')
                    const tbReferensi = new DataTable('#tbReferensiSarana', {
                        responsive: true,
                        autoWidth: true,
                        stateSave: true,
                        serverSide: false,
                        destroy: true,
                        processing: true,
                        scrollY: 370,
                        data: response.response.list,
                        columns: [{
                                title: 'Kode',
                                data: 'kdSarana',
                                render: (data, type, row, meta) => {
                                    return `<label class="form-check form-check-inline">
                                                <input class="form-check-input" name="kdSarana" id="kdSarana" onclick="setSarana('${data}', '${row.nmSarana}')" type="radio" name="radios-inline" value="${data}">
                                                <span class="form-check-label mb-0">${data}</span>
                                            </label>`
                                }
                            },
                            {
                                title: 'Nama Sarana',
                                data: 'nmSarana',
                                render: (data, type, row, meta) => {
                                    return data
                                }
                            },
                        ]
                    })
                } else {
                    const errorMsg = {
                        status: 500,
                        statusText: 'Gagal mengambil data sarana, ulangi kembali'
                    }
                    alertErrorAjax(errorMsg)
                }
            })
        }
    </script>
@endpush
